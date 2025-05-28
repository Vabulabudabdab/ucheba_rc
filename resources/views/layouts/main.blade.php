<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css')}}">
    {{--select2--}}
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/select2/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/dist/css/main.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body>

<header class="d-flex flex-wrap  py-3 mb-4 border-bottom" style="padding: 100px">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <span class="fs-4 hover-color">База знаний «Ростелеком»</span> </a>
    <ul class="nav nav-pills">
        <li class="nav-item"><a href="{{route('index')}}" class="nav-link hover-color" aria-current="page">Главная</a></li>
        @if(auth()->user() && auth()->user()->role_id == 1)
            <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link hover-color" aria-current="page">Админка</a></li>
        @endif
        <li class="nav-item"><a href="{{route('index.posts')}}" class="nav-link hover-color">База знаний</a></li>
        <li class="nav-item"><a href="{{route('index.faq')}}" class="nav-link hover-color">FAQ</a></li>
        @if(auth()->user())
            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link hover-color">Выйти</a></li>
        @else
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link hover-color">Войти</a></li>
        @endif

    </ul>
</header>

@yield('content')

<footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="{{route('index')}}" class="nav-link hover-color px-2 text-body-secondary">Главная</a></li>
        <li class="nav-item"><a href="{{route('index.posts')}}" class="nav-link hover-color px-2 text-body-secondary">База знаний</a></li>
        @if(auth()->user() && auth()->user()->role_id == 1)
            <li class="nav-item"><a href="{{route('admin.index')}}" class="nav-link hover-color" aria-current="page">Админка</a></li>
        @endif
        <li class="nav-item"><a href="{{route('index.faq')}}" class="nav-link hover-color px-2 text-body-secondary">FAQ</a></li>
        @if(auth()->user())
            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link hover-color px-2 text-body-secondary">Выйти</a></li>
        @else
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link hover-color px-2 text-body-secondary">Войти</a></li>
        @endif

    </ul>
    <p class="text-center text-body-secondary">© 2025 Сайт-руководство для пользователей «Ростелеком»</p></footer>

</body>
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.js')}}"></script>

<script src="{{asset('adminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('adminLTE/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
    $('.tags, .select2, .colors').select2()
</script>


<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

        $('#summernote2').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

    });
    $(function () {
        bsCustomFileInput.init();
    });

    $('.select2').select2()

</script>

<script>
    function clickRadio(param) {
        var value = document.querySelectorAll("input[type='radio'][name='" + param.name + "']");
        for (var i = 0; i < value.length; i++) {
            if (value[i] != param)
                value[i].BeforeCheck = false;
        }

        if (param.BeforeCheck)
            param.checked = false;
        param.BeforeCheck = param.checked;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</html>
