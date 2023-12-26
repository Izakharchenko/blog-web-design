@extends('dashboard.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

    <div> 
        <a href="{{ route('tags.create')}}" class="btn btn-outline-success mb-3">Додати</a>
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
                @foreach($tags as $tag)
                <tr scope="row">
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td>
                        <a class="btn btn-primary" role="button" href="{{ route('tags.show', ['tag' => $tag->id]) }}">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="btn btn-primary" role="button" href="{{ route('tags.edit', ['tag' => $tag->id]) }}">
                            <i class="bi bi-pen"></i>
                        </a>
                        <form style="display:inline" action="{{ route('tags.destroy', ['tag' => $tag->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn bnt-danger" type="submit"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
            <nav aria-label="post navigation">
                {{ $tags->withQueryString()->links() }}
            </nav>
    
    </div>
    </div>
</div>
@endsection