@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row align-items-start">
            @if ($posts->count() && $tag)
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2>Посты по тегу: {{ $tag->title }}</h2>
            </div>
            @else
                <h2>Нет постов по данному тегу...</h2>
            @endif

            @foreach($posts as $post)
                <div class="col-md-6">

                    @if($post->hasTag())
                        <a href="{{ route('post.show', $post->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    @endif
                            <img src="{{ $post->getImage() }}" alt="Image placeholder" class="img-fluid">
                            <div class="blog-content-body">
                                <div class="post-meta">
                                    <span class="category">{{ $post->getCategoryTitle() }}</span>
                                    <small class="mr-1">{{ $post->getDate() }}</small>

                                    <small class="ml-1"><i class="fa fa-eye"></i>{{ $post->views }}</small>
                                </div>
                                <h5>{!! $post->description !!}</h5>
                            </div>
                        </a>

                </div>
            @endforeach


            <div class="row">
                <div class="col-md-12 pt-3">
                    <nav aria-label="Page navigation">
                        {{ $posts->links('vendor.pagination.default') }}
                    </nav>
                </div><!-- end col -->
            </div><!-- end row -->

        </div>
    </div>

    <!-- END main-content -->
@endsection
