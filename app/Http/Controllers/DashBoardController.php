<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashBoardController extends Controller
{
    public function viewdashboard()
    {
        // Call the totalSuppliers method to get the total number of suppliers
        $totalSuppliers = $this->totalSuppliers();
        $totalCustomers = $this->totalCustomers();
        $totalRevenue = $this->totalRevenue();
        $totalExpenditure = $this->totalExpenditure();
        $totalProfit = $this->totalProfit();
        $totalLoss = $this->totalLoss();
        
        
    
        // Render the 'dashboard' view and pass the totalSuppliers variable
        return view('dashboard', [
            'totalSuppliers' => $totalSuppliers,
            'totalCustomers' => $totalCustomers,
            'totalRevenue' => $totalRevenue,
            'totalExpenditure' => $totalExpenditure,
            'totalProfit' => $totalProfit,
                'totalLoss' => $totalLoss,
        ]);
    }

    
    public function totalSuppliers()
    {
        // Count the total number of suppliers
        $totalSuppliers = DB::table('suppliers')->count();
    
        // Return the totalSuppliers variable
        return $totalSuppliers;
    }


    public function totalCustomers()
    {
        // Count the total number of customers
        $totalCustomers = DB::table('customers')->count();

        // Return the totalCustomers variable
        return $totalCustomers;
    }


    public function totalRevenue()
    {
        // Sum the 'revenue' column in the 'cash_books' table
        $totalRevenue = DB::table('cash_books')->sum('revenue');

        // Return the totalRevenue variable
        return $totalRevenue;
    }


    public function totalExpenditure()
    {
        // Sum the 'expenditure' column in the 'cash_books' table
        $totalExpenditure = DB::table('cash_books')->sum('expenditure');

        // Return the totalExpenditure variable
        return $totalExpenditure;
    }


    public function totalProfit()
    {
    // Sum the 'profit' column in the 'products' table
    $totalProfit = DB::table('products')->sum('profit');

    // Return the totalProfit variable
    return $totalProfit;
    }   


    public function totalLoss() 
    {
    // Sum the 'loss' column in the 'products' table
    $totalLoss = DB::table('products')->sum('loss');

    // Return the totalLoss variable
    return $totalLoss;
    }
}
