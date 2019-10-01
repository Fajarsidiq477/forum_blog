@if ($users->count())
    @foreach ($users as $user)
        <div class="col-2 profile-box p-1 rounded text-center bg-light mr-4 mt-3">
            <img src="https://dummyimage.com/165x166/420542/edeef5&text=ItSolutionStuff.com" class="w-100 mb-1">
            <h5 class="m-0">
                <a href="{{ route('user.username', $user->username) }}"><strong>{{ $user->name }}</strong></a>
            </h5>

            <p class="mb-2">
                <small>Following : </small> <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span>
                <small>Followers : </small> <span class="badge badge-primary tl-follower">{{ $user->followers()->get()->count() }}</span>
            </p>
            <button class="btn btn-info btn-sm action-follow text-white" data-id="{{ $user->id }}">
                <strong>
                    @if (auth()->user()->isFollowing($user))
                        Unfollow
                    @else
                        Follow
                    @endif
                </strong>
            </button>
        </div>
    @endforeach
@endif