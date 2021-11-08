<?php


namespace App\Http\Requests\Discount;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class GetDiscountRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hall_id' => ['required', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')],
        ];
    }
}