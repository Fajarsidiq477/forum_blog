@extends('layouts.template')

@section('content')
    <div class="container py-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="text-center">
                            <h4>Buat Post Baru</h4>
                        </div>

                        <div class="form-group">
                            <label for="title"><b>Title :</b></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="input title...">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tags"><b>Tags :</b></label>
                            <input type="text" name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror" placeholder="Input Tags...">
                            <p class="text-danger">Pisahkan tags memakai <b>,</b></p>
                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="content" id="editor" name="content" class="form-control">
                                Content
                            </textarea>
                            @error('content')
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


    <script src="{{ asset('ckeditor5-build-classic/ckeditor.js')}}"></script>
    <script>
        ClassicEditor.create( document.querySelector( '#editor' ) ) ;
    </script>
@endsection