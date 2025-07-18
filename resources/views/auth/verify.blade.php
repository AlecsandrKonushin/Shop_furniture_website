@extends('layouts.auth.main')

@section('content')
    <body class="app app-login p-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Подтверждение вашего Email адреса</div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                На ваш адрес электронной почты была отправлена новая ссылка для подтверждения.
                            </div>
                        @endif
                        Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.
                        Если вы не получили письмо,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                    class="btn btn-link p-0 m-0 align-baseline">нажмите здесь для повторного запроса
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection
