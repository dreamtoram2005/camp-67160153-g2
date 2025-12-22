<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// php artisan make:controller MyController
class MyController extends Controller
{
    function __construct(){
        //
    }
    function index(){
        // echo $_GET['num'];
        return $this->MYfunCTION();
    }
    function myfunction(){
        return view('myview.index');
    }
    function process(Request $request){
        // echo $_POST['num'];
        $data['mynum']= $request->input('num');
        return view('myview.process', $data);
    }
}