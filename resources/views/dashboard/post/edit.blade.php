@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name='title' class="form-control" id="title" placeholder="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="text">Content</label>
                    <textarea name='text' class="form-control" id="content" placeholder="text">{{$post->text}}</textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" name="cover" id="image" class="form-control" placeholder="cover">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control mb-3" id="category" name="category_id">
                        @foreach($categories as $category)
                        <option {{ $category->id === $post->category_id ? ' selected' : ''  }} value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select multiple class="form-control form-control-lg" id="tags" name="tags[]">
                        @foreach($tags as $tag)
                        <option @selected($post->tags->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-3 mt-3">Edit</button>
            </form>

            <a href="{{ route('post.index')}}" class="btn btn-dark"> Back </a>

        </div>
    </div>
</div>
<script>
    $('#content').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 220,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endsection