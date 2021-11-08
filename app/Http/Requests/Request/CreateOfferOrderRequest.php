<?php


namespace App\Http\Requests\Request;

use App\Enums\TimeEnum;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class CreateOfferOrderRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'offer_id' => ['required', 'integer', Rule::exists('offers', 'id')->whereNull('deleted_at')],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => ['required', new EnumValue(TimeEnum::class)],
        ];
    }
}