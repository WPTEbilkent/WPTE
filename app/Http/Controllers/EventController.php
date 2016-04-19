<?php

namespace App\Http\Controllers;
//namespace Carbon\Carbon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events as Events;
use Auth;
use Redirect;

class EventController extends Controller
{
    public function searchTag($tag)
    {
        if ($tag == "null") {
            $view = EventController::index();
        } else {
            $events = Events::where('location', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);
            $header = Events::where('header', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);
            $source = Events::where('source', 'LIKE', "%$tag%")->orderBy('id', 'desc')->paginate(10);


            if ($events->isEmpty() && $header->isEmpty() && $source->isEmpty()) {
                $view = EventController::index();
            } else {
                $events->setPath('events');
                if (isset($header)) {
                    $header->setPath('events');
                }
                if (isset($source)) {
                    $source->setPath('events');
                }
                $view = view('EventGetter.index')->with('events', $events)->with('header', $header)->with('source', $source);
            }
        }

        // renders section in view and for ajax setting the related section(content).
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
        $events = Events::Where('status', '=', '1')->orderBy('id', 'desc')->paginate(10);
        $events->setPath('events');

        return view("EventGetter.index")->with('events', $events);
    }

    public function showEvents()
    {
        $newEvents = Events::where('status', '=', '0')->orderBy('insert_date')->paginate(10);
        $newEvents->setPath('events');

        return view("EventGetter.show")->with('newEvents', $newEvents);
    }

    public function editEvents($id)
    {
        if (Auth::guest()) {
            return Redirect::to('/auth/login');
        } else {
            if (Auth::user()->isAdmin()) {
                $oldEvent = Events::findOrFail($id);
                return view('EventGetter.edit')->with('oldEvent', $oldEvent);
            } else {
                return $this->index();
            }
        }
    }

//    public function update(Request $request, $id)
    public function update(Request $request, $id)
    {
        $field_array = ['header', 'type', 'url', 'date', 'time', 'country', 'city', 'location'];
        $event = Events::findorfail($id);
//        echo gettype($request);
        foreach($field_array as $field){
            $event->$field = $request[$field];
        }
        $event->status = 1;
        $event->update_date = Carbon::now();

        $event->save();

        return redirect()->route('events.index');
    }
}
