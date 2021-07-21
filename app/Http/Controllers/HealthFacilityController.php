<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use App\Models\HealthFacility;
use Illuminate\Support\Facades\Auth;

class HealthFacilityController extends Controller
{
    /**
     * Show the dashboard
     * for this particular hotel
     */
    public function dashboard(){
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
        $facility_name = $facility->name;
        return view('facilities.dashboard',compact('facility_name'));
    }
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
            <td>$facility->level</td>
            <td>$facility->description</td>
            <td>
                <button class='btn btn-warning btn-xs'>Edit</button>
                <button class='btn btn-danger btn-xs'>Delete</button>
            </td>
        </tr>";
        }
        return view('facilities.index',compact('facility_design'));
    }
    public function listFacility(){
        $facilities = HealthFacility::get();
        $facility_design = "<div class='row'>";
        foreach ($facilities as $facility ){
            $zone = Zone::where(['id'=>$facility->zone_id])->first();
            $url = route('facility.dashboard',$facility->name);
            $facility_design .= " <div class='col-md-4'>
            <a href='$url'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>$facility->name</h5>
                    </div>
                    <div class='card-body'>
                        <p>Zone: $zone->name</p>
                        <p>Level: $facility->level</p>
                    </div>
                </div>
                </a>
            </div>";
        }
        $facility_design .="</div>";
        return view('welcome',compact('facility_design'));
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
            $user_dropdown= "<option selected>Select Contact Person</option>";
            $users= User::get();
            foreach($users as $user){
                $user_dropdown .= "<option class='bg-ready' value='".$user->id."'>". $user->name."</option>";
            }
        return view('facilities.new',compact('zone_dropdown', 'user_dropdown'));
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
        $facility->user_id = $request->contact;
        $facility->level = $request->level;
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
