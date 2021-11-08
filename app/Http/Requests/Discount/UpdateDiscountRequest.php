<?php


namespace App\Http\Requests\Discount;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UpdateDiscountRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'discount_id' => ['integer', Rule::exists('discounts', 'id')->whereNull('deleted_at')],
            'name' => ['string'],
            'value' => ['numeric', 'min:1'],
            'from' => ['date_format:Y-m-d'],
            'to' => ['date_format:Y-m-d'],
        ];
    }
}