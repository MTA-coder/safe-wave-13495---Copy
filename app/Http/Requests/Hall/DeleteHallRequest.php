<?php


namespace App\Http\Requests\Hall;

use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class DeleteHallRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hall_id' => ['required', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')]
        ];
    }
}