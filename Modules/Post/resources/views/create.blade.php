@extends('post::layouts.master')
@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @else is-valid @enderror" id="title"
                   placeholder="title input placeholder"
                   required minlength="3" value="{{ old('title') }}"
            >
            @error('title')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control @error('description') is-invalid @else is-valid @enderror" name="description"
                      placeholder="description input placeholder" required
                      minlength="3">{{ old('description') }}</textarea>
            @error('description')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Posted By</label>
            <select class="form-select @error('user_id') is-invalid @else is-valid @enderror" name="user_id" aria-label="Default select example">
                <option value="" selected>Open this select menu</option>
                @foreach($users as $user)
                    <option @selected(old('user_id') == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection