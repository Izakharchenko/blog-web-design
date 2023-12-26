@extends('layouts.app')

@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Last news
        </h3>
        @foreach($posts as $post)
        <x-post :post=$post />
        @endforeach
        <nav aria-label="post navigation">
            {{ $posts->withQueryString()->links() }}
        </nav>
    </div>
    <div class="col-md-4">
        <x-about />
    </div>
</div>

@endsection