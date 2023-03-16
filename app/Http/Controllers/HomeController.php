<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Home;
use App\Models\Bundle;
use DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelsBundle = DB::table('bundles')
            ->select(
                'bundles.id',
                'bundles.warranty', 
                'bundles.advertising_networks_id', 
                'bundles.spheres_id', 
                'bundles.price', 
                'bundles.description',
                'spheres.name as spheres_name',
                'advertising_networks.name as advertising_networks_name',
                'bundles.created_at as date',
            )
            ->join('spheres', 'bundles.spheres_id', '=', 'spheres.id')
            ->join('advertising_networks', 'bundles.advertising_networks_id', '=', 'advertising_networks.id')
            ->get();

        $filtersAdvertising = DB::table('advertising_networks')->get();
        $filtersSpheres= DB::table('spheres')->get();

        return view('welcome', [
            'modelsBundle' => $modelsBundle,
            'filtersAdvertising' => $filtersAdvertising,
            'filtersSpheres' => $filtersSpheres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomeRequest  $request
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(Home $home)
    {
        //
    }
}