<?php


namespace App\Http\Requests\Request;

use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use App\Enums\TimeEnum;

class CreateHallOrderRequest extends BaseFormRequest
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
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required', new EnumValue(TimeEnum::class)],
        ];
    }
}