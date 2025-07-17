@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Добавление продукта</h1>
            <div class="app-card-body col-6">
                <form class="settings-form" action="{{ route('admin.product.store') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <label for="title" class="form-label">Название</label>
                        <input type="text" class="form-control mb-2 @error('title') is-invalid @enderror" name="title"
                               id="title" value="{{ old('title') }}"
                               placeholder="Название">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="description" class="form-label">Описание</label>
                        <textarea type="text" class="form-control mb-2 @error('description') is-invalid @enderror"
                                  name="description" id="description"
                                  placeholder="Описание"
                                  style="height: 100px;">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="price" class="form-label">Цена</label>
                        <input type="number" class="form-control mb-2 @error('price') is-invalid @enderror" name="price"
                               id="price"
                               value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="count" class="form-label">Количество</label>
                        <input type="number" class="form-control mb-2 @error('count') is-invalid @enderror" name="count"
                               id="count"
                               value="{{ old('count') }}">
                        @error('count')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <br>

                        <label for="preview_image" class="form-label">Основное изображение</label>
                        <input type="file"
                               class="form-control custom-file-input mb-2 @error('preview_image') @if(!session('temp_preview')) is-invalid @endif @enderror"
                               name="preview_image"
                               id="preview_image">
                        @if(session('temp_preview'))
                            <div class="mt-2">
                                <p>Вы загрузили:</p>
                                <img src="{{ asset('storage/' . session('temp_preview')) }}" width="150"
                                     alt="preview_image">
                            </div>
                            <input type="hidden" name="temp_preview" value="{{ session('temp_preview') }}">
                        @endif
                        @error('preview_image')
                        @if(!session('temp_preview'))
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                        @enderror

                        <label for="product_images" class="form-label">Допольнительные изображения</label>
                        <input name="product_images[]" type="file" class="form-control custom-file-input
                        @error('product_images') @if(!session('temp_product_images')) is-invalid @endif @enderror"
                               id="product_images"
                               multiple accept="image/*">
                        @if(session('temp_product_images'))
                            <div class="mt-2">
                                <p>Вы загрузили:</p>
                                @foreach(session('temp_product_images') as $product_image)
                                    <img src="{{ asset('storage/' . $product_image) }}" width="150"
                                         alt="product_image">
                                @endforeach
                                <input type="hidden" name="temp_product_images"
                                       value="{{ json_encode(session('temp_product_images')) }}">
                            </div>
                        @endif
                        @error('product_images')
                        @if(!session('temp_product_images'))
                            <div class="invalid-feedback">{{ $message }}</div>
                        @endif
                        @enderror
                        <br>

                        <label for="category_id" class="form-label">Категория</label>
                        <select class="form-select mb-2 @error('category_id') is-invalid @enderror" name="category_id"
                                id="category_id">
                            <option selected>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if($category->id == old('category_id')) selected @endif
                                >{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="colors" class="form-label">Цвета</label>
                            <div class="d-flex">
                                @foreach($colors as $color)
                                    <div class="pe-4">
                                        <input class="form-check-input"
                                               type="checkbox" value="{{ $color->id }}"
                                               id="colors"
                                               name="colors[]"
                                               @if(in_array($color->id, old('colors', []))) checked @endif>
                                        <i class="fas fa-square" style="color:{{ $color->color }}"></i>
                                        <p class="mb-0">{{ $color->title }}</p>
                                    </div>
                                @endforeach
                            </div>
                            @error('colors')
                            <div class="invalid-feedback d-block    ">{{ $message }}</div>
                            @enderror
                        </div>

                        <input class="form-check-input" type="checkbox" value="1" id="is_published" name="is_published"
                               checked>
                        <label class="form-check-label" for="is_published">
                            Опубликовать
                        </label>
                    </div>
                    <input type="submit" class="btn app-btn-primary" value="Добавить">
                </form>
            </div>
        </div>
    </div>
@endsection
