@extends('layouts.main')

@section('content')
    <form action="{{route('register.post')}}" class="w-25 m-auto"
          style="border: 1px solid #05afaf; padding: 20px; border-radius: 15px" method="post">
        @csrf
        <h3 class="m-auto">Регистрация</h3>
        <div class="form-group">
            <label>Эл.почта</label>
            <input type="email" class="form-control" placeholder="Эл.Почта" name="email">
            @error('email')
            <div class="text-danger"> {{$message}}</div>
            @else
                Пример: example@gmail.com
                @enderror

        </div>
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control" placeholder="Пароль" name="password">
            @error('email')
            <div class="text-danger"> {{$message}}</div>
            @else
                Придумайте сложный пароль
                @enderror

        </div>
        <div class="form-group">
            <label>Подтвердите пароль</label>
            <input type="password" class="form-control" placeholder="Пароль" name="password_confirm">
            @error('password_confirm')
            <div class="text-danger"> {{$message}}</div>
            @enderror
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="remember">
                <label class="form-check-label" for="flexCheckDefault">
                    Запомнить меня
                </label>
                <div class="float-right"> Есть аккаунт? <a href="{{route('login')}}" class="hover-color">Войти</a></div>
            </div>



        </div>
        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
    </form>
@endsection
