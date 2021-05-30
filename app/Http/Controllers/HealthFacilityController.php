<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\HealthFacility;

class HealthFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities = HealthFacility::get();
        $facility_design = "";
        foreach ($facilities as $facility ){
            $zone = Zone::where(['id'=>$facility->zone_id])->first();
            $facility_design .= " <tr>
            <td>$facility->id</td>
            <td>$facility->name</td>
            <td>$zone->name</td>
            <td></td>
            <td>$facility->description</td>
        </tr>";
        }
        return view('master.facilities.index',compact('facility_design'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zone_dropdown= "<option selected>Select Zone</option>";
            $zones= Zone::get();
            foreach($zones as $zone){
                $zone_dropdown .= "<option class='bg-ready' value='".$zone->id."'>". $zone->name."</option>";
            }
        return view('master.facilities.new',compact('zone_dropdown'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = new HealthFacility();
        $facility->name = $request->name;
        $facility->zone_id = $request->zone;
        $facility->description = $request->descr;
        $facility->save();
        return redirect()->route('facilities');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HealthFacility  $healthFacility
     * @return \Illuminate\Http\Response
     */
    public function show(HealthFacility $healthFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HealthFacility  $healthFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(HealthFacility $healthFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HealthFacility  $healthFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HealthFacility $healthFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HealthFacility  $healthFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthFacility $healthFacility)
    {
        //
    }
}
