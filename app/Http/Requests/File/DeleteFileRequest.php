<?php


namespace App\Http\Requests\File;

use App\Enums\ImageType;
use App\Enums\VideoType;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class DeleteFileRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file' => [
                'nullable', 'file', 'max:10240 ', 'mimes:'
                    . implode(',', ImageType::getValues()) . ','
                    . implode(',', VideoType::getValues())
            ],
            'res_hall_id' => ['nullable', 'integer', Rule::exists('res_halls', 'id')->whereNull('deleted_at')],
            'res_service_id' => ['nullable', 'integer', Rule::exists('res_services', 'id')->whereNull('deleted_at')],
        ];
    }
}