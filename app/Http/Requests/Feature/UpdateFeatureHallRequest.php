<?php


namespace App\Http\Requests\Feature;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UpdateFeatureHallRequest extends BaseFormRequest
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
            'feature_id' => ['required', 'integer', Rule::exists('features', 'id')->whereNull('deleted_at')],
            'feature_hall_id' => ['required', 'integer', Rule::exists('feature_halls', 'id')->whereNull('deleted_at')],
        ];
    }
}