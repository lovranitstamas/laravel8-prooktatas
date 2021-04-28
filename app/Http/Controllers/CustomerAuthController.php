<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function create()
    {
        return view('frontend.auth.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', 'LIKE', $request->input('email'));

        $credentials = $request->only('email', 'password');

        //\Auth::loginUsingId(1) automatic login;

        if (\Auth::guard('customer')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route("customer.index");
        }

        return redirect()->back();

    }

    public function destroy()
    {
        \Auth::guard('customer')->logout();
        return redirect()->route("index");
    }
}
