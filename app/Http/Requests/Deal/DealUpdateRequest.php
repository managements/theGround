<?php

namespace App\Http\Requests\Deal;

use App\Rules\TelRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Deal;

class DealUpdateRequest extends FormRequest
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
        if(($provider = Deal::where('slug',$this->provider)->first()) || ($provider = Deal::where('slug',$this->client)->first())){
            return [
                'name'          => 'required|string|min:3|max:20',
                'email'         => ['bail','nullable','email',Rule::unique('emails')->ignore($provider->id, 'deal_id')],
                'tel'           => ['bail','required','min:10','max:10',new TelRule(), Rule::unique('tels')->ignore($provider->id, 'deal_id')],
                'speaker'       => 'nullable|string|min:3|max:20',
                'address'       => 'nullable|string|min:10|max:100',
                'floor'         => 'nullable|int|min:1|max:10000',
                'build'         => 'nullable|int|min:1|max:10000',
                'apt_nbr'       => 'nullable|int|min:1|max:10000',
                'description'   => 'nullable|string|min:10|max:100',
                'city'          => 'required|int|exists:cities,id'
            ];
        }
            abort(404);

    }
}
