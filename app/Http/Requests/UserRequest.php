<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'role_id' => 'required',
            'name' => 'bail|required|unique:users,name|min:5|max:255',
            'email' => 'bail|required|unique:users,email|email',
            'password' => 'bail|required|min:3|max:255'
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
            'role_id' => 'Role',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password'
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
            'email' => 'Поле «:attribute» типа email должно быть корректным'
        ];
    }
}
