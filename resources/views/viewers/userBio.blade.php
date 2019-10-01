@extends('layouts.template')

@section('title', 'Biodata User')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-lg-6">
                <h2>User Bio</h2>
                <div class="card">
                    <div class="card-body row">
                        <div class="col-6 col-sm-4">
                                <img src="{{ asset('images/avatar\/') . $user->foto  }}" class="img-thumbnail  rounded-circle" alt="Profile">
                        </div>
                            @if ( auth()->user()->id != $user->id )
                                <div class="col-2 my-auto">
                                    <button class="btn btn-primary action-follow" data-id="{{ $user->id }}">
                                        {{auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow'}}
                                    </button>
                                </div>
                            @else
                                <div class="col-6 mt-4 m-auto row">
                                    <p class="col lead">
                                        Following <br>
                                        {{ auth()->user()->followings()->count() }}
                                    </p>
                                    <p class="col lead">
                                        Follower <br>
                                        {{ auth()->user()->followers()->count() }}


                                    </p>
                                </div>
                            @endif
                        <div class="col-12 mt-3">
                            <ul class="list-group">
                                <li class="list-group-item">Nama : {{ $user->name }}</li>
                                <li class="list-group-item">Email : {{ $user->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.action-follow').click(function(){

            var cObj = $(this) ;

            $.ajax({
                url : "{{ route('users.toggleFollow') }}",
                type : 'POST',
                data : {
                    '_token' : '{{ csrf_token() }}',
                    'user_id' : $(this).data('id') 
                },
                success : function(data) {
                    if( jQuery.isEmptyObject(data.success.attached) ) {
                        cObj.text('Follow') ;
                    } else {
                        cObj.text('UnFollow') ;
                    }
                }
            }) ;
        }) ;
              
    </script>
@endsection