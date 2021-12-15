<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class brandrequest extends FormRequest
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
                'name' => 'required|regex:/^[a-zA-Z]+$/u|unique:brands,name,'.$this->id,
               'logo' => $this->id == null ?'required|mimes:jpg,png,gif' : 'mimes:jpg,png,gif'
            ];

        
    }
}
