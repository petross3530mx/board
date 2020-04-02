<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\AnnouncementRequest;

use App\Announcement;

use App\User;

use Illuminate\Support\Facades\Auth;


class AnnouncementController extends Controller
{
    
    public function submit(AnnouncementRequest $req){
    	$user = Auth::user();
    	$announcement = new Announcement();
    	$announcement->title = $req->input('title');
    	$announcement->content = $req->input('content');
    	$announcement->image = $req->file('image')->store('uploads', 'public');
    	$announcement->author = $user->id;
    	$announcement->save();
    	return redirect()->route('user')->with('sucsess','Bulletin was added');

    }

    public function allData(){
    	$users = User::all();
    	$userlist = array();
    	
    	foreach ($users as $user){
    		$userlist[$user->id] = $user->email;
    	}

    	return view('welcome', [
    		'data' => Announcement::orderBy('id', 'desc')->paginate(10),
    		'users'=>$userlist
    	]);
    }
}
