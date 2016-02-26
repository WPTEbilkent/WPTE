<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTag($tag){
        if($tag == "null"){
            $view = TutorialController::index();
        }else {
            $tutorials = DB::table('tutorial')->where('tag',"LIKE" ,"%$tag%")->orderBy('id','desc')->paginate(10);
            $tutorials->setPath('Tutorial');
            $view = view('Tutorial.index')->with('tutorials',$tutorials);
        }
        $sections =$view->renderSections();
        return $sections['content'];
    }

    public function index()
    {
        $tutorial = DB::table('tutorial')->orderBy('id','desc')->paginate(10);
        $tutorial->setPath('tutorial');
        return view('Tutorial.index',['tutorials' => $tutorial]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('Tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = str_replace(" ","",$request["tags"]);
        $tags = mb_strtolower($tags);
        $title = mb_strtoupper($request["title"]);


        DB::table('tutorial')->insert([
            'title' => $title,
            'content' => $request["message"],
            'publisher_id' => 2,
            'date' => date('Y-m-d'),
            'tag'=>$tags,
        ]);
        return view('Tutorial.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$user = Users::findOrNew($id);
        //returns the Tutorial page with id.
        $tutorial = DB::table('tutorial')->where('id', $id)->get();
        return view('Tutorial.show',['tutorial' => $tutorial]);
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
