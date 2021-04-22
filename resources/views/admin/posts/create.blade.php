@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Новая статья</h1>
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
                            <h3 class="card-title">Новая статья</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::open(['route' => 'posts.store', 'files' => true]) }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название" value="{{ old('title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Краткое описание</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                              placeholder="Краткое описание поста...">{{ old('description') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content"
                                              rows="5" placeholder="Полное описание поста..." ></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    {{ Form::select('category_id',
                                        $categories,
                                        null,
                                        ['class' => 'form-control select2'])
                                    }}
                                </div>

                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    {{ Form::select('tags[]',
                                        $tags,
                                        null,
                                        ['class' => 'form-control select2',
                                         'multiple' => 'multiple',
                                        'data-placeholder' => 'Выберите теги'])
                                    }}
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="status">
                                        <label for="customCheckbox1" class="custom-control-label">Опубликовать на сайте</label>
                                    </div>

                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2" name="is_featured">
                                        <label for="customCheckbox2" class="custom-control-label">Рекомендовать</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="image" class="custom-file-input">
                                            <label class="custom-file-label" for="image" data-browse="Обзор">Выберите файл...</label>
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

