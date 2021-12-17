@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                @if (Auth::user()->admin)
                <div class="card-header alert alert-danger">{{ __('Welcome ') }} {{Auth::user()->name}} {{ __('(This Is An Admin Account)') }}</div>
                @else
                <div class="card-header alert alert-warning">{{ __('Welcome ') }} {{Auth::user()->name}} {{ __('(This Is A Visitor Account)') }}</div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Articles</h1>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-8">

                    Filter By Category

@php
$categories = App\Models\Category::all();
@endphp
<select id="category">
<option value="/blog/cat/0">All
@foreach($categories as $category)
<option value="/blog/cat/{{$category->id}}">{{$category->title}}
@endforeach
</select>
<a href="#" class="btn btn-danger btn-sm" onclick="view_articles()">View</a>
<script>
function view_articles()
{
cat = document.getElementById('category').value;
window.location = document.getElementById('category').value;
}
</script>


                    </div>
                 </div><p>
                @forelse($posts as $post)
                    <ul>
                        <li><a href="/blog/{{ $post->id }}">{{ ucfirst($post->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-danger">No Articles Found</p>
                @endforelse
            </div>
        </div>

    @if (Auth::user()->admin)
    <p><p>
    <a href="/blog/create/post" class="btn btn-primary btn-sm">Add Article</a>
    <a href="/categories" class="btn btn-danger btn-sm">View Categories</a>
    @endif
    </div>

@endsection