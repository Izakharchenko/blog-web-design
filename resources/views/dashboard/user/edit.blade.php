@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full name</label>
                    <input type="text" name="full_name" class="form-control" id="full_name" placeholder="ПІБ" value="{{ $user->full_name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" />
                </div>
                <div class="mb-3">
                    <label for="is_author" class="form-label">Author</label>
                    <select name="is_author" class="form-select" aria-label="Чи автор" id="is_author">
                        <option value="1" @if($user->is_author == 1) selected @endif>Yes</option>
                        <option value="0" @if($user->is_author == 0) selected @endif>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection