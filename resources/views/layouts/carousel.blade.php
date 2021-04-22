<section class="site-section pt-3 pb-md-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="owl-carousel owl-theme home-slider">
                @if($featuredPosts->count())
                    @foreach($featuredPosts as $post)
                    <div>
                        <a href="{{ route('post.show', $post->slug) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url({{ $post->getImage() }}); ">
                            <div class="text half-to-full">
                                <div class="post-meta">
                                    <span class="category">{{ $post->getCategoryTitle() }}</span>
                                    <span class="mr-2">{{ $post->getDate() }}</span> &bullet;
                                    <span class="ml-2"><span class="fa fa-eye"></span>{{ $post->getViews() }}</span>
                                </div>
                                <h3>{{ $post->title }}</h3>
                                <p>{!! $post->description !!}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                @endif
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END section -->
