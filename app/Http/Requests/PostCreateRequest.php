<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class PostCreateRequest extends BaseFormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'title' => ['required','max:100'],
          'content' => ['required','max:1000'],
        ];
    }
}
