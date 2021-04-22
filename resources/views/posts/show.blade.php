@extends('layouts.single')

@section('content')
    @if(session()->has('success'))
        <div class="alert alert-info mt-2">
            {{ session('success') }}
        </div>
    @endif
        <h1 class="mb-4">{{ $post->title }}</h1>
        <div class="post-meta">
            <span class="category">{{ $post->getCategoryTitle() }}</span>
            <span class="mr-2">{{ $post->getDate() }}</span> •
            <span class="ml-2"><span class="fa fa-eye"></span>{{ $post->getViews() }}</span>
        </div>
        <div class="post-content-body">
            <p>{!! $post->description !!}</p>
            <div class="row mb-5">
                <div class="col-md-12 mb-4 element-animate fadeInUp element-animated">
                    <img src="{{ $post->getImage() }}" alt="Image placeholder" class="img-fluid">
                </div>
            </div>
            <p>{!! $post->content !!}</p>
        </div>

    <div class="pt-5">
        <div>
            <p>Автор статьи: {{ $post->author->name }}</p>
        </div>
    </div>

        <div class="pt-5">
            @if($post->tags->count())
                    <div>
                        <span>Теги:</span>
                        @foreach($post->tags as $tag)
                            <span><a class="btn btn-outline-secondary" href="" title="">{{ $tag->title }}</a></span>
                        @endforeach
                    </div><!-- end meta -->
            @endif
        </div>

        <div class="pt-5">
            @if(!$post->comments->isEmpty())
            <h3 class="mb-5">Комментарии</h3>
            <ul class="comment-list">
                @foreach($post->getComments() as $comment)
                <li class="comment">
                    <div class="vcard">
                        <img src="{{ $comment->author->getImage() }}" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                        <h3>{{ $comment->author->name }}</h3>
                        <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
                        <p>{{ $comment->text }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
            <!-- END comment-list -->
            @if(Auth::check() || Auth::viaRemember())
            <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Добавить комментарий</h3>
                <form action="/comment" class="p-5 bg-light" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Отправить комментарий" class="btn btn-primary">
                    </div>

                </form>
            </div>
            @endif
        </div>
@endsection
