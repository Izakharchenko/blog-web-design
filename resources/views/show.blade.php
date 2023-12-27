@extends('layouts.app')

@section('content')
<div class="row g-5">
    <div class="col-md-8">
        <img src="{{ Storage::url($post->cover) }}" alt="{{ $post->title }}" class="img-fluid card-img-top">
        <h2 class="pb-4 mt-4 mb-4 fst-italic border-bottom"">
                {{ $post->title }}
        </h2>
        <p class=" blog-post-meta">{{ $post->created_at->format('M, d Y')  }} by {{ $post->user->full_name }}</p>
            {!! $post->text !!}


            <div class="container my-2 pb-2 text-dark">
                <div class="col-md-12">
                    @error('text')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf

                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class=" mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" rows="3" name="text" class="@error('text') is-invalid @enderror"></textarea>
                        </div>
                        <button @disabled(!Auth::check()) type="submit" class="btn btn-light">Submit</button>
                    </form>

                </div>
            </div>
            @if ($post->comments)
            @foreach($post->comments as $comment)
            <section {{ $comment }}>
                <div class="container pb-1 text-dark">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="d-flex flex-start mb-4">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                    <div>
                                        <h5>{{ $comment->user->full_name }}</h5>
                                        <p class="small">{{ $comment->created_at->format('M, d Y')  }}</p>
                                        <p>
                                            {{ $comment->text }}
                                        </p>

                                        <div class="d-flex justify-content-between align-items-center">
                                            @if(Auth::check() && Auth::user()->is_author)
                                            <form action="{{ route('comments.destroy', ['comment' => $comment->id ])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bnt-danger" type="submit"><i class="bi bi-trash3"></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            @endforeach
            @endif
    </div>
    <div class="col-md-4">
        <x-about />
    </div>
</div>

@endsection