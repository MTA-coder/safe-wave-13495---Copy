<?php


namespace App\Http\Requests\Price;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class CreatePriceRequest extends BaseFormRequest
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
            'price' => ['required', 'numeric', 'min:1'],
            'hall_id' => ['required', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')]
        ];
    }
}