<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\QueryBuilder as DB;

class ContentController extends Controller
{
    public function index()
    {
        $contents = DB::table('contents')->get();

        $this->response(200, [
            'message' => 'Data Contents',
            'total' => count($contents),
            'data' => $contents
        ]);
    }

    public function show($id)
    {
        $content = DB::table('contents')->where('id', $id)->get();

        if ($content) {
            $this->response(200, [
                'message' => 'Data Content',
                'total' => count($content),
                'data' => $content
            ]);
        } else {
            $this->response(404, [
                'massage' => 'Content not found'
            ]);
        }
    }

    public function store()
    {
        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');

        DB::table('contents')->insert([
            'judul' => $judul,
            'konten' => $konten
        ]);
        $content = DB::table('contents')->where('judul', $judul)->orderBy('id', 'DESC')->first();
        $this->response(201, [
            'message' => 'Content created',
            'data' => $content
        ]);
    }

    public function update($id)
    {
        $judul = $this->input->post('judul');
        $konten = $this->input->post('konten');

        $content = DB::table('contents')->where('id', $id)->first();
        
        if ($content) {
            DB::table('contents')->where('id', $id)->update([
                'judul' => $judul,
                'konten' => $konten
            ]);
            $this->response(200, [
                'message' => 'Content updated',
                'data' => $content
            ]);
        } else {
            $this->response(404, [
                'message' => 'Content not found'
            ]);
        }
    }

    public function destroy($id)
    {
        $content = DB::table('contents')->where('id', $id)->first();
        if ($content) {
            DB::table('contents')->where('id', $id)->delete('id', $id);
            $this->response(200, [
                'message' => 'Content deleted',
                'data' => $content
            ]);
        } else {
            $this->response(404, [
                'message' => 'Content not found'
            ]);
        }
    }
}
