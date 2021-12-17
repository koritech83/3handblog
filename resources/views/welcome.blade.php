@if (!Auth::guest())
<script>window.location="blog/cat/0";</script>
@endif

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-5">
                <h1 class="display-one mt-5 text-success">Welcome To {{ config('app.name') }}</h1>
                <p class="text-danger">Login or Register to view the blog articles</p>
            </div>
        </div>
    </div>
@endsection