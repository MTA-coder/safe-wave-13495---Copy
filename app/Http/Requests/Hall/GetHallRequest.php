<?php


namespace App\Http\Requests\Hall;

use App\Enums\OrderHallEnum;
use BenSampo\Enum\Rules\EnumValue;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class GetHallRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'most' => ['required', 'string', new EnumValue(OrderHallEnum::class)]
        ];
    }
}