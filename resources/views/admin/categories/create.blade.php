@extends('layouts.admin.layout')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание Категории</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Создание Категории</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
                    <h5>Добавление категории</h5>
                <div class="form-group">
                    <form action="{{route('admin.categories.store')}}" method="post" class="w-25">
                        {{csrf_field()}}
                        <label>Название</label>
                        <input type="text" class="form-control" placeholder="Название категории" name="title">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Добавить категорию</button>
                </form>
            </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
