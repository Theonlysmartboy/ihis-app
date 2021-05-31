<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\HealthFacility;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSearch(){
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
        $facility_name = $facility->name;
        return view('patients.search',compact('facility_name'));
    }
    public function search(Request $request){
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
        $facility_name = $facility->name;
        $patient = Patient::where(['huduma_no'=>$request->id])->first();
        $huduma_no = $patient->huduma_no;
        $diagnosis = Diagnosis::where(['patient_id'=>$patient->id])->get();
        $result_design = "";
        foreach($diagnosis as $diag){
            $result_design .= "<tr>
            <td>$diag->id</td>";
            $date = $diag->created_at->format('d/m/Y h:m');
            $result_design .="<td>$date</td>";
            $facility = HealthFacility::where(['id'=>$diag->facility_id])->first();
            $result_design .="<td>$facility->name</td>
            <td>$diag->diagnosis</td>
            <td>$diag->prescription</td>

            </tr>";
        }
        return view('patients.result',compact('facility_name','result_design','huduma_no'));
    }
    public function index()
    {
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
        $facility_name = $facility->name;
        $patients = Patient::where(['facility_id'=>$facility->id])->get();
        return view('patients.index',compact('facility_name','patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
        $facility_name = $facility->name;
        return view('patients.new',compact('facility_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $facility = HealthFacility::where(['user_id'=>Auth::user()->id])->first();
        $facility_name = $facility->name;
        $patient = new Patient();
        $patient->facility_id = $facility->id;
        $patient->huduma_no = $request->id;
        $patient->registrar = Auth::user()->id;
        $patient->save();
        $diagnosis = new Diagnosis();
        $diagnosis->patient_id = $patient->id;
        $diagnosis->facility_id = $facility->id;
        $diagnosis->diagnosis = $request->diag;
        $diagnosis->prescription = $request->prescr;
        $diagnosis->save();
        return redirect()->route('patients',$facility_name);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
