<?php

namespace App\Http\Controllers;


use App\Tutorial as Tutorials;
use App\Tutorial;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Subscription;

class TutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe($id)
    {
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            $subs = Subscription::where("subscriber_id", $id)->where("subscribed_id", Auth::user()->id)->get();

            if (!$subs) {
                return back();
            } else {
                $subscription = new Subscription;
                $subscription->subscriber_id = $id;
                $subscription->subscribed_id = Auth::user()->id;
                $subscription->save();
                return back();
            }
        }

    }

    public function searchTag($tag)
    {
        if ($tag == "null") {
            $view = TutorialController::index();
        } else {
            // search by user name
            $tutorials = Tutorials::where('tags', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);
            $content_search = Tutorials::where('content', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);
            $title_search = Tutorials::where('title', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);

            $users = User::where('name', 'LIKE', "%$tag%")->get();
            foreach ($users as $u){
                $user_search = Tutorials::where('user_id', '=', $u->id)->orderBy('id', 'desc')->paginate(10);
            }

            $tutorials->setPath('tutorial');
            if (isset($content_search)) { $content_search->setPath('tutorial'); }
            if (isset($title_search)) { $title_search->setPath('tutorial'); }
            if (isset($user_search)) { $user_search->setPath('tutorial'); }
            $view = view('tutorial.index')->with('tutorials', $tutorials)->with('content_search', $content_search)->with('title_search', $title_search)->with('user_search', $user_search);
        }

        $sections = $view->renderSections();
        return $sections['content'];
    }

    public function index()
    {

        $tutorials = Tutorials::orderBy('id', 'desc')->paginate(10);
        $tutorials->setPath('tutorial');
        return view('tutorial.index', ['tutorials' => $tutorials]);

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
        $tutorial->user_id = Auth::user()->id;
        $tutorial->title = $title;
        $tutorial->content = $request->content;
        $tutorial->tags = $tags;
        $tutorial->rate = 0;
        $tutorial->date = date("Y-m-d H:i:s");
        $tutorial->save();

        return redirect()->route('tutorial.index');
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
        $tutorial = Tutorials::findorfail($id);
        if (Auth::user()->id == $tutorial->user_id || Auth::user()->isAdmin()) {
            return view('tutorial.edit')->with('oldTutorial', $tutorial);
        } else {
            return $this->index();
        }

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
        $tags = str_replace(" ", "", $request["tags"]);
        $tags = mb_strtolower($tags);
        $title = mb_strtoupper($request["title"]);

        $tutorial = Tutorials::findorfail($id);

        $tutorial->title = $title;
        $tutorial->content = $request->content;
        $tutorial->tags = $tags;
        $tutorial->save();


        return redirect()->route('tutorial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tutorial = Tutorials::findorfail($id);

        $tutorial->delete();


        return redirect()->route('tutorial.index');
    }

}
