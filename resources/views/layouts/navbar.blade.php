<nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>

                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                    @if($categories->count())
                        @foreach($categories as $category)
                        <a class="dropdown-item" href="{{ route('categories.single', $category->slug) }}">{{ $category->title }}</a>
                        @endforeach
                    @else
                            <a class="dropdown-item" href="">Пока нет категорий...</a>
                    @endif
                    </div>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Теги</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown05">
                    @if($tags->count())
                        @foreach($tags as $tag)
                            <a class="dropdown-item" href="{{ route('tags.single', $tag->slug) }}">{{ $tag->title }}</a>
                        @endforeach
                    @else
                            <a class="dropdown-item" href="">Пока нет тегов...</a>
                    @endif
                    </div>

                </li>

                @if(Auth::check() || Auth::viaRemember())
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Выход</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Профиль</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Регистрация</a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
