<?php


namespace App\Http\Requests\Offer;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class CreateOfferRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:1'],
            'hall_id' => ['required', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')]
        ];
    }
}