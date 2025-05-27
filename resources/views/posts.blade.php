@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="form-group">
            <h2 class="hover-color">Простые технологии</h2>
            Рассказываем просто о сложном
        </div>

        <div class="d-flex form-group mt-4">
            @foreach($categories as $category)
                    <form action="{{route('index.posts.search', $category->id)}}" method="post">
                        @csrf
                        <button class="btn btn-default category-block hover-color">  #{{$category->title}}</button>
                    </form>
            @endforeach
        </div>
        <div class="d-flex flex-wrap">

            @foreach($posts as $post)
                <div class="post-block">
                    <img src="{{asset('storage/' . $post->main_image)}}"
                         style="max-width: 300px; min-height: 200px; max-height: 200px;">
                    <div class="post-info d-flex">
                        <div class="post-info-date">
                            {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                        </div>

                        <div class="post-info-time ml-3">
                            <i class="fas fa-clock"></i>    {{$post->time}} минут(ы) чтения
                        </div>

                        <div class="post-info-category ml-2">
                            #{{$post->category->title}}
                        </div>

                    </div>

                    <div class="post-info-title">
                        <a href="{{route('index.posts.show', $post->id)}}" class="hover-color"> {{$post->title}} </a>
                    </div>

                </div>

            @endforeach

        </div>
    </div>

@endsection
