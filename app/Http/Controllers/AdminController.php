<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Obat;
use App\Pasien;
use App\Resep;
use App\DetailResep;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	
    	return view('admin.dashboard.index');
    }
}
