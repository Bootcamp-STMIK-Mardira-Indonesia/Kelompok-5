<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\QueryBuilder as DB;

class ZakatPayController extends Controller
{
    public function store()
    {
        DB::table('payments')->join(
            'users', 'payments.user_id', '=', 'users.id',
            'zakats', 'payments.zakat_id', '=', 'zakats.id',
            'bank_accounts', 'payments.bank_account_id', '=', 'bank_accounts.id'
        );

        $user_id = $this->input->post('user_id');
        $zakat_id = $this->input->post('zakat_id');
        $bank_account_id = $this->input->post('bank_account_id');
        $total_zakat = $this->input->post('total_zakat');

        DB::table('payments')->insert([
            'user_id' => $user_id,
            'zakat_id' => $zakat_id,
            'bank_account_id' => $bank_account_id,
            'total_zakat' => $total_zakat,
        ]);
        $zakat = DB::table('payments')->where('user_id', $user_id)->orderBy('id', 'DESC')->first();

        if ($zakat) {
            $this->response(201, [
                'message' => 'Pembayaran Success',
                'data' => $zakat
            ]);
        } else {
            $this->response(404, [
                'message' => 'not found'
            ]);
        }
    }
}
