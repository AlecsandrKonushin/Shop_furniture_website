@extends('layouts.main')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="d-flex">
                <h1 class="app-page-title">Цвет "{{ $color->title }}"</h1>
                <a href="{{ route('admin.color.edit', $color->id) }}"><i class="fa-solid fa-pen text-warning me-2"></i></a>
                <a href="{{ route('admin.color.confirm.delete', $color->id) }}"><i class="fa-solid fa-trash text-danger"></i></a>
            </div>
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start col-6">
                <div class="app-card-body px-4 w-100">
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>ID</strong></div>
                                <div class="item-data">{{ $color->id }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Название</strong></div>
                                <div class="item-data">{{ $color->title }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-card-body px-4 w-100">
                    <div class="item py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Цвет</strong></div>
                                <div class="item-data">
                                    <i class="fas fa-square" style="color:{{ $color->color }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
