<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        //$customers = Customer::all();

        $search = $request->input('search');
        /*
        $search['sort_by'] = null;
        $search['sorting_direction'] = null;
        */

        $customers = Customer::search($search)->orderBy('name')->get();

        return view('frontend.customers.index',
            compact(['customers','search']));
    }

    public function create()
    {
        $customer = new Customer;
        return view('frontend.customers.create', compact('customer'));
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email|min:5|unique:customers,email',
            'password' => 'required|min:5|confirmed',
            'phone' => 'nullable|min:5',
            'terms' => 'accepted'
        ];

        $this->validate($request, $rules);

        try {
            $customer = new Customer;
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            if ($request->input('phone')) {
                $customer->phone = $request->input('phone');
            }
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

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('frontend.customers.edit')->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|min:5',
            'email' => 'required|email|min:5|unique:customers,email,' . $id,
            'phone' => 'nullable|min:5',
            'password' => 'nullable|min:5|confirmed'
        ];

        $this->validate($request, $rules);

        try {
            $customer = Customer::findOrFail($id);
            $customer->setAttributes($request->all());
            $customer->save();

            session()->flash('success', 'Módosítás megtörtént.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->back();

    }

    public function destroy($id)
    {

        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            session()->flash('success', 'Ügyfél törölve.');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->back();
    }

    public function destroyWithJson($id)
    {


        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return response()->json(['message' => 'Az ügyfél törölve']);
        } catch (\Exception $e) {
            return response()->json(['err' => $e->getMessage()]);
        }
    }
}
