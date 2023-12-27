@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <img src="{{ Storage::url($post->cover) }}" alt="{{ $post->title }}" class="img-fluid card-img-top">
            <div> {{$post->id}}. {{$post->title}} </div>
            <div> {!!$post->text !!}</div>

            <div>
                <a href="{{ route('post.edit', $post->id)}}" class="btn btn-primary mb-3"> Edit </a>
            </div>

            <div>
                <form action="{{ route('post.delete', $post->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete" class="btn btn-danger mb-3">
                </form>
            </div>

            <div>
                <a href="{{ route('post.index')}}" class="btn btn-dark"> Back </a>
            </div>
        </div>
    </div>
</div>

@endsection