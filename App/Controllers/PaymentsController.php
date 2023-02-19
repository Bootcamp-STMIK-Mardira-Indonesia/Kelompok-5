<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Upload;
use App\Core\Validator;
use App\Core\QueryBuilder as DB;

class PaymentsController extends Controller
{
    public function update($id)
    {
        $image = $this->input->file('image');
        $validator = Validator::validate([
            'image' => [
                'required' => true,
            ],
        ], [
            'image' => $image
        ]);

        if ($validator->fails()) {
            $this->response(400, [
                'status' => 'error',
                'message' => 'Validation failed',
                'data' => $validator->errors(),
            ]);
        }

        $upload = new Upload($image);
        $upload->setPath($_SERVER['DOCUMENT_ROOT'] . "/uploads/");
        $upload->setAllowedExtensions(['jpg', 'png', 'jpeg', 'JPG', 'PNG', 'JPEG']);
        $upload->setAllowedMimeTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/JPG', 'image/PNG', 'image/JPEG']);

        $upload->setRandomName(true);
        $upload->validate();
        $upload->upload();
        if ($upload->isUploaded()) {
            $upload->move();
            DB::table('payments')->where('id', $id)->update([
                'image' => $upload->getName(),
            ]);
            $this->response(200, [
                'status' => 'success',
                'message' => 'File uploaded successfully',
                'data' => [
                    'file' => $upload->getName(),
                    'path' => $upload->getPath(),
                ],
            ]);
        }
        $this->response(400, [
            'status' => 'error',
            'message' => 'File not uploaded',
            'data' => [
                'file' => $upload->getName(),
                'path' => $upload->getPath(),
            ],
        ]);
    }
}
