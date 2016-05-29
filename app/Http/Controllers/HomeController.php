<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Contract;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $contract = Contract::firstOrNew(array('man_number' => Auth()->user()->man_number));
        $today = \Carbon\Carbon::today();
        $expires = \Carbon\Carbon::parse($contract->expires_on);
        $diff = $today->diffInMonths($expires, false);
       

        if(Auth()->user()->position=='Academic Staff' OR Auth()->user()->position=='Support Staff' )
            {
                return view('Contracts.contract_info')->with(array('diff'=> $diff, 'contract' => $contract));
            }else{
                return view('home');
            }
    }

    public function help()
    {
        return view('help');
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function contract_info()
    {
        return view('contract_info');
    }

}
