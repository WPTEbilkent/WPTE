<?php
/**
 * Created by PhpStorm.
 * User: omer
 * Date: 6.4.2016
 * Time: 14:15
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Validator;
use Redirect;
use Session;
use URL;

class FileUploadController extends Controller
{
    //    public function index(){
    //        return view('upload');
    //
    //    }

    public function upload()
    {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required|mimes:jpeg,bmp,png',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to(URL::previous())->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads/img'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = hash('md5', Auth::user()->id . '_' . rand(11111, 99999)); // renameing image
                $fileName = $fileName . '.' . $extension;
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', ' Yükleme başarılı bir şekilde gerçekleşti. <br> URL: http://localhost:8000/uploads/img/' . $fileName);
                return Redirect::to(URL::previous());
            } else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::to(URL::previous());
            }
        }
    }
}
