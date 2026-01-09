@extends('template.default')

@section('header','ตารางแม่สูตรคูณ')
@section('content')
    <form action="/calculate" method="post">
        @csrf
        <?php  // ? $_GET['mynumber']; ?>
        <input class="from-control" type="number" name="mynumber">
        <br>
        <button class="btn btn-success" type="submit">บันทึก</button>
    </form>
@endsection
