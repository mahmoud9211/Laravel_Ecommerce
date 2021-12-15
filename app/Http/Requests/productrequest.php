<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
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
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand_id' => 'required',
            'name' => 'required',
            'code' => 'required|unique:products,code,'.$this->id,
            'qty' => 'required|integer',
            'details' => 'required',
            'color' => 'required',
            'selling_price' => 'required',
            'image_one' => $this->id == null ? 'required|mimes:jpg,png,jpeg' : 'mimes:jpg,png,jpeg',
            'image_two' => $this->id == null ? 'required|mimes:jpg,png,jpeg' : 'mimes:jpg,png,jpeg',
            'image_three' =>'mimes:jpg,png,jpeg'


           
        ];
    }
}
