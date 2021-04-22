@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Новый пользователь</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Новый пользователь</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::open(['route' => 'users.store', 'files' => true]) }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror" id="name"
                                       placeholder="" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                       class="form-control @error('email') is-invalid @enderror" id="email"
                                       placeholder="" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" name="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="">
                            </div>


                            <div class="form-group">
                                <label for="image">Аватар</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label" for="thumbnail" data-browse="Обзор">Выберите файл...</label>
                                    </div>
                                </div>
                            </div>

                            <!-- /.card-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-default">Сохранить</button>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

