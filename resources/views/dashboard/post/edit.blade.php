@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<form action="{{route('post.update', $post->id)}}" method="post">
    @csrf
    @method('patch')
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name = 'title' class="form-control" id="title" placeholder="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label for="text">Content</label>
    <textarea name = 'text' class="form-control" id="content" placeholder="text">{{$post->text}}</textarea>
  </div>
  <div class="form-group">
    <label for="cover">Cover</label>
    <input type="text"  name = 'cover' class="form-control" id="cover" placeholder="cover" value="{{$post->cover}}" > 
  </div>
  <div class="form-group">
    <label for="category">Category</label>
    <select class="form-control mb-3" id="category" name="category_id">
      @foreach($categories as $category)
      <option
      {{ $category->id === $post->category_id ? ' selected' : ''  }}
      
      value="{{$category->id}}">{{$category->title}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
  <label for="tags">Tags</label>
  <select multiple class="form-control" id="tags" name="tags[]">
    @foreach($tags as $tag)
      <option value="{{ $tag->id }}">{{ $tag->title }}</option>
    @endforeach
  </select>
</div>
  <button type="submit" class="btn btn-primary mb-3">Edit</button>
</form>

<a href="{{ route('post.index')}}" class="btn btn-dark"> Back </a>

</div>
    </div>
</div>
@endsection