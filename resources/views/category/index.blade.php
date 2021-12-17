@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Categories</h1>
                    </div>
                </div>
                <p>             
                @forelse($categories as $category)
                    <ul>
                        <li><a href="/categories/{{ $category->id }}">{{ ucfirst($category->title) }}</a></li>
                    </ul>
                @empty
                    <p class="text-danger">No Categories Found</p>
                @endforelse
            </div>
        </div>
        @if (Auth::user()->admin)
        <p><p>
    <a href="/categories/create/category" class="btn btn-primary btn-sm">Add Category</a>
    <a href="/blog/cat/0" class="btn btn-danger btn-sm">View Articles</a>
    @endif
    </div>
@endsection