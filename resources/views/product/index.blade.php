@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Товары</h1>
            <div class="app-card-footer p-4 mt-auto">
                <a class="btn app-btn-secondary" href="{{ route('admin.product.create') }}">Добавить товар</a>
            </div>
            <div class="table-responsive col-12">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                    <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Категория</th>
                        <th class="cell">Название</th>
                        <th class="cell">Описание</th>
                        <th class="cell">Цена</th>
                        <th class="cell">Количество</th>
                        <th class="cell">Изображение</th>
                        <th class="cell">Опубликовано</th>
                        <th class="cell"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="align-middle">
                            <td class="cell"><a href="{{ route('admin.product.show', $product->id) }}">{{ $product->id }}</a>
                            </td>
                            <td class="cell">{{ $product->category->title }}</td>
                            <td class="cell">{{ $product->title }}</td>
                            <td class="cell">{{ $product->description }}</td>
                            <td class="cell">{{ $product->price }} руб.</td>
                            <td class="cell text-center">{{ $product->count }}</td>
                            <td class="cell text-center"><img src="{{ asset('storage/' . $product->preview_image) }}"
                                                              width="50" alt="Изображение"></td>
                            <td class="cell text-center">{{ $product->is_published ? 'Да' : 'Нет'}}</td>
                            <td class="cell">
                                <a href="{{ route('admin.product.show', $product->id) }}"><i
                                        class="fa-solid fa-eye me-2"></i></a>
                                <a href="{{ route('admin.product.edit', $product->id) }}"><i
                                        class="fa-solid fa-pen text-warning me-2"></i></a>
                                <a href="{{ route('admin.product.confirm.delete', $product->id) }}"><i
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
