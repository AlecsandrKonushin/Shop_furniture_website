@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Цвета</h1>
            <div class="app-card-footer p-4 mt-auto">
                <a class="btn app-btn-secondary" href="{{ route('admin.color.create') }}">Добавить цвет</a>
            </div>
            <div class="table-responsive col-6">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                    <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Название</th>
                        <th class="cell">Цвет</th>
                        <th class="cell"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($colors as $color)
                        <tr>
                            <td class="cell">{{ $color->id }}</td>
                            <td class="cell">{{ $color->title }}</td>
                            <td>
                                <i class="fas fa-square" style="color:{{ $color->color }}"></i>
                            </td>
                            <td class="cell">
                                <a href="{{ route('admin.color.show', $color->id) }}"><i class="fa-solid fa-eye me-2"></i></a>
                                <a href="{{ route('admin.color.edit', $color->id) }}"><i
                                        class="fa-solid fa-pen text-warning me-2"></i></a>
                                <a href="{{ route('admin.color.confirm.delete', $color->id) }}"><i
                                        class="fa-solid fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
