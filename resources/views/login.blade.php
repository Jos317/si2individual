<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
        <meta
            content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
            name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
            rel="stylesheet"/>
        <link href="{{asset('asset/css/vendor.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('asset/css/default/app.min.css')}}" rel="stylesheet"/>

    </head>
    <body class='pace-top'>

        {{-- <div id="loader" class="app-loader">
            <span class="spinner"></span>
        </div> --}}

        <div id="app" class="app">

            <div class="login login-v2 fw-bold">

                <div class="login-cover">
                    <div
                        class="login-cover-img"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-17.jpg')}})"
                        data-id="login-cover-image"></div>
                    <div class="login-cover-bg"></div>
                </div>

                <div class="login-container">

                    <div class="login-header">
                        <div class="brand">
                            <div class="d-flex align-items-center">
                                <span class="logo"></span>
                                <b>Login</b>
                                User
                            </div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>

                    <div class="login-content">
                        <form action="index.html" method="GET">
                            <div class="form-floating mb-20px">
                                <input
                                    type="text"
                                    class="form-control fs-13px h-45px border-0"
                                    placeholder="Email Address"
                                    id="emailAddress"/>
                                <label
                                    for="emailAddress"
                                    class="d-flex align-items-center text-gray-600 fs-13px">Email</label>
                            </div>
                            <div class="form-floating mb-20px">
                                <input
                                    type="password"
                                    class="form-control fs-13px h-45px border-0"
                                    placeholder="Password"/>
                                <label
                                    for="emailAddress"
                                    class="d-flex align-items-center text-gray-600 fs-13px">Contraseña</label>
                            </div>
                            <div class="form-check mb-20px">
                                <input
                                    class="form-check-input border-0"
                                    type="checkbox"
                                    value="1"
                                    id="rememberMe"/>
                                <label class="form-check-label fs-13px text-gray-500" for="rememberMe">
                                    Remember Me
                                </label>
                            </div>
                            <div class="mb-20px">
                                <button type="submit" class="btn btn-success d-block w-100 h-45px btn-lg">Ingresar</button>
                            </div>
                            <div class="text-gray-500">
                                Not a member yet? Click
                                <a href="javascript:;" class="text-white">here</a>
                                to register.
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <div class="login-bg-list clearfix">
                <div class="login-bg-list-item active">
                    <a
                        href="javascript:;"
                        class="login-bg-list-link"
                        data-toggle="login-change-bg"
                        data-img="{{asset('asset/img/login-bg/login-bg-17.jpg')}}"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-17.jpg')}})"></a>
                </div>
                <div class="login-bg-list-item">
                    <a
                        href="javascript:;"
                        class="login-bg-list-link"
                        data-toggle="login-change-bg"
                        data-img="{{asset('asset/img/login-bg/login-bg-16.jpg')}}"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-16.jpg')}})"></a>
                </div>
                <div class="login-bg-list-item">
                    <a
                        href="javascript:;"
                        class="login-bg-list-link"
                        data-toggle="login-change-bg"
                        data-img="{{asset('asset/img/login-bg/login-bg-15.jpg')}}"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-15.jpg')}})"></a>
                </div>
                <div class="login-bg-list-item">
                    <a
                        href="javascript:;"
                        class="login-bg-list-link"
                        data-toggle="login-change-bg"
                        data-img="{{asset('asset/img/login-bg/login-bg-14.jpg')}}"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-14.jpg')}})"></a>
                </div>
                <div class="login-bg-list-item">
                    <a
                        href="javascript:;"
                        class="login-bg-list-link"
                        data-toggle="login-change-bg"
                        data-img="{{asset('asset/img/login-bg/login-bg-13.jpg')}}"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-13.jpg')}})"></a>
                </div>
                <div class="login-bg-list-item">
                    <a
                        href="javascript:;"
                        class="login-bg-list-link"
                        data-toggle="login-change-bg"
                        data-img="{{asset('asset/img/login-bg/login-bg-12.jpg')}}"
                        style="background-image: url({{asset('asset/img/login-bg/login-bg-12.jpg')}})"></a>
                </div>
            </div>

            @include('layouts.temasPrincipal')

            <a
                href="javascript:;"
                class="btn btn-icon btn-circle btn-success btn-scroll-to-top"
                data-toggle="scroll-to-top">
                <i class="fa fa-angle-up"></i>
            </a>

        </div>

        <script
            src="{{asset('asset/js/vendor.min.js')}}"
           ></script>
        <script
            src="{{asset('asset/js/app.min.js')}}"
           ></script>

        <script
            src="{{asset('asset/js/demo/login-v2.demo.js')}}"
           ></script>

        {{-- <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="a380fe2205eaa5ccf2e2f932-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"6f96b37fdfc6e532","version":"2021.12.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}' crossorigin="anonymous"></script> --}}
    </body>
</html>