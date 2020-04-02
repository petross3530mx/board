<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests\UpdateUserRequest;



class UserController extends Controller
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
    public function index()
    {

        $user = Auth::user();

        return view('user', ['data' => $user]);
    }

    public  function updateUser(UpdateUserRequest $req){

        $user = Auth::user();
        $userInDb = User::find($user->id);

        $userInDb->name = $req->input('name');
        $userInDb->surname = $req->input('surname');
        $userInDb->email = $req->input('email');
        if( $req->input('password') ){

            $userInDb->password = Hash::make($req->input('password'));
        }

        $userInDb->save();

        return redirect()->route('user')->with('sucsess','User was updated');


        
    }
}
