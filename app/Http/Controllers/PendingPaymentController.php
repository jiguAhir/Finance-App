<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\PendingPayment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class PendingPaymentController extends Controller
{
    public function ViewPendingPayments(){

            $pending_payments = DB::table('customers')
            -> join('pending_payments', 'customers.id', '=', 'pending_payments.customerid')
            ->select('customers.firstname', 'customers.lastname', 'pending_payments.pending_payment', 'pending_payments.created_at')
            ->get();

            return view('payment.view-pendingpayment', compact('pending_payments'));

           }// End Method
}
