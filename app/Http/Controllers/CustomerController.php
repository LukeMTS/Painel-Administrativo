<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerAddressRequest;
use App\Models\Log;
use App\Models\ProfileType;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;

class CustomerController extends Controller
{
    public function index() {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function edit(int $id) {
        $customer = Customer::find($id);
        // dd($customer->profiles()->first()->last_access);
        $profileTypes = ProfileType::all();
        
        return view('customers.edit', compact('customer', 'profileTypes'));
    }

    public function register()
    {
        $profileTypes = ProfileType::all();

        return view('customers.register', compact('profileTypes'));
    }

    public function insert(StoreCustomerAddressRequest $request)
    {
        $data = $request->validated();
        $data["situation_id"] = 1;
        $customer = Customer::create($data);

        $data['customer_id'] = $customer->id;
        Address::create($data);

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'customer created']);
                    
        return redirect('/home')->with('status', 'Cliente Cadastrado com Sucesso!');
    }
}


