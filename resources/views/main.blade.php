<!DOCTYPE html>
<html xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta id="token" name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="container" v-cloak>
    @yield('content')
</div>


{{--<script src="http://cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>--}}
{{--<script src="{{asset('js/vue.min.js')}}"></script>--}}

<footer class="footer" v-cloak>
    <div class="container">
        <p class="text-center">
            &copy;2016 &nbsp;Powered by
            <a target="_blank" href="http://laravel.com">Laravel</a> and <a target="_blank" href="https://vuejs.org">Vue</a>
        </p>
        <p class="text-center contact">
            <a target="_blank" href="https://github.com/gtchaos/kidnapper"><i class="fa fa-github" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a target="_blank" href="https://plus.google.com/u/0/101933817543563295388"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
        </p>


    </div>
</footer>

<script src="http://cdn.bootcss.com/vue/1.0.26/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.2/vue-resource.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-strap/1.1.20/vue-strap.min.js"></script>
<script src="{{asset('js/responsivevoice.src.js')}}"></script>
@yield('scripts')
</body>
</html>