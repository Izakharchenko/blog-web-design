@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('tags.update', ['tag' => $tag->id])}} " method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <div class="form-group">
                        <label for="title">Tag</label>
                        <input type="text" name='title' class="form-control" id="title" placeholder="Tag" value="{{$tag->title}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection