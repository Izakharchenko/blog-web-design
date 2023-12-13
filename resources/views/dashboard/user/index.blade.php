@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Повне ім'я</th>
                        <th scope="col">Email</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Створено</th>
                        <th scope="col">Дії</th>
                    </tr>
                </thead>
                @foreach($users as $user)
                <tr scope="row">
                    <td>{{$user->id}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->is_author ? 'Так': 'Ні'}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}"><i class="bi bi-pen"></i></a>
                        @if(Auth::id() !== $user->id)
                        <form style="display:inline" action="{{ route('users.destroy', ['user' => $user->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn bnt-danger" type="submit"><i class="bi bi-trash3"></i></button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach

                <tfoot>

                </tfoot>
            </table>
            <nav aria-label="Users navigation">
                {{ $users->withQueryString()->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection