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
    public function index()
    {
        $tutorial = DB::table('tutorial')->paginate(10);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('Tutorial.show');
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
    public function pagingScroolLoader(){

    // get request params
    $last_id = $_POST['last_id'];
    $limit = 5; // default value
    if (isset($_POST['limit'])) {
        $limit = intval($_POST['limit']);
    }

    // select items for page params
    try {
        $sql = 'SELECT * FROM items WHERE id > :last_id ORDER BY id ASC LIMIT 0, :limit';
        $query = $pdo->prepare($sql);
        $query->bindParam(':last_id', $last_id, PDO::PARAM_INT);
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->execute();
        $list = $query->fetchAll();
    } catch (PDOException $e) {
        echo 'PDOException : '.  $e->getMessage();
    }

    $last_id = 0;
    foreach ($list as $rs) {
        $last_id = $rs['id'];
        echo '<li>';
        echo '<h2>'.$rs['title'].'</h2>';
        echo '<img src="'.$rs['photo'].'">';
        echo '<p>'.$rs['description'].'</p>';
        echo '</li>';
    }

    if ($last_id != 0) {
        echo '<script type="text/javascript">var last_id = '.$last_id.';</script>';
    }

    // sleep for 1 second to see loader, it must be deleted in prodection
    sleep(1);

    }
}
