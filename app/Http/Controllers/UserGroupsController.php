<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UserGroupsController extends Controller
{
  public function index(){

     $this->data['groups'] = Group::all();

     return view('group.group',$this->data);
  }

  public function create()
  {
    return view('group.create');

  }

  public function store(Request $request)
  {
           $formData = $request->all();
           if( Group::create($formData)) {
             Session::flash('message','Group Created Successfully');
           }
           // return $formData;
           return redirect()->to('groups');
  }
  public function destroy($id)
  {

      if( Group::find($id)->delete()) {
        Session::flash('message','Group Deleted Successfully');
      }
      // return $formData;
      return redirect()->to('groups');
  }

}
