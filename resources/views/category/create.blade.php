@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Добавление категории</h1>
            <div class="app-card-body col-6">
                <form class="settings-form" action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Название категории</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Название">
                    </div>
                    <input type="submit" class="btn app-btn-primary" value="Добавить">
                </form>
            </div>
        </div>
    </div>
@endsection
