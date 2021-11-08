<?php


namespace App\Http\Requests\Price;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class DeletePriceRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price_id' => ['required', 'integer', Rule::exists('prices', 'id')]
        ];
    }
}