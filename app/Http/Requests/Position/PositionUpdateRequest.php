<?php

namespace App\Http\Requests\Position;

use App\Position;
use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PositionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $member = auth()->user()->member;
        return auth()->user()->can('pdg', $member) || auth()->user()->can('manager', $member);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'positions'      => 'required|string|min:3|max:30',
            'email'         => ['bail','required','email', Rule::unique('emails')->ignore($this->position->id, 'position_id')],
            'first_name'    => 'bail|nullable|required_without_all:last_name|min:3|max:20',
            'last_name'     => 'bail|nullable|required_without_all:first_name|min:3|max:20',
            'tel'           => ['bail','required','min:10','max:10',new TelRule(), Rule::unique('tels')->ignore($this->position->id, 'position_id')],
            'address'       => 'nullable|string|min:10|max:100',
            'city'          => 'bail|required|int|exists:cities,id',
            'comment'       => 'nullable|string|min:10'
        ];
    }
}
