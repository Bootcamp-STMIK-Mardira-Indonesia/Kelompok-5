<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\QueryBuilder as DB;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = DB::table('partnerships')->get();

        $this->response(200, [
            'message' => 'Data Partnerships',
            'total' => count($partnerships),
            'data' => $partnerships
        ]);
    }

    public function show($id)
    {
        $partnership = DB::table('partnerships')->where('id', $id)->get();

        if ($partnership) {
            $this->response(200, [
                'message' => 'Data Partnership',
                'total' => count($partnership),
                'data' => $partnership
            ]);
        } else {
            $this->response(404, [
                'massage' => 'Partnership not found'
            ]);
        }
    }

    public function store()
    {
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');

        DB::table('partnerships')->insert([
            'name' => $name,
            'alamat' => $alamat
        ]);
        $partnership = DB::table('partnerships')->where('name', $name)->orderBy('id', 'DESC')->first();

        $this->response(201, [
            'message' => 'Partnership created',
            'data' => $partnership
        ]);
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        $alamat = $this->input->post('alamat');

        $partnership = DB::table('partnerships')->where('id', $id)->first();
        
        if ($partnership) {
            DB::table('partnerships')->where('id', $id)->update([
                'name' => $name,
                'alamat' => $alamat
            ]);
            $this->response(200, [
                'message' => 'Partnership updated',
                'data' => $partnership
            ]);
        } else {
            $this->response(404, [
                'message' => 'Partnership not found'
            ]);
        }
    }

    public function destroy($id)
    {
        $partnership = DB::table('partnerships')->where('id', $id)->first();
        if ($partnership) {
            DB::table('partnerships')->where('id', $id)->delete('id', $id);
            $this->response(200, [
                'message' => 'Partnership deleted',
                'data' => $partnership
            ]);
        } else {
            $this->response(404, [
                'message' => 'Partnership not found'
            ]);
        }
    }
}
