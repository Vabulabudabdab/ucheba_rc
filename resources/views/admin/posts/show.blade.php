@extends('layouts.admin.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{$post->title}}</h1>
                        <a href="{{route('admin.posts.edit', $post->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.posts.delete', $post->id)}}" method="post">
                            {{csrf_field()}}
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent" onclick="alert('Are you shore?')">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">{{$post->title}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Register content -->
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-10">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Текущий пост</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Название поста</th>
                                        <th>Название категории</th>
                                        <th>Время на прочтение</th>
                                        <th>Когда создан</th>
                                        <th>Когда обновлён</th>
                                        <th>Просмотр</th>
                                        <th>Изменить</th>
                                        <th>Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{$post->category->title}}</td>
                                            <td>{{$post->time}} минут(ы)</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>{{$post->updated_at}}</td>
                                            <td class="text-center"><a href="{{route('admin.posts.show', $post->id)}}"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.posts.edit', $post->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.posts.delete', $post->id)}}" method="post">
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
                                <div class="form-group ml-4">
                                    <label>Описание поста</label>
                                    <br>
                                 {!! $post->description !!}
                                </div>
                                <div class="form-group ml-4">
                                    <label>Контент поста</label>
                                    <br>
                                    {!! $post->content !!}
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        <!-- /.content -->
@endsection()
