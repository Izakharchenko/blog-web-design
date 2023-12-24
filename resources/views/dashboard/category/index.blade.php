@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-success mb-3">Додати</a>
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Категорія</th>
                        <th scope="col">Створено</th>
                        <th scope="col">Дії</th>
                    </tr>
                </thead>
                @foreach($categories as $category)
                <tr scope="row">
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <a class="btn btn-primary" role="button" href="{{ route('categories.show', ['category' => $category->id]) }}">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a class="btn btn-primary" role="button" href="{{ route('categories.edit', ['category' => $category->id]) }}">
                            <i class="bi bi-pen"></i>
                        </a>
                        <form style="display:inline" action="{{ route('categories.destroy', ['category' => $category->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn bnt-danger" type="submit"><i class="bi bi-trash3"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </table>
            <nav aria-label="categories navigation">
                {{ $categories->withQueryString()->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection