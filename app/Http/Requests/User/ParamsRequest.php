<?php

namespace App\Http\Requests\User;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ParamsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->member->id === $this->member->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'bail|required|string|max:25|unique:members,name,' . $this->member->id,
            'email'         => ['bail','required','email','max:80','min:5', Rule::unique('emails')->ignore($this->member->id, 'member_id')],
            'first_name'    => 'required|string|min:2|max:20',
            'last_name'     => 'required|string|min:2|max:20',
            'tel'           => ['bail','required','min:10','max:10',new TelRule(),Rule::unique('tels')->ignore($this->member->id, 'member_id')],
            'address'       => 'nullable|string|min:10|max:100',
            'city'          => 'bail|required|int|exists:cities,id',
            'birth'         => 'bail|required|date|before:' . date('d-m-Y',strtotime("-18 years")),
            'identity'      =>  ['required', Rule::in(['name', 'email'])],
        ];
    }
}
