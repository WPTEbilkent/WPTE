<?php

namespace App\Http\Controllers;


use App\Tutorial as Tutorials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTag($tag)
    {
        if ($tag == "null") {
            $view = TutorialController::index();
        } else {
            $tutorials = DB::table('tutorial')->where('tag', "LIKE", "%$tag%")->orderBy('id', 'desc')->paginate(10);
            $tutorials->setPath('Tutorial');
            $view = view('Tutorial.index')->with('tutorials', $tutorials);
        }
        $sections = $view->renderSections();
        return $sections['content'];
    }

    public function index()
    {
        //$tutorials = DB::table('tutorial')->orderBy('id','desc')->paginate(10);
        $tutorials = Tutorials::orderBy('id', 'desc')->paginate(10);
        $tutorials->setPath('tutorial');
        return view('Tutorial.index', ['tutorials' => $tutorials]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            return view('Tutorial.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tags = str_replace(" ", "", $request["tags"]);
        $tags = mb_strtolower($tags);
        $title = mb_strtoupper($request["title"]);

        $tutorial = new Tutorials;
        $tutorial->user_id = 4;
        $tutorial->title = $title;
        $tutorial->content = $request->message;
        $tutorial->tags = $tags;
        $tutorial->rate = 0;
        $tutorial->date = date("Y-m-d H:i:s");
        $tutorial->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tutorial = Tutorials::where('id', $id)->get();
        return view('Tutorial.show')->with('tutorial', $tutorial);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
