<form method="post" action="{{ route('comments.store') }}" id="comment{{ $comment !== null ? $comment->id : '' }}">
    @csrf
    @error('text')
    <div class=" alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="hidden" name="post_id" value="{{ $post->id }}">

    @if($comment !== null)
    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
    @endif
    <div class=" mb-3">
        <label for="comment" class="form-label">Comment</label>
        <textarea class="form-control" rows="3" name="text" class="@error('text') is-invalid @enderror"></textarea>
    </div>
    <input @disabled(!Auth::check()) type="submit" class="btn btn-light" value="Submit" form="comment{{ $comment !== null ? $comment->id : '' }}"></input>
</form>