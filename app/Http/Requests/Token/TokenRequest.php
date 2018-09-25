<?php

namespace App\Http\Requests\Token;

use App\Member;
use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('pdg', Member::class) || auth()->user()->can('manager', Member::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'range'     => 'required|int|lte:' . $this->company->premium->sold,
            'category'  => 'required|int|exists:categories,id'
        ];
    }
}
