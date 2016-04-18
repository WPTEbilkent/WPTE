<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Events as Events;

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
        $events = Events::orderBy('id', 'desc')->paginate(10);
        $events->setPath('events');
        return view("EventGetter.index")->with('events',$events);
    }


}
