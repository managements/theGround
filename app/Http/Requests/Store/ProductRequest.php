<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
           'name'       => 'required|string|min:3|max:50',
            'tva'       => 'required|int|max:80',
            'qt'        => 'required|int',
            'size'      => 'nullable|string|min:5',
            'desc'      => 'nullable|min:10',
        ];
    }
}
