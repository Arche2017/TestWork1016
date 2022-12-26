<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_id'=>'required',
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6|max:32|same:repeat_password',
            'repeat_password' => 'required|min:6|max:32|same:password',
            'lic_check'=>'accepted'
        ];
    }
}