<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Obat;
use App\Pasien;
use App\Resep;
use App\DetailResep;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$obat = Obat::all();
    	$pasien = Pasien::all();
    	$obatToday = Obat::where('created_at',Carbon::today())->get();
    	$resepToday = Resep::whereDate('created_at',Carbon::today())
    				  ->with('pasien')
    				  ->get();
    	// return $resepToday;
    	return view('dashboard.index',compact('obat','pasien','obatToday','resepToday'));
    }
}
