@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Post Details</h1>
        <h2>{{ $post->title }}</h2>

        <div class="mb-5">
            <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Back to archive</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                {!! $post->content !!}
            </div>
            <div class="col-md-6">
                Image here
            </div>
        </div>
    </div>
@endsection