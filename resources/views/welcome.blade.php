@extends('layouts.app')

@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Last news
        </h3>
        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1"><a href="#" class="blog-post-link">Sample blog post</a></h2>
            <p class="blog-post-meta">January 1, 2021 by Mark</p>

            <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                typography, lists, tables, images, code, and more are all supported as expected.</p>
            <hr>
        </article>

        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1"><a href="#" class="blog-post-link">Sample blog post</a></h2>
            <p class="blog-post-meta">January 1, 2021 by Mark</p>

            <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                typography, lists, tables, images, code, and more are all supported as expected.</p>
            <hr>
        </article>
        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1"><a href="#" class="blog-post-link">Sample blog post</a></h2>
            <p class="blog-post-meta">January 1, 2021 by Mark</p>

            <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
                typography, lists, tables, images, code, and more are all supported as expected.</p>
            <hr>
        </article>
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