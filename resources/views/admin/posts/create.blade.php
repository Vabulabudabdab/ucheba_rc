@extends('layouts.admin.layout')

@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Посты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Register content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-12">
                        <h5>Добавление категории</h5>
                        <div class="form-group">
                        <form action="{{route('admin.posts.store')}}" method="post" class="w-25" enctype="multipart/form-data">
                            @csrf
                            <label>Название</label>
                            <input type="text" class="form-control" placeholder="Название поста" name="title"
                                   value="">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <!-- select -->

                        <label>Время на прочтение</label>
                        <input type="number" min="1" max="120" class="form-control w-25" placeholder="Время" name="time"
                               value="">
                        @error('time')
                        <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group w-25">
                            <label>Выберите категорию</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                     >{{$category->title}}</option>
                                @endforeach

                            </select>
                            @error('category_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group w-25">
                            <label for="exampleInputFile">Добавить картинку</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузить</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group w-50">
                            <label>Контент (основная часть поста)</label>
                            <textarea id="summernote" name="content" ></textarea>
                            @error('content')
                            <div class="text-danger">Это поле не может быть пустым</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Описание</label>
                            <textarea id="summernote2" name="description" ></textarea>
                            @error('description')
                            <div class="text-danger">Это поле не может быть пустым</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить пост</button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection()
