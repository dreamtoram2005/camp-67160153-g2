<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon; // เพิ่มบรรทัดนี้เพื่อจัดการเรื่องวันที่

class FormController extends Controller
{
    public function showForm()
    {
        return view('html101');
    }

    public function handleSubmit(Request $request)
    {
        // 1. ตรวจสอบข้อมูล (Validation)
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required',
            'address' => 'required|string',
            'favcolor' => 'required',
            'music' => 'required|array|min:1',
            'agree' => 'accepted',
        ]);

        // 2. จัดการข้อมูลชื่อและเพศ
        $fullName = $request->input('first_name') . ' ' . $request->input('last_name');
        $gender = $request->input('gender') == 'male' ? 'ชาย' : 'หญิง';

        // 3. คำนวณอายุจากวันเกิด (Server-side calculation)
        $dob = $request->input('dob');
        $age = Carbon::parse($dob)->age;

        // 4. ดึงข้อมูลส่วนอื่นๆ
        $address = $request->input('address');
        $favColor = $request->input('favcolor');
        $musicInterests = $request->input('music');

        // 5. การจัดการไฟล์ภาพ (เก็บลงเครื่อง)
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
        }

        // 6. ส่งข้อมูลไปที่หน้า View
        return view('submission_success', [
            'fullName' => $fullName,
            'gender' => $gender,
            'dob' => $dob,
            'age' => $age,
            'address' => $address,
            'color' => $favColor,
            'music' => $musicInterests ?? [],
        ]);
    }
}
