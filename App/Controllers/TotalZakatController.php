<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\QueryBuilder as DB;

class TotalZakatController extends Controller
{
    public function totalZakatFitrah()
    {
        $totalZakat = DB::table('payments')->select([('SUM(payments.total_zakat) as total')
        ])->where('payments.zakat_id', 1)->first();
        $this->response(200, [
            'message' => 'Total Zakat Fitrah',
            'data' => $totalZakat
        ]);
    }

    public function totalZakatMaal()
    {
        $totalZakat = DB::table('payments')->select([('SUM(payments.total_zakat) as total')
        ])->where('payments.zakat_id', 2)->first();
        $this->response(200, [
            'message' => 'Total Zakat Maal',
            'data' => $totalZakat
        ]);
    }

    public function totalZakatProfesi()
    {
        $totalZakat = DB::table('payments')->select([('SUM(payments.total_zakat) as total')
        ])->where('payments.zakat_id', 3)->first();
        $this->response(200, [
            'message' => 'Total Zakat Profesi',
            'data' => $totalZakat
        ]);
    }
}
