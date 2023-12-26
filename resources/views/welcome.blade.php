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
        <!-- Need move to component -->
        <div class="position-sticky" style="top: 2rem;">
            <div class="p-4 mb-3 bg-body-tertiary rounded">
                <h4 class="fst-italic">About</h4>
                <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers,
                    content, or something else entirely. Totally up to you.</p>
            </div>
        </div>
    </div>
</div>

@endsection