@extends('layouts.main')

@section('content')
    <form action="{{route('login.post')}}" class="w-25 m-auto"
          style="border: 1px solid #05afaf; padding: 20px; border-radius: 15px" method="post">
        @csrf
        <h3 class="m-auto">Авторизация</h3>
        <div class="text-danger mt-2 mb-2">
            {{session('error_login')}}
        </div>
        <div class="form-group">
            <label>Эл.почта</label>
            <input type="email" class="form-control" placeholder="Эл.Почта" name="email"
            value="{{!empty(cookie('email')) ? \Illuminate\Support\Facades\Cookie::get('email') : ''}}">
            @error('email')
            <div class="text-danger"> {{$message}}</div>
            @else
                Пример: example@gmail.com
                @enderror

        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control" placeholder="Пароль" name="password"
            value="{{!empty(cookie('password')) ? \Illuminate\Support\Facades\Cookie::get('password') : ''}}">
            @error('password')
            <div class="text-danger"> {{$message}}</div>
            @enderror
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="remember"
                    {{!empty(cookie('remember')) ? 'checked' : ''}}>
                <label class="form-check-label" for="flexCheckDefault">
                    Запомнить меня
                </label>
                <div class="float-right"> Нет аккаунта? <a href="{{route('register')}}" class="hover-color">Зарегистрироваться</a></div>
        </div>


        </div>
        <button type="submit" class="btn btn-default">Войти</button>
    </form>
@endsection
