<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User as User;
use App\Subscription as Subs;
use App\Tutorial as Tutorial;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getUser($id)
    {
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            $user = User::findorfail($id);
            $subs = Subs::where('subscriber_id', '=' ,$id)->get();
            foreach($subs as $sub){
               $users_subscribed = User::where('id', '=', $sub->subscribed_id)->get();
            }
            foreach($users_subscribed as $user_subscribed){
              //print_r($tutorials = Tutorial::where('user_id', '=', $user_subscribed->id)); ITS CROWDED
            }

            return view('profile')->with('user', $user)->with('subscribers', $users_subscribed)->with('tutorials', $tutorials);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
