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
            return redirect('/');
        }
        if ($request->user()->hasRole('admin')){
            $healthFacility = HealthFacility::where(['admin'=>$request->user()->id]);
            return redirect('/admin/'.$healthFacility->name);
        }
        if ($request->user()->hasRole('superadmin')){
            return redirect('/master/dashboard');
        }
    }
}
