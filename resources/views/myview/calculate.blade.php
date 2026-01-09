@extends('template.default')

@section('title','my view')
@section('content')
    <ul>
        <?php
           // $num = 2 ;
            for($i=1; $i<=12; $i++) {
            ?>
                <li>
                    {{ $number }} x {{ $i }} = {{ $number * $i }}
                </li>
            <?php } ?>
    </ul>
@endsection
