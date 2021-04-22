@extends('layouts.single')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>Мой профиль</b>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                @include('errors.errors')

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                {{ Form::open([
                            'route' => ['profile.store', $user->id],
                            'files' => true
                        ]) }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" name="name"
                               class="form-control @error('name') is-invalid @enderror" id="name"
                               placeholder="" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email"
                               class="form-control @error('email') is-invalid @enderror" id="email"
                               placeholder="" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="">
                    </div>


                    <div class="form-group">
                        <label for="thumbnail">Аватар</label>
                        <div class="input-group">
                            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
                        </div>
                        <div><img src="{{ $user->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
                    </div>

                    <!-- /.card-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Обновить</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection

