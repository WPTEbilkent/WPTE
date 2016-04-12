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
    function changeVote()
    {
        $user_id = Auth::user()->id;
        $content_id = Input::get('content_id');
        $content = Input::get('content');
        $vote = Input::get('vote');

        if (!($vote == 1 || $vote == -1)) {
            return back();
        } else {
            $voteObject = Vote::where('user_id', $user_id)
                ->where('content_id', $content_id)
                ->where('content', $content)
                ->first();

            if ($voteObject) {
                $results[] = ['message' => "Daha önce oy verilmiş!", 'vote' => $voteObject->vote, 'div_id' => 'vote_' . $content . '_' . $content_id];
                return Response::json($results);
            } else {

                $votes = Vote::where('content_id', $content_id)->where('content', $content)->get(['vote']);

                if ($votes) {
                    $oldVote = 0;
                    foreach ($votes as $vote_t) {
                        $oldVote += $vote_t['vote'];
                    }
                } else {
                    $oldVote = 0;
                }

                $newVote = new Vote();
                $newVote->user_id = $user_id;
                $newVote->content_id = $content_id;
                $newVote->content = $content;
                $newVote->vote = $oldVote + $vote;
                $newVote->save();
                $results[] = ['message' => 0, 'vote' => $newVote->vote, 'div_id' => 'vote_' . $content . '_' . $content_id];

                return Response::json($results);
            }
        }
    }
}