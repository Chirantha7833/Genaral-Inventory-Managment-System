<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function buypage(Request $request, $id)
    {
    $name = $request->query('name');

    $supplier = DB::table('suppliers')
        ->where('id', $id)
        ->first();

    return view('buypage', ['data' => $supplier, 'name' => $name]);
    }

    public function sellpage(Request $request, $id)
    {
    $name = $request->query('name');

    $customer = DB::table('customers')
        ->where('id', $id)
        ->first();

    return view('sellpage', ['data' => $customer, 'name' => $name]);
    }


    public function buyOrderAndExpenditure(Request $request)
    {
        // Call the buyorder function
        $this->buyorder($request);

        // Call the expenditure function
        $this->expenditure($request);

        // Redirect or return a response as needed
        return view('success'); // Replace 'success' with your actual success route
    }

    public function buyorder(Request $request)
    {
        // Your existing buyorder logic...
        $date = $request->date;
        $productid = $request->productid;
        $productname = $request->productname;
        $quantity_price = $request->quantity_price ?? 0.0;
        $quantity = $request->quantity;
        $total_sales = $request->total_sales;

        $supplier = DB::table('suppliers')
            ->where('id', $request->supplier_id)
            ->select('id as supplier_id', 'name as supplier_name')
            ->first();

        if (!$supplier) {
            return view('failed');
        }

        // Insert data into the products table
        $savedata = DB::table('products')
            ->insert([
                'date' => $date,
                'product_id' => $productid,
                'product_name' => $productname,
                'quantity_price' => $quantity_price,
                'quantity' => $quantity,
                'total_sales' => $total_sales,
                'supplier_id' => $supplier->supplier_id,
                'supplier_name' => $supplier->supplier_name,
            ]);

        if (!$savedata) {
            return view('failed');
        }
    }

    public function expenditure(Request $request)
    {
        // Your existing expenditure logic...
        $date = $request->date;
        $total_sales = $request->total_sales;

        $supplier = DB::table('suppliers')
            ->where('id', $request->supplier_id)
            ->select('id as supplier_id', 'name as supplier_name')
            ->first();

        if (!$supplier) {
            return view('failed');
        }

        $totalExpenditure = DB::table('cash_books')
        ->sum('expenditure');

        $totalRevenue = DB::table('cash_books')
        ->sum('revenue');

        $totalBalance = $totalRevenue - $totalExpenditure;

        // Insert data into the cash_books table
        $savedata = DB::table('cash_books')
            ->insert([
                'date' => $date,
                'trn_no' => $supplier->supplier_id,
                'description' => $supplier->supplier_name,
                'expenditure' => $total_sales,
                'balance' => $totalBalance - $total_sales,
            ]);

        if (!$savedata) {
            return view('failed');
        }
    }

    public function sellOrderAndRevenue(Request $request)
    {
        // Call the sellorder function
        $this->sellorder($request);

        // Call the logic for inserting data into the 'cash_books' table
        $this->insertIntoCashBooks($request);
        
        // Redirect or return a response as needed
        return view('success'); // Replace 'success' with your actual success route
    }

    public function sellorder(Request $request)
    {
        // Your existing sellorder logic...
        $date = $request->date;
        $productid = $request->productid;
        $productname = $request->productname;
        $buy_price = $request->buy_price;
        $sell_price = $request->sell_price;
        $quantity = $request->quantity;

        $total_pl = ($sell_price - $buy_price) * $quantity;
        $total_sales = $request->total_sales;

        $customer = DB::table('customers')
            ->where('id', $request->customer_id)
            ->select('id as customer_id', 'name as customer_name')
            ->first();

        $profit = max($total_pl, 0);
        $loss = max(-$total_pl, 0);

        $savedata = DB::table('products')
            ->insert([
                'date' => $date,
                'product_id' => $productid,
                'product_name' => $productname,
                'buy_price' => $buy_price,
                'sell_price' => $sell_price,
                'quantity' => $quantity,
                'profit' => $profit,
                'loss' => $loss,
                'total_sales' => $total_sales,
                'customer_id' => $customer->customer_id,
                'customer_name' => $customer->customer_name,
            ]);

        if (!$savedata) {
            return view('failed');
        }
    }

    public function insertIntoCashBooks(Request $request)
    {
        // Your logic for inserting data into the 'cash_books' table...
        $date = $request->date;
        $buy_price = $request->buy_price;
        $sell_price = $request->sell_price;
        $quantity = $request->quantity;


        $total_pl = ($sell_price - $buy_price) * $quantity;
        $total_sales = $request->total_sales;

        $customer = DB::table('customers')
            ->where('id', $request->customer_id)
            ->select('id as customer_id', 'name as customer_name')
            ->first();

            $totalExpenditure = DB::table('cash_books')
            ->sum('expenditure');
    
            $totalRevenue = DB::table('cash_books')
            ->sum('revenue');
    
            $totalBalance = $totalRevenue - $totalExpenditure;

        $profit = max($total_pl, 0);
        $loss = max(-$total_pl, 0);

        $savedata = DB::table('cash_books')
            ->insert([
                'date' => $date,
                'revenue' => $profit,
                'expenditure' => $loss,
                'revenue' => $total_sales+$profit,
                'trn_no' => $customer->customer_id,
                'description' => $customer->customer_name,
                'balance' =>$totalBalance + $total_sales + $profit-$loss,
            ]);

        if (!$savedata) {
            return view('failed');
        }
    }

    public function productspage()
    {
        $data = DB::table('products')
            ->whereNotNull('supplier_id')
            ->select('id','date', 'product_id', 'product_name')
            ->get();

        return view('products', ['data' => $data]);
    }

    public function deleteproduct(Request $request)
    {
       $id = $request->id;
       $delete = DB::table('products')->where('id',$id)->delete();
       return redirect()->back();

    }
    
    
}