<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;
use App\Rules\Base64;

class ProductUpdateRequest extends FormRequest
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
          'cat' => ['required'],
          'title' => ['required','max:250'],
          'price' => ['required'],
          'color'=>['max:100'],
          //'tmp_photo.*' => ['nullable',new Base64]
        ];
    }
}
