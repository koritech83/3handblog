@foreach($comments as $comment)
    <div style="border:1px solid #000;padding:5px;margin-bottom:5px;background-color:silver;" class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}  ({{ $comment->created_at }})</strong>
        <p>{{ $comment->content }}</p>
        <form method="post" action="{{ route('comment.store') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
        </form>
        
    </div>
@endforeach