<?php

namespace App\Http\Requests\User;

use App\Member;
use Illuminate\Foundation\Http\FormRequest;

class PremiumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->user()->can('pdg', Member::class) || auth()->user()->can('manager', Member::class) && ($this->member->category->category != 'pdg'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $sold = $this->member->company->premium->sold + $this->member->range;
        return [
            'range'     => 'bail|required|int|lte:' . $sold,
            'status'    => 'required|int|exists:statuses,id'
        ];
    }
}
