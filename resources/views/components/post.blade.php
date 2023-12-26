<article class="blog-post" {{ $post }}>
    <h2 class="display-5 link-body-emphasis mb-1"><a href="#" class="blog-post-link"></a>{{ $post->title }}</h2>
    <p class="blog-post-meta">January 1, 2021 by {{$post->user->full_name}}</p>

    <p>{{ Str::of($post->text)->limit(220) }}</p>
    <hr>
</article>