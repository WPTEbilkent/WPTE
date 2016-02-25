<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class QAController extends Controller
{

    public function searchTag($tag){
        if($tag == "null"){
           $view = QAController::index();
        }else {
            $questions = DB::table('question')->where('tags',"LIKE" ,"%$tag%")->orderBy('id','desc')->paginate(10);
            $questions->setPath('QA');
            $view = view('QA.index')->with('questions',$questions);
        }
        $sections =$view->renderSections();
        return $sections['content'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = DB::table('question')->orderBy('id','desc')->paginate(10);
        $questions->setPath('QA');
        return view('QA.index')->with('questions',$questions);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('QA.create');
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


        DB::table('question')->insert([
            'title' => $request["title"],
            'question' => $request["message"],
            'user_id' => 2,
            'date' => date("Y-M-D"),
            'tags'=>$tags,
            'subject' => 'Subjectim budur',
            'date' => date('Y/m/d'),
        ]);
        return view('QA.create')->with("questions",$request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Questions::findOrNew($id);
        //returns the qa page with id.
       return view('QA.show')->with('question',$question);
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
