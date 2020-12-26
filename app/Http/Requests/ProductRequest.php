<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|unique:products,title,' . $this->id . '|min:3|max:255',
            'excerpt' => 'bail|required|min:3',
            'price' => 'bail|required|numeric|between:1,1000000',
            'image' => 'image',
            'text' => 'required|min:3',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Title',
            'excerpt' => 'Excerpt',
            'text' => 'Text',
            'price' => 'Price',
            'image' => 'Image',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Поле «:attribute» обязательно для заполнения',
            'min' => 'Поле «:attribute» должно быть не меньше :min символов',
            'max' => 'Поле «:attribute» должно быть не больше :max символов',
            'numeric' => 'Поле «:attribute» должно быть числом',
            'between.min' => 'Поле «:attribute» должно быть не меньше :min',
            'between.max' => 'Поле «:attribute» должно быть не больше :max',
            'image' => 'Поле «:attribute» должно быть изображением',
            'unique' => 'Поле «:attribute» должно быть уникальным',
        ];
    }
}
