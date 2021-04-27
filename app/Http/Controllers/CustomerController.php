<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function registration(Request $request)
    {

        $rules = [
            'name' => 'required|min:5',
            'password' => 'required|min:5|confirmed'
        ];

        $this->validate($request, $rules);
        dd('VALID');

        return redirect()->back();

    }
}
