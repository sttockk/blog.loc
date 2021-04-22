<div class="col-md-12 col-lg-4 sidebar">
    <!-- END sidebar-box -->
    <div class="sidebar-box">
        <h3 class="heading">Популярные статьи</h3>
        <div class="post-entry-sidebar">
        @if($popularPosts->count())
            @foreach($popularPosts as $post)
            <ul>
                <li>
                    <a href="{{ route('post.show', $post->slug) }}">
                        <img src="{{ $post->getImage() }}" alt="Image placeholder" class="mr-4">
                        <div class="text">
                            <h4>{{ $post->title }}</h4>
                            <div class="post-meta">
                                <span class="mr-2">{{ $post->getDate() }}</span> &bullet;
                                <span class="ml-2"><span class="fa fa-eye"></span>{{ $post->getViews() }}</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
            @endforeach
        @else
        <div><span>Пока нет популярных постов...</span></div>
        @endif

        </div>
    </div>
    <!-- END sidebar-box -->
    <!-- END sidebar-box -->
    <div class="sidebar-box">
        <h3 class="heading">Рекомендованные статьи</h3>
        <div class="post-entry-sidebar">
         @if($featuredPosts->count())
            @foreach($featuredPosts as $post)
                <ul>
                    <li>
                        <a href="{{ route('post.show', $post->slug) }}">
                            <img src="{{ $post->getImage() }}" alt="Image placeholder" class="mr-4">
                            <div class="text">
                                <h4>{{ $post->title }}</h4>
                                <div class="post-meta">
                                    <span class="mr-2">{{ $post->getDate() }}</span> &bullet;
                                    <span class="ml-2"><span class="fa fa-eye"></span>{{ $post->getViews() }}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            @endforeach
         @else
             <div><span>Пока нет рекомендованных постов...</span></div>
         @endif
        </div>
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading">Категории</h3>
    @if($categories->count())
        @foreach($categories as $category)
        <ul class="categories">
            <li><a href="{{ route('categories.single', $category->slug) }}">{{ $category->title }}<span>({{ $category->posts()->count() }})</span></a></li>
        </ul>
        @endforeach
    @else
         <div><span>Пока нет категорий...</span></div>
    @endif
    </div>
    <!-- END sidebar-box -->

    <div class="sidebar-box">
        <h3 class="heading">Теги</h3>
    @if($tags->count())
        @foreach($tags as $tag)
        <ul class="tags">
            <li class="m-1"><a href="{{ route('tags.single', $tag->slug) }}">{{ $tag->title }}</a></li>
        </ul>
        @endforeach
    @else
         <div><span>Пока нет тегов...</span></div>
    @endif
    </div>
</div>
<!-- END sidebar -->
