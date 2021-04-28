<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {

        $customers = Customer::all();

        return view('frontend.customers.index',
            compact('customers'));
    }

    public function create()
    {
        return view('frontend.customers.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email|min:5|unique:customers,email',
            'password' => 'required|min:5|confirmed',
            'terms' => 'accepted'
        ];

        $this->validate($request, $rules);

        try {
            $customer = new Customer;
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->password = \Hash::make($request->input('password'));
            $customer->save();

            session()->flash('success', 'Köszönjük a regisztrációt.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->back();

        /*
        $customer = new Customer;
        $customer->name = "Ödön";
        $customer->email = "elek@freeamil.hu";
        $customer->password = \Hash::make('admin123');
        $customer->save();*/

    }

    public function show($id)
    {

        $customer = Customer::findOrFail($id);

        return view('frontend.customers.show',
            compact('customer'));
    }
}
