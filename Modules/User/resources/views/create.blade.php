@extends('user::layouts.master')
@section('content')
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @else is-valid @enderror" id="name"
                   placeholder="name input placeholder"
                   required minlength="3" value="{{ old('name') }}"
            >
            @error('name')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @else is-valid @enderror" id="email"
                   placeholder="email input placeholder"
                   required minlength="3" value="{{ old('email') }}"
            >
            @error('email')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @else is-valid @enderror" id="password"
                   placeholder="password input placeholder"
                   required minlength="3" value="{{ old('password') }}"
            >
            @error('password')
            <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection