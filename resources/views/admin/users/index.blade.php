@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Пользователи</h1>
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
                            <h3 class="card-title">Список пользователей</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('users.create') }}" class="btn btn-default mb-3">Добавить пользователя</a>
                            @if (count($users))
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px">ID</th>
                                            <th>Имя</th>
                                            <th>Email</th>
                                            <th>Аватар</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><img src="{{ $user->getImage()}}" alt="" width="100"></td>
                                                <td>
                                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                       class="btn btn-info btn-sm float-left mr-1">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    {{ Form::open(['route' => ['users.destroy', 'user' => $user->id],
                                                     'class' => 'float-left', 'method' => 'delete']) }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Удалить?')">
                                                        <i
                                                            class="fas fa-trash-alt"></i>
                                                    </button>
                                                    {{ Form::close() }}

                                                    @if($user->is_admin == 1)

                                                        <a href="/admin/users/toggleAdmin/{{ $user->id }}" class="ml-2">
                                                            <button class="btn btn-default">сделать юзером</button>
                                                        </a>
                                                    @else
                                                        <a href="/admin/users/toggleAdmin/{{ $user->id }}" class="ml-2">
                                                            <button class="btn btn-default">сделать админом</button>
                                                        </a>
                                                    @endif

                                                    @if($user->status == 1)
                                                        <a href="/admin/users/toggleBan/{{ $user->id }}" class="fa fa-lock ml-2"></a>
                                                    @else
                                                        <a href="/admin/users/toggleBan/{{ $user->id }}" class="fa fa-thumbs-up ml-2"></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Нет пользователей...</p>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {{ $users->links() }}
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

