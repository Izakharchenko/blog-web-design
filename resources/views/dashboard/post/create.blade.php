@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name='title' class="form-control" id="title" placeholder="title">
                </div>
                <div class="form-group">
                    <label for="text">Content</label>
                    <textarea name='text' class="form-control" id="content" placeholder="text"></textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" name="cover" id="image" class="form-control" placeholder="cover" required>
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
                    <select multiple class="form-control form-control-lg" id="tags" name="tags[]">
                        @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-3 mt-3">Create</button>
            </form>

            <a href="{{ route('post.index')}}" class="btn btn-dark mb-3"> Back </a>

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