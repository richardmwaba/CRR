<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\EditRequest;
use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use Illuminate\Support\Facades\Validator;
use Mail;

class UserController extends Controller
{
    //

    protected $redirectTo = "/";


    public function staff_view(){

            $currentUser = Auth::user();
            $user = User::where('department', '=', $currentUser->department)->get();
            return view('Staff.staff_view')->with(array('user' => $user));

    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit')->with('user', $user);


    }

    public function add_new_form(){
        return view('auth.add_new');
    }

    //stores profile changes to database
    
    public function store(EditRequest $request){


        $user = Auth::user();
        $user1 = Staff::findOrFail($user->id);

        //check if user has correct old password

        if(Hash::check($request->password_old, $user->password)){

            $user1->fill(['email'=>$request->email, 'password'=>bcrypt($request->password),
                'first_name'=>$request->first_name, 'last_name'=>$request->last_name,
                'other_names'=>$request->other_names, 'nationality'=>$request->nationality,
                'department'=>$request->department]);

            $user1->save();
            if(Auth::user()->position!='Hod')
            return Redirect('/home');
            else
                Return Redirect::action('UserController@staff_view');

        }else {

            return view('profile.edit')->with('user', $user);
            #$user1->department = $request->department;
        }

    }

    //creates a new user record
    public function store_new_user(Request $data){

        $this->validate($data, [
            'man_number'=> 'required|unique:users|integer',
            'position'=>'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            
        ]);

        User::create(['man_number'=>$data->man_number, 'email'=>$data->email,
            'position'=> $data->position, 'password' => bcrypt($data->password),
            'expires_on' => Carbon::now()
        ]);

        //Send mail to new user
        Mail::send('Mails.new_user', ['data' => $data], function ($m) use ($data) {

            $m->to($data->email, 'Me')->subject('Complete registration');
        });
        
        //trigger flash message
        session()->flash('flash_message', 'New user has successfully been added');
        
        //load redirect page
        return Redirect::action('UserController@staff_view');

    }

    public function sendEmailReminder(){

        $user = User::findOrFail(1);

        Mail::send('Mails.reminder', ['user' => $user], function ($m) use ($user) {

            $m->to($user->email, $user->name)->subject('Your contract will expire soon');
        });

        //session()->flash('flash_message', 'Your mail has been sent');

        return back()->with([

            'flash_message' => 'email has been sent',
            'flash_message_important' => false

        ]);

    }

}
