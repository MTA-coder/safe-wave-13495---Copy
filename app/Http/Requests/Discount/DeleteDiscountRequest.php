<?php


namespace App\Http\Requests\Discount;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class DeleteDiscountRequest extends BaseFormRequest
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
        ];
    }
}