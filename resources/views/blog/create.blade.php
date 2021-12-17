@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/cat/0" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4" style="padding:10px;">
                    <h1 class="display-4">Create a New Article</h1>
                    <p>Fill and submit this form to create an article</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf

Category:
@php
$categories = App\Models\Category::all();
@endphp
<select id="category" name="category">
@foreach($categories as $category)
<option value="/blog/cat/{{$category->id}}">{{$category->title}}
@endforeach
</select>

                        <p>
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Article Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Article Title" required>
                            </div>
                            <p>
                            <div class="control-group col-12 mt-2">
                                <label for="contents">Article Contents</label>
                                <textarea id="contents" class="form-control" name="contents" placeholder="Enter Article Contents"
                                          rows="" required></textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Create Article
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection