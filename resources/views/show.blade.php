@extends('layouts.app')

@section('content')

@push('fb-property')
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Blog about web design" />
<meta property="og:description" content="{{ Str::of(strip_tags($post->text))->limit(120) }}" />
<meta property="og:image" content="{{ asset(Storage::url($post->cover)) }}" />
@endpush

<div class="row g-5">
    <div class="col-md-8">
        <img src="{{ Storage::url($post->cover) }}" alt="{{ $post->title }}" class="img-fluid card-img-top">
        <h2 class="pb-4 mt-4 mb-4 fst-italic border-bottom"">
                {{ $post->title }}
        </h2>
        <p class=" blog-post-meta">{{ $post->created_at->format('M, d Y')  }} by {{ $post->user->full_name }}</p>
            <p class="mt-3">
                @foreach($post->tags as $tag)
                <a href="{{ route ('tags', ['tag_id' => $tag->id])}}"><span class="badge bg-secondary"> {{ $tag->title }}</span></a>
                @endforeach
            </p>
            {!! $post->text !!}


            <div class="fb-share-button mb-3" data-href="{{ 'https://localhost.com/'.  url()->current() }}" data-layout="" data-size=""><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Поширити</a></div>

            <div class="container my-2 pb-2 text-dark">
                <div class="col-md-12">
                    <x-comment :post=$post />
                </div>
            </div>

            @if (count($post->comments))
            @foreach($post->comments as $comment)
            @if($comment->comment_id === null)
            <x-comments :comment=$comment :post=$post />
            @endif
            @endforeach
            @endif
    </div>
    <div class="col-md-4">
        <x-about />
    </div>
</div>

@endsection