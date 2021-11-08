<?php


namespace App\Http\Requests\Feature;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class CreateFeatureHallRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'feature_id' => ['required', 'integer', Rule::exists('features', 'id')->whereNull('deleted_at')],
            'hall_id' => ['required', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')]
        ];
    }
}