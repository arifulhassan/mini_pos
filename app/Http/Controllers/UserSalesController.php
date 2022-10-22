<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserSalesController extends Controller
{

     public function __construct()
     {
       $this->data['tab_menu'] = 'sales';

     }

    public function index( $id )
    {
       $this->data['user']      = User::findOrFail($id);
       // $this->data['sales']     = $user->sales;

       return view('users.sales.sales', $this->data);
    }
}
