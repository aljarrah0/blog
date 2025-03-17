@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('posts.update', 1) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Example label</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="title input placeholder">
        </div>
        <div class="mb-3">
            <select class="form-select" name="posted_by" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection