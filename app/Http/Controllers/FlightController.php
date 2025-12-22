<?php

namespace App\Http\Controllers;

use finfo;
use Illuminate\Http\Request;
use App\Models\Flight;

class FlightController extends Controller
{
    //

    private function insert_db(){
        echo "Controller";
        $flight = new Flight;
        $flight -> name = "Test Insert Flight";
        $flight -> airline = "TestAirline";
        $flight -> number_of_planes = 10;
        $flight -> price_of_ticket = 50.5;
        $flight -> save();
    }
    private function update_db(){
        $flight = Flight::find(1);
        $flight -> name = "Test Update Flight";
        $flight -> save();
    }

    private function delete_db(){
        $flights = Flight::find(1);
        $flights -> delete();
    }
    function index(){
        return view('flight.index');
    }
}
