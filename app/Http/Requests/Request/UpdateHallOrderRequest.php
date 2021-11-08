<?php


namespace App\Http\Requests\Request;

use App\Enums\RequestEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UpdateHallOrderRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'request_id' => ['required', 'integer', Rule::exists('requests', 'id')->whereNull('deleted_at')],
            'status' => ['required', 'string', new EnumValue(RequestEnum::class)],
            'message' => ['nullable', 'string', Rule::requiredIf($this->get('status') == RequestEnum::declined)]
        ];
    }
}