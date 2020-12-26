<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'title' => 'bail|required|unique:brands,title,' . $this->id . '|min:3|max:255',
            /*'img' => 'image'*/
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
            'title' => 'Name',
            'img' => 'Logotype'
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
            'unique' => 'Поле «:attribute» должно быть уникальным',
            'image' => 'Поле «:attribute» должно быть изображением',
        ];
    }
}
