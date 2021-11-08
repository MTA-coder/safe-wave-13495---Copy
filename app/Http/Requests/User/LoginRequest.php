<?php


namespace App\Http\Requests\User;


use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use Kouja\ProjectAssistant\Rules\Phone;

class LoginRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone1' => ['required', new Phone()],
            'password' => ['required', 'string']
        ];
    }
}