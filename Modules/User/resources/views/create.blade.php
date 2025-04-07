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
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" name="name" class="form-control
            @if($isSubmitted) @error('name') is-invalid @else is-valid @enderror @endif" id="name"
                   placeholder="name input placeholder"
                   required minlength="3" value="{{ old('name') }}"
            >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="email" name="email"
                   class="form-control @if($isSubmitted) @error('email') is-invalid @else is-valid @enderror @endif"
                   id="email"
                   placeholder="email input placeholder"
                   required minlength="3" value="{{ old('email') }}"
            >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" name="password"
                   class="form-control @if($isSubmitted) @error('password') is-invalid @else is-valid @enderror @endif"
                   id="password"
                   placeholder="password input placeholder"
                   required minlength="3" value="{{ old('password') }}"
            >
        </div>
        <button type="submit" class="btn btn-success">create</button>
    </form>
@endsection