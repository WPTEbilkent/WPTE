<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;


class TwitchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            $twitch = DB::table('twitch')->orderBy('id', 'desc')->paginate(10);
            $twitch->setPath('twitch');
            return view('Twitch.index', ['twitches' => $twitch]);
        }*/
        if(Auth::user()->isAdmin()){
            $twitch = DB::table('twitch')->orderBy('id', 'desc')->paginate(10);
            $twitch->setPath('twitch');
            return view('Twitch.index', ['twitches' => $twitch]);
        }
        else{
            return Redirect::to('/');
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
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            $url = str_replace(" ", "", $request["url"]);
            $url = mb_strtolower($url);
            $url_arr = explode("/", $url);


            DB::table('twitch')->insert([
                'url' => $url_arr[1],
            ]);
            return view("Twitch.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Twitch.show',['twitch_id' => $id]);

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
