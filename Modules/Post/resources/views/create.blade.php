@extends('layouts.app')
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
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Image" class="form-label">Image</label>
            <input type="file" name="image"
                   class="form-control
                    @if($isSubmitted)
                        @error('image') is-invalid @else is-valid @enderror
                    @endif"
                   id="Image"
                   placeholder="Image input placeholder"
                   required minlength="3" value="{{ old('image') }}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title"
                   class="form-control
                    @if($isSubmitted)
                        @error('title') is-invalid @else is-valid @enderror
                    @endif"
                   id="title"
                   placeholder="title input placeholder"
                   required minlength="3" value="{{ old('title') }}"
            >

        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea
                    class="form-control
                    @if($isSubmitted)
                        @error('description') is-invalid @else is-valid @enderror
                    @endif"
                    name="description"
                    placeholder="description input placeholder" required
                    minlength="3">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Posted By</label>
            <select
                    class="form-control
                    @if($isSubmitted)
                        @error('user_id') is-invalid @else is-valid @enderror
                    @endif"
                    name="user_id"
                    aria-label="Default select example">
                <option value="" selected>Open this select menu</option>
                @foreach($users as $user)
                    <option @selected(old('user_id') == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection