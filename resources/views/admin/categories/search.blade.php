@extends('layouts.admin.layout')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-md-1 mb-3">
                    <a href="{{route('admin.categories.create')}}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
            <div class="form-group">
                <label>Найти категорию</label>
                <form method="post" action="{{route('admin.categories.search')}}">
                    @csrf
                    <input type="search" name="title" class="form-control w-25" placeholder="Название категории">
                </form>
            </div>
            @if($categories->count() >= 1)
            <div class="row">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap w-50">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Название категории</th>
                            <th>Когда создана</th>
                            <th>Дата изменения</th>
                            <th>Просмотр</th>
                            <th>Изменить</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->created_at}}</td>
                                <td>{{$category->updated_at}}</td>
                                <td class="text-center"><a href="{{route('admin.categories.show', $category->id)}}"><i class="far fa-eye"></i></a></td>
                                <td class="text-center"><a href="{{route('admin.categories.edit', $category->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                <td class="text-center">
                                    <form action="{{route('admin.categories.delete', $category->id)}}" method="post">
                                        {{csrf_field()}}
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-trash text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @else
                Категории не найдены...
            @endif
        </div><!-- /.container-fluid -->
    </section>

@endsection
