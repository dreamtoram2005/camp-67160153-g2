@extends('template.default')

@section('title','my view')
@section('content')
    <h1>This is my view page</h1>
    <?php
        echo "My View content";

    ?>
    <br>
    <?php
        $myval = "HELLO PHP";
        echo $myval;
    ?>
    <br>
    <?php
        $myval = 1;
        echo 'myval = '.$myval ;
    ?>
    <br>
    <?php
        #การสร้าง array
        $myarry = array(1,2,3,4);
        $myarry2 = [1,2,3,4];
        echo 'MyArray = '.$myarry[0];
        echo '<br>';
        echo 'MyArray2 = '.$myarry2[1];
        echo '<br>';
        print_r($myarry);
        echo '<br>';
        print_r($myarry2);
        echo '<br>';
    ?>
    <?php
        $myarray4 = [
            'name' => 'John',
            'age' => 30,
            'city' => 'New York',0,1

        ];
        print_r($myarray4);
        foreach ($myarray4 as $key => $value) {
            echo "<br>Key: ".$key . "value: ".$value;
        }
       foreach ($myarray4 as $key => $value) {
            echo "<br>Value: ".$value;
        }
        $myval = "A";
        for ($i=0; $i < 10; $i++) {
            echo $myval++;
            echo "<br>";
        }
        function myfunction() {
            return "MyFunction called";
        }
        echo myfunction();
        echo "<br>";

        $a = 10;
        if ($a < 10) {
            echo "A < 10";
        }
        else if ($a == 10) {
            echo "A = 10";
        }
        else if ($a > 10) {
            echo "A > 10";
        }
    ?>
@endsection
