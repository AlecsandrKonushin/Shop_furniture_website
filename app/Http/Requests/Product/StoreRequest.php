<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|numeric',
            'count' => 'required|numeric',
            'is_published' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'colors' => 'required|array|min:1',
            'product_images' => 'nullable|array|min:1|max:5',
            'product_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    protected function withValidator(Validator $validator): void
    {
        $validator->sometimes('preview_image', 'required', function () {
            return !$this->hasFile('preview_image') && !session()->has('temp_preview');
        });

        $validator->sometimes('product_images', 'required', function () {
            return !$this->hasFile('product_images') && !session()->has('temp_product_images');
        });
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->hasFile('preview_image')) {
            $tempPath = $this->file('preview_image')->store('temp', 'public');
            session(['temp_preview' => $tempPath]);
        }

        if ($this->hasFile('product_images')) {
            $paths = [];
            foreach ($this->file('product_images') as $image) {
                $paths[] = $image->store('temp', 'public');
            }
            session(['temp_product_images' => $paths]);
        }

        throw new HttpResponseException(redirect()->back()->withErrors($validator)->withInput());
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Название" обязательно для заполнения.',
            'title.string' => 'Поле "Название" должно быть строкой.',

            'description.required' => 'Поле "Описание" обязательно для заполнения.',
            'description.string' => 'Поле "Описание" должно быть строкой.',

            'price.required' => 'Поле "Цена" обязательно для заполнения.',
            'price.numeric' => 'Поле "Цена" должно быть числом.',

            'count.required' => 'Поле "Количество" обязательно для заполнения.',
            'count.numeric' => 'Поле "Количество" должно быть числом.',

            'is_published.required' => 'Необходимо указать, опубликован ли товар.',

            'category_id.required' => 'Необходимо выбрать категорию.',
            'category_id.exists' => 'Выбранная категория не существует.',

            'colors.required' => 'Необходимо выбрать цвет.',
            'colors.min' => 'Необходимо выбрать хотя бы один цвет.',

            'preview_image.required' => 'Загрузите изображение.',
            'preview_image.*.image' => 'Файл должен быть изображением.',
            'preview_image.*.mimes' => 'Изображение должно быть одного из форматов: jpeg, png, jpg, gif, svg.',

            'product_images.required' => 'Загрузите хотя бы одно изображение.',
            'product_images.array' => 'Изображения должны быть переданы в виде массива.',
            'product_images.min' => 'Нужно загрузить минимум одно изображение.',
            'product_images.max' => 'Можно загрузить не более 5 изображений.',
            'product_images.*.image' => 'Каждый файл должен быть изображением.',
            'product_images.*.mimes' => 'Изображения должны быть одного из форматов: jpeg, png, jpg, gif, svg.',
        ];
    }
}
