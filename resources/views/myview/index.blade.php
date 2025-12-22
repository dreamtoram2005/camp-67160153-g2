@extends('template.default')
@section('title', 'My Controller')
@section('header1', "My View")

@section('content')
    <form action="#" method="POST">
        @csrf
        <label for="num">ป้อนข้อมูลแม่สูตรคูณ</label>
        <input type="number" id="num"
            class="form-control" name="num">
        <button class="btn btn-success"
            type="submit">ส่งข้อมูล</button>
    </form>
@endsection