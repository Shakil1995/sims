<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category_id' =>'required',
            'brand_id' =>'required',
            'color_id' =>'required',
            'size_id' =>'required',
            'product_name' => 'required|min:2|max:60|',
            'product_sku' =>'required|min:2|max:25' ,
            'product_img' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'product_buy_price' =>'required',
            'product_stock'=>'required'
        ];
    }
}
