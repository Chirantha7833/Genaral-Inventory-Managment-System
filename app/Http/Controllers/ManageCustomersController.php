<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageCustomersController extends Controller
{
    public function viewpage(){
        return view('customers');
    }


  public function registercustomers(Request $request){
      $name        = $request->name;
      $address     = $request->address;
      $phone       = $request->phone;
      $date        = $request->date;
      $description = $request->description;

      $savedata = DB::table('customers')
      ->insert(
          array(
          'name' => $name,
          'address' =>$address,
          'phone' =>$phone,
          'date' => $date,
          'description' => $description,
      )
      );
 
  if ($savedata) {
      return view('success');

  } else {
      return view('faild');

        }

  }
  public function registerdcustomers(){
    // Fetch all data from the 'suppliers' table
    $customers = DB::table('customers')->get();

// Pass the data to the view
    return view('registerdcustomers', ['customers' => $customers]);
    }

    public function deletecustomer(Request $request)
    {
       $id = $request->id;
       $delete = DB::table('customers')->where('id',$id)->delete();
       return redirect()->back();

    }
}
