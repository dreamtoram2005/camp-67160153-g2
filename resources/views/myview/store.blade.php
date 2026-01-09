@extends('template.default')

@section('title','ผลการกรอกข้อมูล')
@section('content')
    <div class="container-custom">
        <h1 class="mb-4">ข้อมูลที่กรอก</h1>
        <div class="row g-3">
            <div class="col-12 col-md-6">
                <strong>ชื่อ:</strong> {{ $first_name }}
            </div>
            <div class="col-12 col-md-6">
                <strong>สกุล:</strong> {{ $last_name }}
            </div>
            <div class="col-12 col-md-6">
                <strong>วันเดือนปีเกิด:</strong> {{ $dob }}
            </div>
            <div class="col-12 col-md-6">
                <strong>เพศ:</strong> {{ $gender }}
            </div>
            <div class="col-12">
                <strong>ที่อยู่:</strong> {{ $address }}
            </div>
            <div class="col-12 col-md-6">
                <strong>สีที่ชอบ:</strong> {{ $favcolor }}
            </div>
            <div class="col-12 col-md-6">
                <strong>แนวเพลงที่ชอบ:</strong>
                @if(is_array($music))
                    {{ implode(', ',$music ) }}
                @else
                    {{ $music }}
                @endif
            </div>
            @if($photo_path)
                <div class="col-12">
                    <strong>รูปภาพ:</strong> <br><img src="{{ asset('storage/' . $photo_path) }}" alt="Uploaded Photo" style="max-width: 200px;">
                </div>
            @endif
        </div>
        <div class="mt-4">
            <a href="/" class="btn btn-primary">กลับไปกรอกใหม่</a>
        </div>
    </div>
@endsection
