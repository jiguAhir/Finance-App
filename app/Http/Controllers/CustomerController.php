<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\PendingPayment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function ViewRegisterCustomer(){

        return view('customer.register-customer');

    }// End Method


    public function ViewCustomer(){

        //$customer = Customer::latest()->get();
        //$customer = Customer::all();
        $customer = DB::table('customers')
            ->select('customers.id', 'customers.firstname', 'customers.lastname', 'customers.balance')
            ->get();
        return view('customer.view-customer', compact('customer'));

    }// End Method

    public function AddBalance(Request $request){

        $customer_id = $request->id;
        $addbalance = $request->add_amount;

        $balance = Customer::findOrFail($customer_id)->balance;
        $total_balance = $balance + $addbalance;

        Customer::findOrFail($customer_id)->update([
                'balance' => $total_balance,
            ]);
            $notification = array(
                'message' => 'Customer Balance added Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

    }// End Method

    public function MakePayment(Request $request){
        $customer_id = $request->id;
        $payment = $request->payment_amount;

        $balance = Customer::findOrFail($customer_id)->balance;
        $status = Customer::findOrFail($customer_id)->status;

        $interest = ($balance * 10)/100;

        $pending_payment = PendingPayment::where('customerid', '=', $customer_id)->first();

        if($status == '1'){

            if($pending_payment != null){
                
                $pending_interest = $pending_payment->pending_payment;
                

                if($payment > $pending_interest){
                    $new_payment = $payment - $pending_interest;
                
                    if($new_payment > $interest){
                        $total_payment = $balance - $interest;
                        $final_balance = $balance - $total_payment;
                        $interest_payment = $pending_interest + $interest;
                        $newpending_interest = 0;

                        DB::table('pending_payments')->where('customerid', $customer_id)->delete();
                        
                    } elseif($new_payment == $interest){
                        $total_payment = 0;
                        $final_balance = $balance;
                        $interest_payment = $pending_interest + $interest;
                        $newpending_interest = 0;

                        DB::table('pending_payments')->where('customerid', $customer_id)->delete();

                    } elseif($new_payment < $interest){

                        $total_payment = 0;
                        $final_balance = $balance;
                        $interest_payment = $pending_interest;
                        $newpending_interest = $interest - $new_payment;

                        DB::table('pending_payments')
                        ->where('customerid', $customer_id)
                        ->update(['pending_payment' => $newpending_interest], ['created_at' => Carbon::now()]);
                    }   

                } elseif($payment < $pending_interest){
                    $total_payment = 0;
                    $final_balance = $balance;
                    $interest_payment = $payment;
                    $newpending_interest = $pending_interest - $payment;

                    PendingPayment::findOrFail($customer_id)->update([
                        'pending_payment' => $newpending_interest,
                        'created_at' => Carbon::now(),
                    ]);
                }

            } elseif($pending_payment == null){
                if($payment > $interest){
                    $interest_payment = $interest;
                    $total_payment = $payment - $interest;
                    $final_balance = $balance - $total_payment;

                } elseif($payment == $interest){
                    $interest_payment = $interest;
                    $total_payment = $payment - $interest;
                    $final_balance = $balance - $total_payment;

                } elseif($payment < $interest){
                    $interest_payment = $payment;
                    $total_payment = 0;
                    $final_balance = $balance - $total_payment;
                    $pending_payment = $interest - $payment;

                    PendingPayment::insert([
                            'customerid' => $customer_id,
                            'pending_payment' => $pending_payment,
                            'created_at' => Carbon::now(),
                        ]);
                }
                
                Payment::insert([
                    'customerid' => $customer_id,
                    'balance_payment' => $total_payment,
                    'interest_payment' => $interest_payment,
                    'created_at' => Carbon::now(),
                ]);
            }
        
        } elseif($status == '2') {

            $final_balance = $balance - $payment;

            Payment::insert([
                'customerid' => $customer_id,
                'balance_payment' => $payment,
                'interest_payment' => 0,
                'created_at' => Carbon::now(),
            ]);
        }
       
        Customer::findOrFail($customer_id)->update([
                'balance' => $final_balance,
            ]);

        $notification = array(
                'message' => 'Payment successfully processed',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

    } // End Method


    public function StoreCustomer(Request $request){

         $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'balance' => 'required',
        ],[

            'first_name.required' => 'First Name is Required',
            'last_name.required' => 'Last Name is Required',
            'address.required' => 'Address is Required',
            'gender.required' => 'Gender is Required',
            'balance.required' => 'Balance is Required',
        ]);

            Customer::insert([
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'address' => $request->address,
                'gender' => $request->gender,
                'balance' => $request->balance,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Customer Registered Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);

    }// End Method


    public function EditCustomer($id){
        $customer = Customer::findOrFail($id);
        return view('customer.edit-customer', compact('customer'));

    }// End Method

    
    public function UpdateCustomer(Request $request){
        $customer_id = $request->id;

        Customer::findOrFail($customer_id)->update([
                'firstname' => $request->first_name,
                'lastname' => $request->last_name,
                'address' => $request->address,
                'gender' => $request->gender,
                'status' => $request->status,
            ]);
            $notification = array(
                'message' => 'Customer Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('customer.viewcustomer')->with($notification);

    }// End Method

    
    public function DeleteCustomer($id){

        Customer::findOrFail($id)->delete();

        $notification = array(
                'message' => 'Customer Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back();

    }// End Method


    public function CustomerDetails($id){
        
        $customer = Customer::findOrFail($id);
        return view('customer.customer_details', compact('customer'));

    }// End Method

}
