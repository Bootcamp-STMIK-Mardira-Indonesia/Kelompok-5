<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\QueryBuilder as DB;
use App\Core\Validator;


class BankAccountController extends Controller
{
    public function index()
    {
        $bankAccounts = DB::table('bank_accounts')->get();

        $this->response(200, [
            'message' => 'Data Bank Accounts',
            'total' => count($bankAccounts),
            'data' => $bankAccounts
        ]);
    }

    public function show($id)
    {
        $bankAccount = DB::table('bank_accounts')->where('id', $id)->get();

        if ($bankAccount) {
            $this->response(200, [
                'message' => 'Data Bank Account',
                'total' => count($bankAccount),
                'data' => $bankAccount
            ]);
        } else {
            $this->response(404, [
                'message' => 'Bank Account not found'
            ]);
        }
    }

    public function store()
    {
        $name = $this->input->post('name');
        $id_bank = $this->input->post('id_bank');
        $atas_nama = $this->input->post('atas_nama');
        $validator = Validator::validate([
            'name' => [
                'required' => true,
            ],
            'id_bank' => [
                'required' => true,
            ],
            'atas_nama' => [
                'required' => true,
            ],
        ], [
            'name' => $name,
            'id_bank' => $id_bank,
            'atas_nama' => $atas_nama
        ]);

        if ($validator->fails()) {
            $this->response(400, [
                'status' => 'error',
                'message' => 'Validation failed',
                'data' => $validator->errors(),
            ]);
        }  

        DB::table('bank_accounts')->insert([
            'name' => $name,
            'id_bank' => $id_bank,
            'atas_nama' => $atas_nama
        ]);
        $bankAccount = DB::table('bank_accounts')->where('name', $name)->orderBy('id', 'desc')->first();
        
        $this->response(201,[
                'message' => 'Bank Account created',
                'data' => $bankAccount
            ]);
    }

    public function update($id)
    {
        $name = $this->input->post('name');
        $id_bank = $this->input->post('id_bank');
        $atas_nama = $this->input->post('atas_nama');
        
        $bankAccount = DB::table('bank_accounts')->where('id', $id)->first();
        if ($bankAccount) {
            DB::table('bank_accounts')->where('id', $id)->update([
                'name' => $name,
                'id_bank' => $id_bank,
                'atas_nama' => $atas_nama
            ]);
            $this->response(200, [
                'message' => 'Bank Account updated',
                'data' => $bankAccount
            ]);
        } else {
            $this->response(404, [
                'message' => 'Bank Account not found'
            ]);
        }
    }

    public function destroy($id)
    {
        $bankAccount = DB::table('bank_accounts')->where('id', $id)->first();

        if ($bankAccount) {
            DB::table('bank_accounts')->where('id', $id)->delete('id', $id);

            $this->response(200, [
                'message' => 'Bank Account deleted',
                'data' => $bankAccount
            ]);
        } else {
            $this->response(404, [
                'message' => 'Bank Account not found'
            ]);
        }
    }
}
