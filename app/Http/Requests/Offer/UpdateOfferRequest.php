<?php


namespace App\Http\Requests\Offer;


use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UpdateOfferRequest extends BaseFormRequest
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
            'description' => ['string'],
            'price' => ['numeric', 'min:1']
        ];
    }
}