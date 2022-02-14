<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Transaction; 
use APp\Models\PendingPayment;
use Auth; 




class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

      return view('backend.transactions'); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $productname=$request->product_name;
        $paymentid=$request->payment_id;
        $productid=$request->product_id;
        $productdesc=$request->product_description; 
        $paymentamount=$request->amount; 


        $payment_status=getPaymentStatus($paymentid);  
        $response=json_decode($payment_status);
        $message=$response->payment_status;

        $transaction= new Transaction; 
        $pendingpayment= new PendingPayment;

        if (!Transaction::where('payment_id', $paymentid)->exists()) {

            $transaction->user_id=Auth::user()->id; 
            $transaction->label=$productname; 
            $transaction->product_id=$productid; 
            $transaction->payment_id=$paymentid; 
            $transaction->description=$productdesc; 
            $transaction->amount=$paymentamount;
            $transaction->save(); 
            $transaction_id=$transaction->id; 

            $pendingpayment->user_id=Auth::user()->id; 
            $pendingpayment->transaction_id=$transaction_id; 
            $pendingpayment->label=$productname; 
            $pendingpayment->product_id=$productid; 
            $pendingpayment->payment_id=$paymentid; 
            $pendingpayment->description=$productdesc; 
            $pendingpayment->amount=$paymentamount;
            $pendingpayment->save(); 

        }

        else{
            return back()->with('toast_error', 'System Error. Try again!'); 
        }

        switch ($message) {
            case 'waiting':
                $status='toast_error'; 
                $message='Payment not received. Status: Waiting!'; 
                break;

            case 'success': 
               
                $status='toast_success'; 
                $message='Your payment was successful.'; 
                break; 

            case 'confirming': 
                $status='toast_success'; 
                $message='The payment satus is pending confirmation.'; 
                break;

            case 'confirmed':
                $status='toast_success'; 
                $message='Payment received & confirmed.'; 
                break; 

            default:
                $status='toast_error'; 
                $message='Payment not received. Status: Waiting!'; 
                break;
        }

        
       return redirect('transactions')->with('toast_error', $message);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
