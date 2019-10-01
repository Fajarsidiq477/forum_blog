@extends('layouts.template')

@section('content')
    <div class="container py-5">
        <div class="col-12">
            <h1>Daftar Post</h1>

            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle"></i>
                Tambah Post
            </a>

            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hero Image</th>
                        <th>Judul</th>
                        <th>Tags</th>
                        <th>Jumlah Tag</th>
                        <th><i class="fa fa-code"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $i => $post)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><img src="{{ asset('images/blog/' . $post->post_img) }}" class="img-thumbnail" alt="pic"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->tags->pluck('nama_tag')->implode(',') }}</td>
                            <td>{{ $post->tags->pluck('nama_tag')->count() }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy',$post->id) }}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection