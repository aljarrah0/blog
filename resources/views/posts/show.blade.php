@extends('layouts.app')
@section('content')
    <div class="text-center">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                </div>
                Post Details
                <div class="float-end">
                    <form style="display:inline" method="POST" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->description }}</p>
            </div>
        </div>
    </div>
@endsection