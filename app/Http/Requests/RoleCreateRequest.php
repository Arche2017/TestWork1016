<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class RoleCreateRequest extends BaseFormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'role' => ['required','max:100'],
        ];
    }
}
