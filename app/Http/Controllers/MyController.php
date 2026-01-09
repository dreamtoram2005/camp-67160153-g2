<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
   private $myvalue;
   protected $myvalue2;
   public $myval = '';

   function index() {
       return view('html');
   }
   function store_index(Request $req) {
       $photoPath = null;
        if ($req->hasFile('photo')) {
            $photoPath = $req->file('photo')->store('photos', 'public');
        }
        $data = [
            'first_name' => $req->input('first_name'),
            'last_name' => $req->input('last_name'),
            'dob' => $req->input('dob'),
            'gender' => $req->input('gender'),
            'address' => $req->input('address'),
            'favcolor' => $req->input('favcolor'),
            'music' => $req->input('music', []), 
            'photo_path' => $photoPath,
        ];
        return view('myview.store', $data);
   }

   function info(Request $req) {
        return view('myview.info');
    }
    function calculate(Request $req) {
        echo $req->input("mynumber");
        $data['number'] = $req->input("mynumber");
        return view('myview.calculate', $data);
    }


}