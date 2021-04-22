@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Комментарии</h1>
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
                            <h3 class="card-title">Список комментариев</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if (count($comments))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">ID</th>
                                            <th>Текст</th>
                                            <th>Дата</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($comments as $comment)
                                            <tr>
                                                <td>{{ $comment->id }}</td>
                                                <td>{{ $comment->text }}</td>
                                                <td>{{ $comment->getDate() }}</td>
                                                <td>
                                                @if($comment->status == 1)
                                                    <a href="/admin/comments/toggle/{{ $comment->id }}" class="fa fa-lock ml-2"></a>
                                                @else
                                                        <a href="/admin/comments/toggle/{{ $comment->id }}" class="fa fa-thumbs-up ml-2"></a>
                                                @endif
                                                    {{ Form::open(['route' => ['comments.destroy', $comment->id],
                                                     'class' => 'float-left', 'method' => 'delete']) }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Удалить?')">
                                                        <i
                                                            class="fas fa-trash-alt"></i>
                                                    </button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Нет комментариев...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $comments->links() }}
                        </div>
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

