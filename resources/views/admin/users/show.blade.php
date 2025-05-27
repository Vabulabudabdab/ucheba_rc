@extends('layouts.admin.layout')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Просмотр Пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Просмотр Пользователя</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap w-50">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Эл.Почта</th>
                            <th>Права</th>
                            <th>Авторизован через</th>
                            <th>Когда создан</th>
                            <th>Дата изменения</th>
                            <th>Просмотр</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->RoleTitle}}</td>
                            <td>
                                @if($user->google_id != null)
                                    Google
                                @else
                                    Базовая авторизация
                                @endif
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td class="text-center"><a href="{{route('admin.users.show', $user->id)}}"><i class="far fa-eye"></i></a></td>
                            <td class="text-center"><a href="{{route('admin.users.edit', $user->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                            <td class="text-center">
                                <form action="{{route('admin.users.delete', $user->id)}}" method="post">
                                    {{csrf_field()}}
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash text-danger" role="button"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
