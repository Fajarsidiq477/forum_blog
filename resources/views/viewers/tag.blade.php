@extends('layouts.template')

@section('title', 'Tag')    

@section('content')
    <div class="container py-5">
        <div class="col-12">
                <h2>Daftar Tag</h2>

                <div class="col-4">
                    <ul class="list-group">
                        @foreach ($tags as $tag)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('tags.detail', $tag->nama_tag) }}">{{ $tag->nama_tag }}</a>
                                <span class="badge badge-primary badge-pill">1</span>
                            </li>    
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>
@endsection