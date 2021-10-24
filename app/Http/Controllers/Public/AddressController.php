<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where([
            ['addressable_type', User::class], 
            ['addressable_id', Auth::user()->id]
        ])->get(['id', 'street']);

        return $addresses;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {            
        $address = new Address;

        $address->ext_number = $request->ext_number;
        $address->int_number = $request->int_number;
        $address->street = $request->street;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;

        User::find(Auth::user()->id)->addresses()->save($address);

        return $address;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return $address;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->ext_number = $request->ext_number;
        $address->int_number = $request->int_number;
        $address->street = $request->street;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;

        User::find(Auth::user()->id)->addresses()->save($address);

        return $address;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        return $address->delete()? 'Deleted!!' : 'Not deleted';
    }
}
