<div class="row mb-5">
    <div class="col-md-4">
        <h3>Параграф</h3>
        <p>
            <img src="/assets/front/images/img_2.jpg" alt="Image placeholder" class="img-fluid">
        </p>

        <p>Тут может быть ваша реклама....</p>
    </div>
    <div class="col-md-6 ml-auto">
        <div class="row">
            <div class="col-md-7">
                <h3>Последние посты</h3>
                <div class="post-entry-sidebar">
                    <ul>
                    @if($recentPosts->count())
                        @foreach($recentPosts as $post)
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
                        @endforeach
                    @else
                        <div><span>Пока нет новых постов...</span></div>
                    @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-4">

                <div class="mb-5">
                    <h3>Социальные сети</h3>
                    <ul class="list-unstyled footer-social">
                        <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                        <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                        <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                        <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                        <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                        <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    </div>
</div>
