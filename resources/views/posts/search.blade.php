@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row align-items-start">
            @if($posts->count())
            @foreach($posts as $post)
                <div class="col-md-6">

                    @if($post->hasCategory())
                        <a href="{{ route('post.show', $post->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    @endif
                            <img src="{{ $post->getImage() }}" alt="Image placeholder" class="img-fluid">
                            <div class="blog-content-body">
                                <div class="post-meta">
                                    <span class="category">{{ $post->getCategoryTitle() }}</span>
                                    <small class="mr-1">{{ $post->getDate() }}</small>

                                    <small class="ml-1"><i class="fa fa-eye"></i>{{ $post->views }}</small>
                                </div>
                                <h5>{{ $post->description}}</h5>
                            </div>
                        </a>
                </div>
            @endforeach
            @else
            <div class="alert-ingo">По вашему запросу ничего не найдено...</div>
            @endif

            <div class="row">
                <div class="col-md-12 pt-3">
                    <nav aria-label="Page navigation">
                        {{ $posts->appends(['s' => request()->s])->links('vendor.pagination.default') }}
                    </nav>
                </div><!-- end col -->
            </div><!-- end row -->

        </div>
    </div>

    <!-- END main-content -->
@endsection
