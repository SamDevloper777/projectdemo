<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::latest()->paginate(10); 
        return view('admin.customers.index', compact('customers'));
    }

    public function show($id) {
        $customer = Customer::findOrFail($id);
        return view('admin.customers.show', compact('customer'));
    }
}
