<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Input;
use Response;
use App\Vote as Vote;

class VoteController extends Controller
{
    function changeVote(){
        $user_id = Auth::user()->id;
        $content_id = Input::get('content_id');
        $content = Input::get('content');
        $vote = Input::get('vote');

        if(!($vote == 1 || $vote == -1)){
            return back();
        }
        else {
            $voteObject = Vote::where('user_id', $user_id)
                ->where('content_id', $content_id)
                ->where('content', $content)
                ->first();

            if ($voteObject) {
                $results[] = [ 'message' => "Kullanılmış Oy", 'vote' => $voteObject->vote ];
                return back();
            } else {
                $voteObject = Vote::where('content_id', $content_id)
                    ->where('content', $content)
                    ->first();
                if($voteObject){
                    $voteObject->vote += $vote;
                    $voteObject->save();
                    $results[] = [ 'message' => "", 'vote' => $voteObject->vote ];
                }
                else{
                    $newVote = new Vote();
                    $newVote->user_id = $user_id;
                    $newVote->content_id = $content_id;
                    $newVote->content = $content;
                    $newVote->vote = $vote;
                    $newVote->save();
                    $results[] = [ 'message' => "", 'vote' => $newVote->vote ];
                }
                return Response::json($results);


            }
        }
    }
}