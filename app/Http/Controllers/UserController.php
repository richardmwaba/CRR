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


    public function my_profile(){

        $user = Auth::User();
        return view('profile.my_profile')->with('user', $user);

    }
    
    public function edit_profile()
    {
        $user = Auth::user();
        return view('profile.edit_profile')->with('user', $user);


    }

    public function edit_user($man_number)
    {
        $user = User::firstOrNew(array('man_number' => $man_number));
        return view('profile.edit_user')->with('user', $user);


    }

    public function staff_view()

    {

        $currentUser = Auth::user();
        if ($currentUser->position != "Contracts Officer") {

            $user = User::where('department', '=', $currentUser->department)->get();
            return view('Staff.staff_view')->with(array('user' => $user));

        } else {
            $user = User::all();
            return view('Staff.staff_view')->with(array('user' => $user));

        }

    }

    public function add_new_form()
    {
        $user = Auth::user();
        return view('auth.add_new')->with('user', $user);
    }

    //stores profile changes to database

    public function store(EditRequest $request)
    {


        $user = Auth::user();
        $user1 = Staff::findOrFail($user->id);

        //check if user has correct old password

        if (Hash::check($request->password_old, $user->password)) {

            $user1->fill(['email' => $request->email, 'password' => bcrypt($request->password),
                'first_name' => $request->first_name, 'last_name' => $request->last_name,
                'other_names' => $request->other_names, 'nationality' => $request->nationality
            ]);

            $user1->save();
            if ($user()->position != 'Head of Department')
                return Redirect('/home');
            else
                Return Redirect::action('UserController@staff_view');

        } else {

            return view('profile.edit')->with('user', $user);
            #$user1->department = $request->department;
        }

    }

    //creates a new user record
    public function store_new_user(Request $data)
    {

        $this->validate($data, [
            'man_number' => 'required|unique:users|integer',
            'position' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'department' => 'required',

        ]);

        User::create(['man_number' => $data->man_number, 'department' => $data->department, 'email' => $data->email,
            'position' => $data->position, 'password' => bcrypt($data->password),
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

    public function store_edited_user(Request $request, $man_number)
    {


        if ($request->has('man_number') AND $request->has('position') AND $request->has('email')) {
            $this->validate($request, [
                'man_number' => 'required|unique:users|integer',
                'position' => 'required',
                'email' => 'required|email|max:255|unique:users',
            ]);
            $user = User::firstOrNew(array('man_number' => $man_number));
            $user->man_number = $request->man_number;
            $user->email = $request->email;
            $user->position = $request->position;
            $user->save();

        } elseif ($request->has('position') AND $request->has('email')) {
            $this->validate($request, [
                'position' => 'required',
                'email' => 'required|email|max:255|unique:users',
            ]);
            $user = User::firstOrNew(array('man_number' => $man_number));
            $user->email = $request->email;
            $user->position = $request->position;
            $user->save();
        }elseif
        ($request->has('position') AND $request->has('man_number')){
        $this->validate($request, [
            'position' => 'required',
            'man_number' => 'required|unique:users|integer',
        ]);
        $user = User::firstOrNew(array('man_number' => $man_number));
        $user->man_number = $request->man_number;
        $user->position = $request->position;
        $user->save();

    }elseif ($request->has('email') AND $request->has('man_number')){
        $this->validate($request, [
            'man_number' => 'required|unique:users|integer',
            'email' => 'required|email|max:255|unique:users',
        ]);
        $user = User::firstOrNew(array('man_number' => $man_number));
        $user->man_number = $request->man_number;
        $user->email = $request->email;
        $user->save();

    }elseif ($request->has('email')){
        $this->validate($request, [
            'email' => 'required|email|max:255|unique:users',
        ]);
        $user = User::firstOrNew(array('man_number' => $man_number));

        $user->email = $request->email;

        $user->save();

    }elseif ($request->has('position')){
        $this->validate($request, [
            'position' => 'required',
        ]);
        $user = User::firstOrNew(array('man_number' => $man_number));
        $user->position = $request->position;
        $user->save();

    }elseif($request->has('man_number')){
        $this->validate($request, [
            'man_number' => 'required|unique:users|integer',
        ]);
        $user = User::firstOrNew(array('man_number' => $man_number));
        $user->man_number = $request->man_number;
        $user->save();
    }

        return Redirect::action('UserController@staff_view');


    }

}
