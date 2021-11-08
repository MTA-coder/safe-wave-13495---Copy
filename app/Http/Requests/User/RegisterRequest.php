<?php


namespace App\Http\Requests\User;


use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;
use Kouja\ProjectAssistant\Rules\Phone;

class RegisterRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'phone1' => ['required', new Phone(), Rule::unique('users', 'phone1')],
            'phone2' => ['nullable', new Phone(), Rule::unique('users', 'phone2')],
            'password' => ['required', 'string'],
            'confirm_password' => ['required', 'string', 'same:password'],
        ];
    }
}