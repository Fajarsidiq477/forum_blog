<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post ;
use App\Models\Tag ;
use App\Models\User;

class ViewerController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(6) ;
        $tags = Tag::limit(3)->get() ;

        return view('welcome', compact('posts', 'tags')) ;
    }

    public function user($username)
    {  
        $user = User::where('username', $username)->first() ;

        return view('viewers.userBio', compact('user')) ;
    }

    public function userProfile()
    {
        
    }

    public function showTag() 
    {
            $tags = Tag::all() ;

        return view('viewers.tag', compact('tags')) ;
    }

    public function ShowTagDetail($nama_tag)
    {
        $tag = Tag::where('nama_tag', $nama_tag)->first() ;

        if( $tag != null ) $posts = $tag->posts ;
        else $posts = null ;

        return view('viewers.tagDetail', compact('tag', 'posts')) ;
    }
    

    public function postPage($url) 
    {
        $post = Post::where('url', $url)->first() ;

        return view('viewers.page', compact('post')) ;
    }
}
