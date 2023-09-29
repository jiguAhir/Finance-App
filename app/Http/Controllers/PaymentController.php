<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    public function ViewPayments(){

        /*
        select pa.created_at as 'Date of Payment', Concat(cu.firstname, ' ', cu.lastname)as 'Customer Name', Concat('$', pa.interest_payment) as 'Interest Payment', Concat('$', pa.balance_payment) as 'Balance Payment', Concat('$', cu.balance) as 'Current Balance'  
            from customers cu
            inner join 
            payments pa
            on 
            cu.id = pa.customerid; */

            /*$customers = Customer::with('payments')->get();
            $payments = Payment::with('customer')->get();*/

            $payments = DB::table('customers')
            -> join('payments', 'customers.id', '=', 'payments.customerid')
            ->select('customers.firstname', 'customers.lastname', 'customers.balance', 'payments.balance_payment', 'payments.interest_payment', 'payments.balance_payment', 'payments.created_at')
            ->get();

            return view('payment.view-payment', compact('payments'));

           }// End Method
}
