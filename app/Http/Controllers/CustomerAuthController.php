<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\CustomerPresenceUpdated;

class CustomerAuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Handle customer login.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate(); 

            $customer = Auth::guard('customer')->user();



            return redirect()->route('customer.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
    }

    /**
     * Show the register form.
     */
    public function showRegister()
    {
        return view('customer.register');
    }

    /**
     * Handle customer registration.
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:customers,email',
            'password'              => 'required|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'is_online' => true,
            'last_seen' => now(),
        ]);

        Auth::guard('customer')->login($customer);
        $request->session()->regenerate();


        return redirect()->route('customer.dashboard');
    }

    /**
     * Customer dashboard.
     */
    public function dashboard()
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.dashboard', [
            'customer' => $customer,
            'products' => Product::latest()->take(8)->get(),
        ]);
    }

    /**
     * Logout the customer.
     */
    public function logout(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
