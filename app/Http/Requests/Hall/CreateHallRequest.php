<?php


namespace App\Http\Requests\Hall;

use App\Enums\RateEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class CreateHallRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('halls', 'name')->whereNull('deleted_at')],
            'description' => ['required', 'string'],
            'Latitude' => ['required', 'string'],
            'Longitude' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:1'],
            'area' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'capacity' => ['required', 'integer', 'min:1'],
            'rate' => ['required', 'integer', new EnumValue(RateEnum::class)],
            'city_id' => ['required', 'integer', Rule::exists('cities', 'id')->whereNull('deleted_at')]
        ];
    }
}
