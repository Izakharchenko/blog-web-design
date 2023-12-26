@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped border">
                <thead>
                    <tr>
                        <th scope="col">Ключ</th>
                        <th scope="col">Значення</th>
                    </tr>
                </thead>
                <tr scope="row">
                    <td>id</td>
                    <td>{{$tag->id}}</td>
                </tr>
                <tr scope="row">
                    <td>Категорія</td>
                    <td>{{$tag->title}}</td>
                </tr>
                <tr scope="row">
                    <td>Створено</td>
                    <td>{{$tag->created_at}}</td>
                </tr>
                <tr scope="row">
                    <td>Редаговано</td>
                    <td>{{$tag->updated_at}}</td>
                </tr>
        </div>
    </div>
</div>
@endsection