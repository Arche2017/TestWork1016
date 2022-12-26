<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\BaseFormRequest;

class PermissionCreateRequest extends BaseFormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'permission' => ['required','max:100'],
          'role_id' => ['required','numeric','max:10'],
        ];
    }
}
