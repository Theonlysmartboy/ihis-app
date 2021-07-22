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
    public function dashboard(Request $request){
        if(!Auth::check()){
            return view('auth.login');
        }
        if ($request->user()->hasRole('admin')){
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
            $facility_name = $facility->name;
            return view('facilities.dashboard',compact('facility_name'));
        }else{
            return redirect()->back();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if(!Auth::check()){
        return view('auth.login');
    }
    if ($request->user()->hasRole('super_admin')){
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
    }else{
        return redirect()->back();
    }
    }
    public function listFacility(){
        //level5
        $level5_facilities = HealthFacility::where(['level'=>'5'])->get();
        $level5_facility_design = "<div class='row'>";
        foreach ($level5_facilities as $level5_facility ){
            $zone = Zone::where(['id'=>$level5_facility->zone_id])->first();
            $url = route('facility.dashboard',$level5_facility->name);
            $level5_facility_design .= " <div class='col-md-4'>
            <a href='$url'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>$level5_facility->name</h5>
                    </div>
                    <div class='card-body'>
                        <p>Zone: $zone->name</p>
                    </div>
                </div>
                </a>
            </div>";
        }
        $level5_facility_design .="</div>";
        //level4
        $level4_facilities = HealthFacility::where(['level'=>'4'])->get();
        $level4_facility_design = "<div class='row'>";
        foreach ($level4_facilities as $level4_facility ){
            $zone = Zone::where(['id'=>$level4_facility->zone_id])->first();
            $url = route('facility.dashboard',$level4_facility->name);
            $level4_facility_design .= " <div class='col-md-4'>
            <a href='$url'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>$level4_facility->name</h5>
                    </div>
                    <div class='card-body'>
                        <p>Zone: $zone->name</p>
                    </div>
                </div>
                </a>
            </div>";
        }
        $level4_facility_design .="</div>";
        //level3
        $level3_facilities = HealthFacility::where(['level'=>'3'])->get();
        $level3_facility_design = "<div class='row'>";
        foreach ($level3_facilities as $level3_facility ){
            $zone = Zone::where(['id'=>$level3_facility->zone_id])->first();
            $url = route('facility.dashboard',$level3_facility->name);
            $level3_facility_design .= " <div class='col-md-4'>
            <a href='$url'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>$level3_facility->name</h5>
                    </div>
                    <div class='card-body'>
                        <p>Zone: $zone->name</p>
                    </div>
                </div>
                </a>
            </div>";
        }
        $level3_facility_design .="</div>";
        //level2
        $level2_facilities = HealthFacility::where(['level'=>'2'])->get();
        $level2_facility_design = "<div class='row'>";
        foreach ($level2_facilities as $level2_facility ){
            $zone = Zone::where(['id'=>$level2_facility->zone_id])->first();
            $url = route('facility.dashboard',$level2_facility->name);
            $level2_facility_design .= " <div class='col-md-4'>
            <a href='$url'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>$level2_facility->name</h5>
                    </div>
                    <div class='card-body'>
                        <p>Zone: $zone->name</p>
                    </div>
                </div>
                </a>
            </div>";
        }
        $level2_facility_design .="</div>";
        //level1
        $level1_facilities = HealthFacility::where(['level'=>'1'])->get();
        $level1_facility_design = "<div class='row'>";
        foreach ($level1_facilities as $level1_facility ){
            $zone = Zone::where(['id'=>$level1_facility->zone_id])->first();
            $url = route('facility.dashboard',$level1_facility->name);
            $level1_facility_design .= " <div class='col-md-4'>
            <a href='$url'>
                <div class='card'>
                    <div class='card-header'>
                        <h5>$level1_facility->name</h5>
                    </div>
                    <div class='card-body'>
                        <p>Zone: $zone->name</p>
                    </div>
                </div>
                </a>
            </div>";
        }
        $level1_facility_design .="</div>";

        return view('welcome',compact('level5_facility_design','level4_facility_design','level3_facility_design','level2_facility_design','level1_facility_design'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {if(!Auth::check()){
        return view('auth.login');
    }
    if ($request->user()->hasRole('super_admin')){
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
    }else{
        return redirect()->back();
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return view('auth.login');
        }
        if ($request->user()->hasRole('super_admin')){
        $facility = new HealthFacility();
        $facility->name = $request->name;
        $facility->zone_id = $request->zone;
        $facility->user_id = $request->contact;
        $facility->level = $request->level;
        $facility->description = $request->descr;
        $facility->save();
        return redirect()->route('facilities');
    }else{
        return redirect()->back();
    }
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
