@extends('layouts.main')
@section('content')

    <div class="container">

        <div class="card-info">
            <div class="card-info-block mb-2">
                Руководство для пользователей «Ростелеком»
            </div>
            <a href="{{route('index.posts')}}" class="btn btn-default" style="width: 250px">Подробнее</a>
        </div>

        <div class="form-group mt-3 mb-3 fs-4" style="font-weight: 500">
            Рекомендуемый вам материал:
        </div>

        <div class="row mt-4 m-auto">
            @foreach($random_posts as $post)
                <div class="blog-card-info mx-1 mt-1 mb-4">
                    <div class="blog-card-title hover-color mb-4">
                        {{$post->title}}
                    </div>
                    <div class="form-group" style="font-size: 17px">
                        <i class="fas fas fa-server mr-2"></i>{{$post->category->title}}
                        <div class="answer">Выбранная категория</div>
                    </div>

                    <div class="form-group" style="font-size: 17px">
                        <i class="fas fas fa-sign mr-2"></i>{{$post->title}}
                        <div class="answer">Название поста</div>
                    </div>

                    <div class="form-group" style="font-size: 17px">
                        <i class="fas fas fa-clock mr-2"></i>{{$post->time}} минут(ы)
                        <div class="answer">Время на прочтение</div>
                    </div>

                    <div class="form-group mb-1" style="font-size: 17px; border-bottom: 1px solid #05afaf">
                        <i class="fas fas fa-pen mr-2"></i>{!! $post->description !!}
                        <div class="answer mb-3">Описание поста</div>
                    </div>
                    <div class="date">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</div>

                    <div class="form-group mt-2 fs-3 float-left" style="font-size: 17px">
                        <a href="{{route('index.posts.show', $post->id)}}" class="btn btn-default">Прочитать пост</a>
                    </div>
                    <div class="form-group mt-3 fs-4 float-right" style="font-size: 17px">
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


                </div>
            @endforeach


        </div>
    </div>
    <div class="container px-4 py-5" id="featured-3"><h2 class="pb-2 border-bottom">О компании «Ростелеком»</h2>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                  <i class="fas fa-home"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">О компании</h3>
                <p>«Ростелеком» (полное наименование — ПАО «Ростелеком») — российская телекоммуникационная компания,
                    которая предоставляет услуги связи, цифровые услуги и сервисы населению и другим организациям.</p>
                <a href="https://stavropol.rt.ru"
                   class="icon-link">
                    На сайт компании
                    <i class="fas fa-arrow-right"></i>
                </a></div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center  fs-2 mb-3">
                    <i class="fas fa-ethernet"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Качественная связь</h3>
                <p>Компания «Ростелеком» предоставляет своим клиентам качественные услуги, будь то интернет, или же мобильная  связь.</p>
                <a href="https://stavropol.rt.ru"
                                                                                            class="icon-link">
                    Просмотреть тарифы на сайте компании
                    <i class="fas fa-arrow-right"></i>
                </a></div>
            <div class="feature col">
                <div
                    class="feature-icon d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                    <i class="fas fa-user-friends"></i>
                </div>
                <h3 class="fs-2 text-body-emphasis">Надежный сервис</h3>
                <p>Десятки тысяч россиян по всей стране пользуются услугами компании на протяжении многих лет,
                отзывчивая тех.поддержка всегда готова помочь Вам в выборе услуг, или решении какой-либо проблемы.</p>
                <a href="https://stavropol.rt.ru"class="icon-link">
                    На сайт компании
                    <i class="fas fa-arrow-right"></i>
                </a></div>
        </div>
    </div>

@endsection
