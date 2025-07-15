@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Добавление цвета</h1>
            <div class="app-card-body col-6">
                <form class="settings-form" action="{{ route('color.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название цвета</label>
                        <input type="text" class="form-control mb-2" name="title" value="{{ old('title') }}" placeholder="Название">
                        <label for="color" class="form-label">Выбор цвета</label>
                        <input type="color" class="form-control form-control-color w-25" id="color" name="color" value="#563d7c" title="Choose your color">
                    </div>
                    <input type="submit" class="btn app-btn-primary" value="Добавить">
                </form>
            </div>
        </div>
    </div>
@endsection
