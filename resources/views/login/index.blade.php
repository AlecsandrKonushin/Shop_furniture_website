@extends('layouts.main-login')

@section('content')
    <body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2" src="{{ asset('assets/images/app-logo.svg') }}" alt="logo"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Вход в админ панель</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Email</label>
                                <input id="signin-email" name="signin-email" type="email"
                                       class="form-control signin-email" placeholder="Email address"
                                       required="required">
                            </div>
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="signin-password" name="signin-password" type="password"
                                       class="form-control signin-password" placeholder="Password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="RememberPassword">
                                            <label class="form-check-label" for="RememberPassword">
                                                Запомнить меня
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="forgot-password text-end">
                                            <a href="reset-password.html">Забыли пароль?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Вход
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="app-auth-footer">
                </footer>
            </div>
        </div>
    </div>
    </body>
@endsection
