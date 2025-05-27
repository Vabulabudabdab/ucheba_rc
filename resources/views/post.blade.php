@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex form-group mt-4">
            @foreach($categories as $category)
                <form action="{{route('index.posts.search', $category->id)}}" method="post">
                    @csrf
                    <button class="btn btn-default category-block hover-color">  #{{$category->title}}</button>
                </form>
            @endforeach
        </div>
        <div class="form-group">
            <h2 class="">{{$post->title}}</h2>
            #{{$post->category->title}} <div class="float-right">Опубликован: {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</div>

        </div>
        <div class="form-group m-auto">
            <img src="{{asset('storage/' . $post->main_image)}}" style="width: 100%">
            <div class="float-right">
                @if(auth()->user())
                <form method="post" action="{{route('index.posts.like', $post->id)}}">
                    @csrf
                    <button type="submit" class="transparent" style="text-decoration: none;  background: transparent; border: none;">
                        <i class="fas fas fa-heart mr-2"></i>
                    </button>{{$post->likes()->count()}}

                </form>

                @else
                    <button disabled class="transparent" style="text-decoration: none;  background: transparent; border: none;">
                        <i class="fas fas fa-heart mr-2"></i>
                    </button>{{$post->likes()->count()}}
                @endif
            </div>
            <div class="form-group mt-4 fs-5">
                Описание: {!! $post->description !!}
            </div>

        </div>

        <div class="mt-4 text-wrap" style="font-size: 18px; overflow-wrap: normal !important">
            Основная часть:
            {!! $post->content !!}
        </div>
        @if($posts_seems->count() >= 1)
        Похожие посты:
        <div class="d-flex flex-wrap m-auto">
            @foreach($posts_seems as $post)
                <div class="post-block ">
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
        @endif
    </div>

@endsection
