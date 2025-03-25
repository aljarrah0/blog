@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title input placeholder" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" name="description" placeholder="description input placeholder">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Posted By</label>
            <select class="form-select" name="posted_by" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection