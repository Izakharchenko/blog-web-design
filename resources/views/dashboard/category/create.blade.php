@extends('dashboard.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('categories.store')}} " method="post">
                @csrf
                <div class="mb-3">
                    <div class="form-group">
                        <label for="title">Категорія</label>
                        <input type="text" name='title' class="form-control" id="title" placeholder="Категорія">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Зберегти</button>
            </form>
        </div>
    </div>
</div>
@endsection