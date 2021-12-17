@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/cat/0" class="btn btn-outline-primary btn-sm">Go back</a>
                <p>
                <h1 class="display-one">
                    {{ ucfirst($post->title) }}
<span style="color:green;">
(Article Category:
@php
$category = App\Models\Category::where('id',$post->category_id)->first();
echo $category->title;
@endphp
)
</span>
                </h1>
                <p>{!! $post->contents !!}</p> 
                <hr>
                @if (Auth::user()->admin)
                <a href="/blog/{{ $post->id }}/edit" class="btn btn-outline-primary">Edit Article</a>
                <p>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Article</button>
                </form>
                @endif


<p>
@include('blog.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
<p>
<h4>Leave a comment</h4>
<form method="post" action="{{ route('comment.store'   ) }}">
    @csrf
    <div class="form-group">
        <textarea class="form-control" name="content"></textarea>
        <input type="hidden" name="post_id" value="{{ $post->id }}" />
    </div>
    <p>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Add Comment" />
    </div>
</form>


            </div>
        </div>
    </div>
@endsection