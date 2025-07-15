@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="d-flex ">
                <h1 class="app-page-title me-3">Категория "{{ $category->title }}"</h1>
                <a href="{{ route('category.edit', $category->id) }}"><i class="fa-solid fa-pen text-warning me-2"></i></a>
                <form action="{{ route('category.delete', $category->id) }}" method="POST"
                      id="delete-form-{{ $category->id }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                        <i class="fa-solid fa-trash text-danger"></i>
                    </a>
                </form>
            </div>
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start col-6">
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>ID</strong></div>
                                <div class="item-data">{{ $category->id }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Название</strong></div>
                                <div class="item-data">{{ $category->title }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
