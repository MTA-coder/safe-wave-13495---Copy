<?php


namespace App\Http\Requests\File;

use App\Enums\ImageType;
use App\Enums\VideoType;
use Illuminate\Validation\Rule;
use Kouja\ProjectAssistant\Bases\BaseFormRequest;

class UploadFileRequest extends BaseFormRequest
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
                'required', 'file', 'max:10240 ', 'mimes:'
                    . implode(',', ImageType::getValues()) . ','
                    . implode(',', VideoType::getValues())
            ],
            'hall_id' => ['nullable', 'integer', Rule::exists('halls', 'id')->whereNull('deleted_at')],
            'occasion_id' => ['nullable', 'integer', Rule::exists('occasions', 'id')->whereNull('deleted_at')],
        ];
    }
}
