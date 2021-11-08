<?php


namespace App\Http\Requests\Price;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UpdatePriceRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string'],
            'price' => ['numeric', 'min:1'],
            'price_id' => ['required', 'integer', Rule::exists('prices', 'id')]
        ];
    }
}