@extends('layouts.template')

@section('content')
<style>
    .display-comment .display-comment {
        margin-left : 40px ;
    }
</style>
    <div class="container py-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <h2 class="text-center my-4">{{ $post->title }}</h2>

                    <div class="col-6 mx-auto">
                            <img src="../images/mostafa-meraji-cf9pz8D1pm0-unsplash.jpg" class="card-img-top">

                    </div>
                    <p class="text-center mt-3">{{ $post->created_at }} | <i class="fa fa-user"></i> {{ $post->user_id }}</p>

                    <p class=" container">
                  
                        {!! $post->content !!}
                    </p>
                </div>
            </div>    

            <hr>
            <h4>Comments</h4>
            @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])             


           

            <hr>

            <h4>Add Comment</h4>
            <form action="{{ route('comment.add') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment_body" class="form-control">

                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
@endsection