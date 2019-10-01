@foreach ($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user['name'] ? $comment->user['name'] : 'anonymous' }}</strong>
        <small>{{ $comment->created_at->diffForHumans() }}</small>
        <p>{{ $comment->body }}</p>

        <form action="{{ route('reply.add') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach