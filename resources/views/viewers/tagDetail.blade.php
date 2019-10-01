@extends('layouts.template')

@section('title', 'Tag ' . isset($tag->nama_tag ) ? $tag->nama_tag : '' )

@section('content')
<div class="container py-5">
    <div class="row">
            <div class="col-md-12">
                <h2>Tag : {{ $tag->nama_tag }}</h2>
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

                                        <h4 class="card-title"><a href="/b/{{ $post->url }}">{{ $post->title }}</a></h4>
                                        <small style="font-style:italic"> {{ $post->created_at->diffForHumans() }}</small> | by <a href="{{ route('user.detail') }}">{{ $post->user->name }}</a>

                                        <p class="card-text">{{ wordlimit($post->content, 100) }}</p>
                                    <hr>

                                    <a href="/b/{{ $post->url }}" class="btn btn-primary">Baca</a>
                                    </div>
                            </div>
                        </div>    
                    @endforeach
                    
                </div><!-- end grid -->
                </div>
                <div class="col-9 mt-4 d-none" id="pagination-sm" >
    </div>
</div>
  
@endsection
    