<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 5.4.2016
 * Time: 12:50
 */
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

class TagController extends Controller
{
    public function autocomplete(){
        $term = Input::get('term');

        $results = array();

        $queries = DB::table('tags')
            ->where('name', 'LIKE', '%'.$term.'%')
            ->orderBy('count', 'desc')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'name' => $query->name ];
        }
        return Response::json($results);
    }
}