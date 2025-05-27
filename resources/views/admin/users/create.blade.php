@extends('layouts.admin.layout')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Создание Пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Создание Пользователя</li>
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
                    <h5>Создание Пользователя</h5>
                    <div class="form-group">
                        <form action="{{route('admin.users.store')}}" method="post" class="w-25">
                            @csrf
                            <label>Почта</label>
                            <input type="email" value="{{old('email')}}" class="form-control  mb-1" placeholder="Эл.Почта" name="email" >
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label>Пароль</label>
                            <input type="password" class="form-control mb-1" name="password" placeholder="Пароль">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <label>Роль</label>
                            <select name="role_id" class="select2 w-100" aria-label="Пример выбора по умолчанию">
                                <option value="0">Пользователь</option>
                                <option value="1">Администратор</option>
                            </select>

                    </div>
                    <button type="submit" class="btn btn-primary">Добавить пользователя</button>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
