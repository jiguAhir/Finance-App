<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function ViewTotalInvestment(){

        $total_sales = DB::table('customers')
                            ->select(DB::raw('SUM(balance) as total_sales'), DB::raw('(SUM(balance) * 10)/100 as sales_interest'))
                            ->where('status', '=', 1)
                            ->get();

       /* $sales_interest = DB::table('customers')
                            ->select(DB::raw('(SUM(balance) * 10)/100 as sales_interest'))
                            ->where('status', '=', 1)
                            ->get();*/

        return view('dashboard', compact('total_sales'));

    }// End Method
}
