<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::select('id', 'first_name', 'last_name', 'phone_number', 'updated_at');
        return datatables()->eloquent($providers)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provider = new Provider();

        $provider->first_name = $request->first_name;
        $provider->last_name = $request->last_name;
        $provider->phone_number = $request->phone_number;
        $provider->save();

        return $provider;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->first_name = $request->first_name;
        $provider->last_name = $request->last_name;
        $provider->phone_number = $request->phone_number;
        $provider->save();

        return $provider;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        return $provider->delete() ? 'Deleted!!' : 'Not deleted';
    }
}
