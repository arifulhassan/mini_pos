<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayemntRequest;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserPaymentController extends Controller
{
  public function __construct()
  {
    $this->data['tab_menu'] = 'payments';

  }

 public function index( $id )
 {
    $this->data['user']      = User::findOrFail($id);
    // $this->data['payments']     = $user->payments;

    return view('users.payments.payments', $this->data);
 }

 public function store(PayemntRequest $request, $user_id)
 {
   // return $request->all();
   $formData = $request->all();
   $formData['user_id'] = $user_id;

   if( Payment::create($formData)) {
     Session::flash('message','Payment Added Successfully');
   }
   // return $formData;
   return redirect()->route('user.payments', ['id' => $user->id]);

 }

 /**
     * Delete a payment
     * @param  int $user_id  
     * @param  int $payment_id 
     */
    public function destroy($user_id, $payment_id)
    {	
    	if( Payment::destroy($payment_id) ) {
            Session::flash('message', 'Payment Deleted Successfully');
        }
        
        return redirect()->route('user.payments', ['id' => $user_id]);
    }
}
