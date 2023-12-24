@extends('layouts.app')
@section('content')
<form action="{{route('post.store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name = 'title' class="form-control" id="title" placeholder="title">
  </div>
  <div class="form-group">
    <label for="text">Content</label>
    <textarea name = 'text' class="form-control" id="content" placeholder="text"></textarea>
  </div>
  <div class="form-group">
    <label for="cover">Cover</label>
    <input type="text"  name = 'cover' class="form-control" id="cover" placeholder="cover">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1 ">Category</label>
    <select class="form-control mb-3" id="exampleFormControlSelect1" name="category_id">
      @foreach($categories as $category)
      <option value="{{$category->id}}">{{$category->title}}</option>
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

  <button type="submit" class="btn btn-primary mb-3">Create</button>
</form>

<a href="{{ route('post.index')}}" class="btn btn-dark"> Back </a>
@endsection