@extends('template.default')

@section('content')
<style>
    .success-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        background-color: #f3f6fb;
        padding: 20px;
    }
    .success-card {
        width: 100%;
        max-width: 600px;
        background: white;
        padding: 40px;
        border-radius: 14px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        font-family: sans-serif;
    }
    .status-title { font-size: 28px; margin-bottom: 5px; color: #111827; }
    .status-sub { color: #6b7280; margin-bottom: 25px; }
    .detail-list { list-style: none; padding: 0; line-height: 2; }
    .color-dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: 1px solid #ddd;
        margin-right: 5px;
        /* ใช้ CSS Variable รับค่าจาก Blade */
        background-color: var(--chosen-color);
    }
    .back-link {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }
    .back-link a { text-decoration: none; color: #4f46e5; font-weight: 600; }
</style>

<div class="success-container">
    <div class="success-card">
        <h1 class="status-title">ข้อมูลถูกส่งสำเร็จแล้ว!</h1>
        <p class="status-sub">บันทึกข้อมูลดังนี้</p>

        <h3 style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 20px;">รายละเอียดที่ได้รับ:</h3>
        
        <ul class="detail-list">
            <li><strong>ชื่อ-นามสกุล:</strong> {{ $fullName }}</li>
            <li><strong>เพศ:</strong> {{ $gender }}</li>
            <li><strong>วันเกิด:</strong> {{ date('d/m/Y', strtotime($dob)) }}</li>
            <li><strong>อายุ:</strong> {{ $age }} ปี</li>
            <li><strong>ที่อยู่:</strong> {{ $address }}</li>
            <li>
                <strong>สีที่ชอบ:</strong> 
                <span class="color-dot" style="--chosen-color: {{ $color }};"></span>
                {{ ucfirst($color) }}
            </li>
            <li>
                <strong>ทักษะ/ความสนใจด้านดนตรี:</strong> 
                {{ implode(', ', array_map('ucfirst', $music)) }}
            </li>
        </ul>

        <div class="back-link">
            <a href="{{ url('/') }}">
                ← กลับสู่หน้าฟอร์ม
            </a>
        </div>
    </div>
</div>
@endsection