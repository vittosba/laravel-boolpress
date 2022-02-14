@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Edit {{ $post->title }}</h1>

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Title*</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content*</label>
                <textarea class="form-control @error('title') is-invalid @enderror" type="text" id="content" name="content" rows="6">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">Uncategorized</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id)) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- TAGS --}}
            <div class="mb-3">
                <h4>Tags</h4>
                
                @foreach ($tags as $tag)
                    <span class="d-inline-block mr-3">
                        <input type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}" 
                            @if($errors->any() && in_array($tag->id, old('tags'))) 
                                checked 
                            @elseif(!$errors->any() && $post->tags->contains($tag->id))
                                checked
                            @endif>
                        <label for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
                    </span>
                @endforeach
                @error('tags')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- POST COVER IMAGE --}}
            <div class="mb-3">
                <label class="form-label" for="cover">Post Image</label>
                @if ($post->cover)
                    <figure class="mb-3">
                        <img width="200" src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
                    </figure>
                @endif
                <input type="file" class="form-control-file" name="cover" id="cover">
                @error('cover')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Update Post</button>
        </form>
    </div>
@endsection