<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthFacility;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->user()->hasRole('user')) {
            return redirect()->route('userhome');
        }
        if ($request->user()->hasRole('admin')){
            $healthFacility = HealthFacility::where(['user_id'=>$request->user()->id])->first();
            return redirect()->route('facility.dashboard',$healthFacility->name);
        }
        if ($request->user()->hasRole('super_admin')){
            return redirect()->route('master.dashboard');
        }
    }
}
