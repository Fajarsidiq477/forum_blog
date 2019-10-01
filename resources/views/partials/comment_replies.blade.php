@foreach ($comments as $comment)
<div class="display-comment ml-3">
    <strong>{{ $comment->user->name }}</strong>
    <small>{{ $comment->created_at->diffForHumans() }}</small>

    <p>{{ $comment->body }}
    </p>
    <a href="" id="reply"></a>
    <form action="{{ route('reply.add') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="comment_body" class="form-control">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-warning">Reply</button>
        </div>
    </form>
</div>
@endforeach