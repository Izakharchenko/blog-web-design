@extends('layouts.app')
@section('content')

    <div> 
        <a href="{{ route('post.create')}}" class="btn btn-outline-success mb-3"> Create post</a>
    </div>
    @foreach($posts as $post)
       <div> <a href="{{ route('post.show', $post->id)}}" > {{$post->id}}. {{$post->title}} </a></div>
    @endforeach
@endsection