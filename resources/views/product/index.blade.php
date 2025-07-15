@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Товары</h1>
            <div class="app-card-footer p-4 mt-auto">
                <a class="btn app-btn-secondary" href="{{ route('product.create') }}">Добавить товар</a>
            </div>
            <div class="table-responsive col-6">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                    <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Название</th>
                        <th class="cell">Описание</th>
                        <th class="cell"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="cell">{{ $product->id }}</td>
                            <td class="cell">{{ $product->title }}</td>
{{--                            <td>--}}
{{--                                <i class="fas fa-square" style="color:{{ $product->color }}"></i>--}}
{{--                            </td>--}}
{{--                            <td class="cell">--}}
{{--                                <a href="{{ route('color.show', $product->id) }}"><i--}}
{{--                                        class="fa-solid fa-eye me-2"></i></a>--}}
{{--                                <a href="{{ route('color.edit', $product->id) }}"><i--}}
{{--                                        class="fa-solid fa-pen text-warning me-2"></i></a>--}}
{{--                                <form action="{{ route('color.delete', $product->id) }}" method="POST"--}}
{{--                                      id="delete-form-{{ $product->id }}" style="display: inline;">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <a href="#"--}}
{{--                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">--}}
{{--                                        <i class="fa-solid fa-trash text-danger"></i>--}}
{{--                                    </a>--}}
{{--                                </form>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
