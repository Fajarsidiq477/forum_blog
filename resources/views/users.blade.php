@extends('layouts.template')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Daftar Users</div>
                    <div class="card-body">
                        <div class="row pl-5">
                            @include('userList', ['users'=> $users])
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
            var user_id = $(this).data('id') ;
            var cObj = $(this) ;
            var c = cObj.parent('div').find('.tl-follower').text() ;

            $.ajax({
                url  : "{{ route('users.toggleFollow') }}",
                type : 'POST',
                data : {
                    '_token' : "{{ csrf_token() }}",
                    'user_id': user_id
                },
                success : function(data) {
                    if( jQuery.isEmptyObject(data.success.attached) ) {
                        cObj.find('strong').text('Follow') ;
                        cObj.parent('div').find('.tl-follower').text(parseInt(c) - 1)
                    } else {
                        cObj.find('strong').text('UnFollow') ;
                        cObj.parent('div').find('.tl-follower').text(parseInt(c) + 1)                        
                    }
                }
            }) ;
        }) ;    
    </script>
@endsection