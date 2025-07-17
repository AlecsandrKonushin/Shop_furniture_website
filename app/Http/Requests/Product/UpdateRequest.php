<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $product = $this->route('product');

            $existing = $product->product_images()->count();
            $deleted = $this->input('deleted_images', []);
            $newImages = $this->file('product_images', []);

            $remainingImages = $existing - count($deleted);

            if ($remainingImages <= 0 && empty($newImages)) {
                $validator->errors()->add('product_images', 'Нужно загрузить минимум одно изображение.');
            }
        });
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
