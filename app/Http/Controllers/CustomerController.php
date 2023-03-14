<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Models\Log;
use App\Models\ProfileType;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function home()
    {
        $customers = Customer::all();

        return view('dashboard', compact('customers'));
    }

    public function edit(Customer $customer)
    {
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

        DB::transaction(function () use ($data) {
            $customer = Customer::create($data);
            $data['customer_id'] = $customer->id;

            Address::create($data);
            Profile::create($data);

            Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'customer created']);
        });

        return redirect('/home')->with('status', 'Cliente Cadastrado com Sucesso!');
    }

    public function update(UpdateCustomerAddressRequest $request, Customer $customer)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data, $customer) {
            Customer::find($customer->id)->update($data);
            Address::where('customer_id', $customer->id)->first()->update($data);
            Profile::where('customer_id', $customer->id)->first()->update($data);

            Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'customer updated']);
        });

        return redirect('/home')->with('status', 'Cliente Atualizado com Sucesso!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        Log::create(['user_id' => auth()->id() ?? 1, 'action' => 'customer deleted']);

        return redirect('/home')->with('status', 'Cliente Atualizado com Sucesso!');
    }
}