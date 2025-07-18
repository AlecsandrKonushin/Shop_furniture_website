@extends('layouts.auth.main')

@section('content')
    <body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="{{ route('home') }}"><img
                                class="logo-icon me-2" src="{{ asset('assets/images/app-logo.svg') }}" alt="logo"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-4">Сброс пароля</h2>
                    <div class="auth-intro mb-4 text-center">
                        Введите свой адрес электронной почты ниже. Мы отправим вам ссылку на страницу, где вы сможете
                        легко создать новый пароль.
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="auth-form-container text-left">
                        <form class="auth-form resetpass-form" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div class="email mb-3">
                                <label class="sr-only" for="reg-email">Ваш Email</label>
                                <input id="reg-email" name="email" type="email" class="form-control login-email
                                    @error('email') is-invalid @enderror"
                                       placeholder="Ваш Email" required="required">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">
                                    Сбросить пароль
                                </button>
                            </div>
                        </form>
                        <div class="auth-option text-center pt-5">
                            <a class="app-link" href="{{ route('login') }}">Назад</a>
                        </div>
                    </div>
                </div>
                <footer class="app-auth-footer">
                </footer>
            </div>
        </div>

    </div>

    </body>
@endsection
