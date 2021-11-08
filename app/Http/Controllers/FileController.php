<?php

namespace App\Http\Controllers;

use App\Classes\StringConstants;
use App\Http\Requests\File\DeleteFileRequest;
use App\Http\Requests\File\UploadFileRequest;
use App\Models\ResFeaturePackage;
use App\Models\ResHall;
use App\Models\ResService;
use Kouja\ProjectAssistant\Helpers\FileClass;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class FileController extends Controller
{
    private $resHall, $resService, $fileClass;

    public function __construct(
        ResHall $resHall,
        ResService $resService,
        FileClass $fileClass
    ) {
        $this->resHall = $resHall;
        $this->resService = $resService;
        $this->fileClass = $fileClass;
    }

    public function upload(UploadFileRequest $request)
    {
        $file = $request->file('file');
        $data = $request->validated();
        unset($data['file']);

        $fileResponse =
            (new FileClass())->uploadFile(
                $file,
                StringConstants::getFileName($file->extension()),
                StringConstants::getShortPath(StringConstants::$fileFolder)
            );
        $data['url'] =  StringConstants::getFullPath($fileResponse);

        $uploaded = null;
        switch (collect($data)->keys()[0]) {
            case 'hall_id':
                $uploaded = $this->resHall->createData($data);;
                break;
            case 'service_id':
                $uploaded = $this->resService->createData($data);;
                break;
            default:
                return ResponseHelper::select($data);
                break;
        }
        if (empty($uploaded))
            return ResponseHelper::operationFail();
        return ResponseHelper::create($uploaded);
    }

    public function delete(DeleteFileRequest $request)
    {
        $data = $request->validated();
        return collect($data)->keys();

        switch (collect($data)->keys()[0]) {
            case 'res_hall_id':
                $record = $this->resHall->findData(['id' => $data['res_hall_id']]);
                $this->resHall->forceDeleteData(['id' => $data['res_hall_id']]);
                break;
            case 'res_service_id':
                $record = $this->resService->findData(['id' => $data['res_service_id']]);
                $this->resHall->forceDeleteData(['id' => $data['res_service_id']]);
                break;
            default:
                # code...
                break;
        }


        $this->fileClass->deleteFiles($record->url);
        return ResponseHelper::delete();
    }
}