@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Изменение статьи</h1>
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
                            <h3 class="card-title">Статья "{{ $post->title }}"</h3>
                        </div>
                        <!-- /.card-header -->
                        {{ Form::open([
                         'route' => ['posts.update', $post->id],
                         'files' => true,
                         'method' => 'put'
                         ]) }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title"
                                       class="form-control @error('title') is-invalid @enderror" id="title"
                                       value="{{ $post->title }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Краткое описание</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                    id="description" rows="3">{{$post->description}}</textarea>

                            </div>

                            <div class="form-group">
                                <label for="content">Контент</label>
                                <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                    id="content" rows="5">{{ $post->content }}</textarea>

                            </div>

                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                {{ Form::select('category_id',
                                    $categories,
                                    $post->getCategoryID(),
                                    ['class' => 'form-control select2'])
                                }}
                            </div>

                            <div class="form-group">
                                <label for="tags">Теги</label>
                                {{ Form::select('tags[]',
                                    $tags,
                                    $selectedTags,
                                    ['class' => 'form-control select2',
                                     'multiple' => 'multiple',
                                    'data-placeholder' => 'Выберите теги'])
                                }}
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('status', '1', $post->status, ['class' => 'custom-control-input', 'id' => 'customCheckbox1']) }}
                                    <label for="customCheckbox1" class="custom-control-label">Опубликовать на сайте</label>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    {{ Form::checkbox('is_featured', '1', $post->is_featured, ['class' => 'custom-control-input', 'id' => 'customCheckbox2']) }}
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
                                <div><img src="{{ $post->getImage() }}" alt="" class="img-thumbnail mt-2" width="200"></div>
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

