<?php


namespace App\Http\Requests\Offer;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class DeleteOfferRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'offer_id' => ['required', 'integer', Rule::exists('offers', 'id')->whereNull('deleted_at')]
        ];
    }
}