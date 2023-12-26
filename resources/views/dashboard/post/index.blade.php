@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <div> 
        <a href="{{ route('post.create')}}" class="btn btn-outline-success mb-3"> Create post</a>
    </div>
    <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Заголовок</th>
                        <th scope="col">Створено</th>
                        <th scope="col">Дії</th>
                    </tr>
                </thead>
                @foreach($posts as $post)
                <tr scope="row">
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a class="btn btn-primary" role="button" href="{{ route('post.show', ['post' => $post->id]) }}">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="btn btn-primary" role="button" href="{{ route('post.edit', ['post' => $post->id]) }}">
                            <i class="bi bi-pen"></i>
                        </a>
                        <form style="display:inline" action="{{ route('post.delete', ['post' => $post->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn bnt-danger" type="submit"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
            <nav aria-label="post navigation">
                {{ $posts->withQueryString()->links() }}
            </nav>
    
    </div>
    </div>
</div>
@endsection