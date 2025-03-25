@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title input placeholder">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <textarea class="form-control" name="description" placeholder="description input placeholder"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Posted By</label>
            <select class="form-select" name="user_id" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection