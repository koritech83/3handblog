@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/categories" class="btn btn-outline-primary btn-sm">Go back</a>
                <p>
                <h1 class="display-one">{{ ucfirst($category->title) }}</h1>
                <hr>
                @if (Auth::user()->admin)
                <a href="/categories/{{ $category->id }}/edit" class="btn btn-outline-primary">Edit Category</a>
                <p>
                <form id="delete-frm" class="" action="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Category</button>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection