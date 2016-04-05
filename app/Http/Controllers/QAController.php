<?php

namespace App\Http\Controllers;

use App\Questions as Questions;
use App\Answers as Answers;
use App\Comments as Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Input;
use Response;

class QAController extends Controller
{

    public function newComment(Request $request)
    {
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            $comment = new Comments;
            $comment->user_id = Auth::user()->id;
            $comment->answer_id = $request->a_id;
            $comment->comment = $request->comment;
            $comment->date = date("Y-m-d H:i:s");
            $comment->save();

            return back();
        }
    }

    public function newAnswer(Request $request)
    {
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            $answer = new Answers;

            $answer->user_id = Auth::user()->id;
            $answer->question_id = $request->q_id;
            $answer->answer = $request->message;
            $answer->rate = 0;
            $answer->date = date("Y-m-d H:i:s");
            $answer->save();

            return back();
        }
    }

    public function searchTag($tag)
    {
        if ($tag == "null") {
            $view = QAController::index();
        } else {
            //Gathers Questions where the tags are alike with the tags given.
            $questions = Questions::where('tags', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);
            $questions->setPath('QA');
            //creating view accordingly attaching questions that we have gathered with.
            $view = view('QA.index')->with('questions', $questions);
        }
        //renders section in view and for ajax setting the related section(content).
        $sections = $view->renderSections();
        return $sections['content'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::orderBy('id', 'desc')->paginate(10);
        $questions->setPath('QA');
        return view('QA.index')->with('questions', $questions);
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
            return view('QA.create');
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

        $question = new Questions;

        $question->user_id = Auth::user()->id;
        $question->title = $title;
        $question->question = $request->question;
        $question->tags = $tags;
        $question->rate = 0;
        $question->date = date("Y-m-d H:i:s");
        $question->save();

        return view('QA.create')->with("questions", $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Question  database tablosundan ilgili id ile veriyi(soruyu) cekiyor.
        $question = Questions::findOrNew($id);
        //Answers tablosundan ilgili questionla ilgili var ise cevaplari(Answers) buluyor ve getiriyor.
        $answers = Answers::where('question_id', $id)->get();

        //Gerekli view a aldigi verilerle birlikte gonderiyor ve sayfa aciliyor.
        return view('QA.show')->with('question', $question)->with('answers', $answers);
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
