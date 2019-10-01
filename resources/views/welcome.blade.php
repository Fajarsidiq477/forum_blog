@extends('layouts.template')
@section('title', 'Welcome')

@section('content')


 <div class="header_wrap">
  <div class="info">
     <div class="container">
         <div class="row">
            <div class="col-md-7">
                 <div class="header_info">
                    <div class="descrip">
                        <a href="#">
                        <h1 style="color:#ece705; font-weight: bold;     margin-top: 0;">WELCOME</h1>
                          </a> 
                         <p>
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt.
                           </p><br>
                           <div>
                           <p>
                            <a href="{{ route('register') }}" class="btn btn-danger" >Signup</a>
                             <a href="{{ route('login') }}" class="btn btn-danger" >Login</a>
                            </p>

                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
 
        <section class="wp-separator">
            <article class="section">
                <div class="container">
                    <div class="text-center">
                        <h1>ACTIVITIES & EVENTS</h1>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum nam numquam voluptates cumque </p>
                    </div>
                </div>
            </article>
        </section>

<div class="container-fluid">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="well well-sm wl p-2">     
                            <div class="btn-group">
                                <a href="#" id="list" class="btn btn-light btn-sm border-right"><span class="fa fa-th-list">
                                </span> List</a><a href="#" id="grid" class="btn btn-light btn-default btn-sm border-left"><span
                                class="fa fa-th"></span> Grid</a>
                            </div>
                        </div>
                        <div id="grid_post" class="row">
                            @foreach ($posts as $post)
                            <div class="item  col-12 col-md-6 mt-3">
                                    <div class="card">
                                        <img src="{{ asset('images/blog/' . $post->post_img )}}" class="card-img-top">
                                        <div class="card-body">
    
                                                <h4 class="card-title"><a href="{{ route('viewer.postPage', $post->url) }}">{{ $post->title }}</a></h4>
                                                <small style="font-style:italic"> {{ $post->created_at->diffForHumans() }}</small> | by <a href="{{ route('user.username', $post->user->username) }}">{{ $post->user->name }}</a>
    
                                                <p class="card-text">{{ wordlimit($post->content, 100) }}</p>
                                            <hr>
    
                                            <a href="{{ route('viewer.postPage', $post->url) }}" class="btn btn-primary">Baca</a>
                                            </div>
                                    </div>
                                </div>    
                            @endforeach
                            
                        </div><!-- end grid -->
                    </div>
                    <div class="col-9 mt-4 d-none" id="pagination-sm" >
                {{ $posts->links() }}
                       
                </div>
                    <div class="col-md-3 mt-3 mt-lg-0">
                        <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
                            <a href="{{ route('tags.all') }}" class="list-group-item active">
                            Total {{ count($tags) }} Tags <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small></a>
                            @foreach ($tags as $tag)
                                <a href="{{ route('tags.detail', $tag->nama_tag) }}" class="list-group-item">{{ $tag->nama_tag }}</a>                                
                            @endforeach
                        </div>
                      
                        <div class="ads-img" style="border: 11px solid #eee;">
                            <img src="{{ asset('images/img-sid.jpeg')}}" style="width: 100%; height: auto;">
                        </div>
                    </div>
                </div><!-- end row -->  
                {{ $posts->links() }}
                
            </div>
        </section>
</div><!-- end con fluid -->
@endsection
