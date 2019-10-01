@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf @method('PATCH')
                    <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                    <div class="card-body">
                        <div class="text-center">
                            <h4>Edit Post</h4>
                        </div>

                        <div class="form-group">
                            <label for="title"><b>Title :</b></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="input title..." value="{{ $post->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content"><b>Content :</b></label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" placeholder="Input content..." style="resize:none">{{ $post->content }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags"><b>Tags :</b></label>
                            <input type="text" name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror" placeholder="Input Tags..." value="{{ $tags }}">
                            <p class="text-danger">Pisahkan tags memakai <b>,</b></p>
                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-save"></i> Save</button>

                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection