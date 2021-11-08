<?php


namespace App\Http\Requests\Discount;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class CreateDiscountRequest extends BaseFormRequest
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
            'name' => ['required', 'string'],
            'value' => ['required', 'numeric', 'min:1'],
            'from' => ['nullable', 'date_format:Y-m-d', Rule::requiredIf($this->filled('to'))],
            'to' => ['nullable', 'date_format:Y-m-d', Rule::requiredIf($this->filled('from'))],
        ];
    }
}