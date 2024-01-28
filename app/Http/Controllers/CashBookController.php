<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CashBookController extends Controller
{

    public function viewcashbook()
    {
        $data = DB::table('cash_books')
        ->get();

    return view('reports', ['data' => $data]);
    }
    public function revenue()
    {
        $data = DB::table('cash_books')
        ->whereNotNull('revenue')
        ->get();
        $totalRevenue = DB::table('cash_books')
        ->sum('revenue');

    return view('revenue', ['data' => $data,'totalRevenue' => $totalRevenue]);
    }
    public function expenditure()
    {
        $data = DB::table('cash_books')
        ->where('expenditure', '<>', 0)
        ->get();
        $totalExpenditure = DB::table('cash_books')
        ->sum('expenditure');

    return view('expenditure', ['data' => $data,'totalExpenditure'=>$totalExpenditure]);
    }
    public function profit()
    {
        $data = DB::table('products')
        ->where('profit', '<>', 0)
        ->get();
        $totalprofit= DB::table('products')
        ->sum('profit');

    return view('profit', ['data' => $data,'totalprofit'=>$totalprofit]);
    }
    public function loss()
    {
        $data = DB::table('products')
        ->where('loss', '<>', 0)
        ->get();
        $totalloss= DB::table('products')
        ->sum('loss');

    return view('loss', ['data' => $data,'totalloss'=>$totalloss]);
    }

}
