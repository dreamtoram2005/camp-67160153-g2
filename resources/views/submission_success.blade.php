@extends('template.default') 

@section('content')
    <div style="max-width: 600px; margin: 50px auto; padding: 30px; border: 1px solid #ccc; border-radius: 8px;">
        <h2>ข้อมูลถูกส่งสำเร็จแล้ว!</h2>
        <p>ขอบคุณคุณ <strong>{{ $fullName }}</strong> สำหรับการสมัครงาน</p>

        <h3>รายละเอียดที่ได้รับ:</h3>
        <ul>
            <li>**ที่อยู่:** {{ $address }}</li>
            <li>**สีที่ชอบ:** {{ $color }}</li>
            <li>**ความสนใจด้านดนตรี:**
                @if (empty($music))
                    ไม่มี
                @else
                    {{ implode(', ', $music) }}
                @endif
            </li>
        </ul>
        <a href="/">กลับสู่หน้าฟอร์ม</a>
    </div>
@endsection