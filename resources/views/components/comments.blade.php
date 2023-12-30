<div>
    <section>
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
                                @if(Auth::check())
                                <x-comment :post="$post" :comment="$comment" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Перевірка наявності дочірніх коментарів -->
    @if(count($comment->comments))
    <div style="margin-left: 50px;">
        @foreach($comment->comments as $reply)
        <x-comments :comment="$reply" :post=$post />
        @endforeach
    </div>
    @endif
</div>