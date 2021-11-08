<?php


namespace App\Http\Requests\Hall;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class GetHallFilterRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'city_id' => ['nullable', 'integer', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'occasion_id' => ['nullable', 'integer', Rule::exists('occasions', 'id')->whereNull('deleted_at')]
        ];
    }
}