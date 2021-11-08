<?php


namespace App\Http\Requests\Hall;

use BenSampo\Enum\Rules\EnumValue;
use App\Enums\RateEnum;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UpdateHallRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['string', Rule::unique('halls', 'name')->whereNull('deleted_at')],
            'description' => ['string'],
            'Latitude' => ['string'],
            'Longitude' => ['string'],
            'price' => ['numeric', 'min:1'],
            'area' => ['string'],
            'address' => ['string'],
            'capacity' => ['integer', 'min:1'],
            'rate' => ['integer', new EnumValue(RateEnum::class)],
            'city_id' => ['integer', Rule::exists('cities', 'id')->whereNull('deleted_at')],
            'hall_id' => ['required', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')]
        ];
    }
}