@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title input placeholder" required value="{{ old('title', $user->title) }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" name="description" placeholder="description input placeholder" required>{{ old('description', $user->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">usered By</label>
            <select class="form-select" name="user_id" aria-label="Default select example" required>
                <option value="" selected>Open this select menu</option>
                @foreach($users as $user)
                    <option @selected(old('user_id', $user->user_id) == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection