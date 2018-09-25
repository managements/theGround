<?php

namespace App\Http\Requests\Deal;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
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
            'name'          => 'required|string|min:3|max:20',
            'email'         => 'bail|nullable|email|unique:emails,email',
            'tel'           => ['bail','required','min:10','max:10',new TelRule(), 'unique:tels,tel'],
            'speaker'       => 'nullable|string|min:3|max:20',
            'address'       => 'nullable|string|min:10|max:100',
            'floor'         => 'nullable|int|min:1|max:10000',
            'build'         => 'nullable|int|min:1|max:10000',
            'apt_nbr'       => 'nullable|int|min:1|max:10000',
            'description'   => 'nullable|string|min:10|max:100',
            'city'          => 'required|int|exists:cities,id'
        ];
    }
}
