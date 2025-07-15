@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Продукт "{{ $product->title }}"</h1>

            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start col-6">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <h4 class="app-card-title">{{ $product->title }}</h4>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Категория </strong></div>
                                <div class="item-data">{{ $product->category->title }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Описание</strong></div>
                                <div class="item-data">{{ $product->description }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Цена</strong></div>
                                <div class="item-data">{{ $product->price }} руб.</div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Количество</strong></div>
                                <div class="item-data">{{ $product->count }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label mb-2"><strong>Цвета</strong></div>
                                <div class="item-data d-flex text-center">
                                    @foreach($product->colors as $color)
                                        <div class="me-3">
                                            <p class="mb-0">{{ $color->title }}</p>
                                            <i class="fas fa-square" style="color:{{ $color->color }}"></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Основное изображение</strong></div>
                                <div class="item-data">
                                    <img src="{{ asset('storage/' . $product->preview_image) }}"
                                         alt="Основное изображение" width="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Дополнительные изображения</strong></div>
                                <div class="d-flex">
                                    @foreach($product->product_images as $product_image)
                                        <div class="item-data">
                                            <img src="{{ asset('storage/' . $product_image->file_path) }}"
                                                 alt="Основное изображение" width="100">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Опубликовано</strong></div>
                                <div class="item-data">{{ $product->is_published ? 'Да' : 'Нет' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <a href="{{ route('product.edit', $product->id) }}"><i
                                            class="fa-solid fa-pen text-warning me-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
