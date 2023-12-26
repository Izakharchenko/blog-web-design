<article class="blog-post" {{ $post }}>
    <h2 class="display-5 link-body-emphasis mb-1">
        <a href="{{ route('show', ['post' => $post->id ]) }}" class="blog-post-link">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">{{ $post->created_at->format('M, d Y')  }} by {{ $post->user->full_name }}</p>
    <p>{{ Str::of(strip_tags($post->text))->limit(220) }}</p>
    <hr>
</article>