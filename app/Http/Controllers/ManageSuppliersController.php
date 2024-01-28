<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageSuppliersController extends Controller
{
    public function viewpage(){
        return view('suppliers');
    }

    public function registersuppliers(Request $request){
        $name        = $request->name;
        $address     = $request->address;
        $phone       = $request->phone;
        $date        = $request->date;
        $description = $request->description;

        $savedata = DB::table('suppliers')
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
    
    public function registerdsuppliers(){
        // Fetch all data from the 'suppliers' table
    $suppliers = DB::table('suppliers')->get();

  // Pass the data to the view
    return view('registerdsuppliers', ['suppliers' => $suppliers]);
    }

    public function deletesuppliers(Request $request)
    {
       $id = $request->id;
       $delete = DB::table('suppliers')->where('id',$id)->delete();
       return redirect()->back();

    }

   
}
