<?php

namespace App\Http\Requests\size;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSizeRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required|max:50|unique:sizes,name,'
        ];
    }
}
