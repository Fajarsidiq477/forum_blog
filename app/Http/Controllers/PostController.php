<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth ;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth') ;
    }

    public function index()
    {
        $user = Auth::user() ;
        
            $posts = Post::where('user_id', $user->id)->get() ;

        if($user->level == 0) {
            $posts = Post::all() ;
        }

        return view('blog.index', compact('posts')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('blog.create') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:6',
            'content' => 'required'
        ]) ;
        $tags = rtrim($request['tags'], ',') ;
        $tags = str_replace(' ', '', $tags) ;
        $tags = explode(',', $tags) ;

        $tags_id = [] ;
        foreach( $tags as $tag ) {
            $tag_jumlah = Tag::where('nama_tag', $tag)->count() ;
            if( $tag_jumlah < 1 ) {
                // jika belum ada tag 
                $tag_id = Tag::create([
                    'nama_tag' => $tag 
                ]) ;

                $tags_id[] = $tag_id->id ;
            } else {
                $tag_id = Tag::where('nama_tag', $tag)->first() ;
                $tags_id[] = $tag_id->id ;
            }
        }

        $url =  str_replace(' ', '-', $request['title'] . '.html' ) ; 

        $posts = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request['title'],
            'content' => $request['content'],
            'url' => $url
        ]) ;

        $posts->tags()->attach($tags_id) ;

        return redirect()->route('posts.index') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id) ;
        $login_id = Auth::user()->id ;
        if( $post->user_id != $login_id ) {
            return abort('404') ;
        }

        $tags = $post->tags->pluck('nama_tag')->implode(', ') ;

        return view('blog.edit', compact('post', 'tags')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate( $request, [
            'title' => 'required|min:6',
            'content' => 'required'
        ]) ;

        $tags = explode(',', $request['tags']) ;
        $tags = str_replace(' ', '', $tags) ;

        $tags_id = [] ;
        foreach( $tags as $tag ) {

            $tag_jumlah = Tag::where('nama_tag', $tag)->count() ;
            if( $tag_jumlah < 1 ) {
                // jika belum ada tag 
                $tag_id = Tag::create([
                    'nama_tag' => $tag 
                ]) ;

                $tags_id[] = $tag_id->id ;
            } else {
                $tag_id = Tag::where('nama_tag', $tag)->first();

                $tags_id[] = $tag_id->id ;
            }

        }



        $posts = Post::find($id) ;

        $posts->tags()->detach() ;
        $posts->tags()->attach($tag_id) ;

        $posts->update([
            'title' => $request['title'],
            'content' => $request['content']
        ]) ;

        

        return redirect()->route('posts.index') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id) ;
        $post->delete() ;

        return redirect()->route('posts.index') ;
    }
}
