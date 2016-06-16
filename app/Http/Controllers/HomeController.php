<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\User;

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
       
        //check position of logged in user
        switch (Auth()->user()->position){

            case 'Head of Department':

                //fetch records from database and pass to the home page
                $currentUser = Auth()->user();
                $user = User::where('department', '=', $currentUser->department)->get();
                return view('home')->with(array('user' => $user));
                break;

            case 'Contracts Officer':

                //fetch records from database and pass to the home page
                $user = User::all();
                return view('HumanResource.home')->with(array('user' => $user));
                break;

            case 'Dean of School':
                break;

            default :

                //fetch records from database and pass to the home page
                $contract = User::firstOrNew(array('man_number' => Auth()->user()->man_number));
                $today = Carbon::today();
                $diff = $today->diffInMonths(Carbon::parse($contract->expires_on), false);
                return view('Contracts.contract_info')->with(array('diff'=> $diff, 'contract' => $contract));
                break;

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
