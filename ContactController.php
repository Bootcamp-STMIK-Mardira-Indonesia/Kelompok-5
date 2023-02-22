<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\QueryBuilder as DB;
use App\Core\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->get();

        $this->response(200, [
            'message' => 'Data Contacts',
            'total' => count($contacts),
            'data' => $contacts
        ]);
    }

    public function show($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->get();

        if ($contact) {
            $this->response(200, [
                'message' => 'Data Contact',
                'total' => count($contact),
                'data' => $contact
            ]);
        } else {
            $this->response(404, [
                'massage' => 'Contact not found'
            ]);
        }
    }

    public function store()
    {
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $whatsapp = $this->input->post('whatsapp');
        $sosial_media = $this->input->post('sosial_media');
        $validator = Validator::validate([
            'alamat' => [
                'required' => true,
            ],
            'no_telp' => [
                'required' => true,
            ],
            'whatsapp' => [
                'required' => true,
            ],
            'sosial_media' => [
                'required' => true,
            ],
        ], [
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'whatsapp' => $whatsapp,
            'sosial_media' => $sosial_media
        ]);

        if ($validator->fails()) {
            $this->response(400, [
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ]);
        }

        DB::table('contacts')->insert([
            'alamat' => $alamat,
            'no_telp' => $no_telp,
            'whatsapp' => $whatsapp,
            'sosial_media' => $sosial_media
        ]);
        $contact = DB::table('contacts')->where('alamat', $alamat)->orderBy('id', 'DESC')->first();
        if ($contact) {
            $this->response(201, [
                'message' => 'Contact created',
                'data' => $contact
            ]);
        } else {
            $this->response(404, [
                'message' => 'Contact not found'
            ]);
        }
    }

    public function update($id)
    {
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $whatsapp = $this->input->post('whatsapp');
        $sosial_media = $this->input->post('sosial_media');

        $contact = DB::table('contacts')->where('id', $id)->first();
        
        if($contact) {
            DB::table('contacts')->where('id', $id)->update([
                'alamat' => $alamat,
                'no_telp' => $no_telp,
                'whatsapp' => $whatsapp,
                'sosial_media' => $sosial_media
            ]);
            $this->response(200, [
                'message' => 'Contact updated',
                'data' => $contact
            ]);
        } else {
            $this->response(404, [
                'message' => 'Contact not found'
            ]);
        } 
    }

    public function destroy($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->first();
        if ($contact) {
            DB::table('contacts')->where('id', $id)->delete('id', $id);
            $this->response(200, [
                'message' => 'Contact deleted',
                'data' => $contact
            ]);
        } else {
            $this->response(404, [
                'message' => 'Contact not found'
            ]);
        }
    }
}
