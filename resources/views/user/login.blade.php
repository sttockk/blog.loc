@extends('layouts.single')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>Авторизация</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                @include('errors.errors')

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Пароль">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <label>
                        <input type="checkbox" name="remember_me" />
                        <span>Запомнить меня</span>
                    </label>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-text-center ml-3">
                            <button type="submit" class="btn btn-primary btn-block">Войти</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection
