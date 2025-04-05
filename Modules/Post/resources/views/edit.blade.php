@extends('post::layouts.master')
@section('content')
    @php
        $isSubmitted = old('_token') !== null;
    @endphp
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" class="form-control
                    @if($isSubmitted)
                        @error('title') is-invalid @else is-valid @enderror
                    @endif" id="title" placeholder="title input placeholder" required
                   value="{{ old('title', $post->title) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control
                    @if($isSubmitted)
                        @error('description') is-invalid @else is-valid @enderror
                    @endif" name="description" placeholder="description input placeholder"
                      required>{{ old('description', $post->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Posted By</label>
            <select
                    class="form-select
                    @if($isSubmitted)
                        @error('user_id') is-invalid @else is-valid @enderror
                    @endif" name="user_id" aria-label="Default select example" required>
                <option value="" selected>Open this select menu</option>
                @foreach($users as $user)
                    <option @selected(old('user_id', $post->user_id) == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection