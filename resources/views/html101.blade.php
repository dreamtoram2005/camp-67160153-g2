@extends('template.default')

@section('content')
   <!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>แบบฟอร์มสมัครงาน</title>
    <link rel="stylesheet" href="style.css">
    
    <style>
        :root{
            --bg:#f3f6fb;
            --card:#ffffff;
            --accent:#4f46e5;
            --muted:#6b7280;
            --radius:14px;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        *{box-sizing:border-box}
        body{
            margin:0;
            display:flex;
            align-items:center;
            justify-content:center;
            background:linear-gradient(180deg,var(--bg),#e9f0ff);
            padding:32px;
            color:#111827;
        }

        .container{
            width:100%;
            max-width:650px; 
            background:var(--card);
            border-radius:var(--radius);
            box-shadow:0 10px 30px rgba(20,25,40,0.08);
            padding:40px;
        }

        h1{font-size:32px;margin:0 0 4px}
        p.lead{margin:0 0 30px;color:var(--muted);font-size:16px}

        form{
            display:flex;
            flex-direction: column;
            gap:24px;
        }

        label{display:block;font-size:14px;margin-bottom:8px;color:#111827; font-weight: 600;}
        .field{display:flex;flex-direction:column; position: relative;} /* ต้องมี position: relative */

        input[type=text], input[type=date], input[type=file], textarea, select{
            padding:12px 14px;
            border:1px solid #d1d5db;
            border-radius:8px;
            font-size:16px;
            transition: border-color 0.2s;
            width: 100%;
        }
        input:focus, textarea:focus, select:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 1px var(--accent);
        }

        textarea{min-height:70px;resize:vertical} 

        .gender-row{display:flex;gap:20px;align-items:center}
        
        .checkbox-grid{display:flex;flex-wrap:wrap;gap:12px}
        .checkbox-grid label{
            display:flex;
            gap:8px;
            align-items:center;
            background:#f8fafc;
            border:1px solid #eef2ff;
            padding:10px 14px;
            border-radius:8px;
            font-size:14px;
            cursor: pointer;
        }

        /* ใช้ CSS Grid จัดวางฟิลด์ในแถวเดียว (Name/Surname, DOB/Age) */
        .grid-row-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .controls{
            display:flex;
            gap:12px;
            justify-content:flex-end;
            margin-top:20px;
        }
        
        button{
            padding:12px 24px;
            border-radius:8px;
            border:0;
            font-weight:600;
            cursor:pointer;
            transition: opacity 0.2s, background 0.2s;
        }
        button:hover { opacity: 0.9; }

        button.save{background:var(--accent);color:white}
        button.reset{background:#fff;border:1px solid #d1d5db;color:#374151}

        .consent{display:flex;gap:10px;align-items:flex-start; margin-top: 10px;}
        .consent input[type="checkbox"] { margin-top: 4px; }
        
        /* สไตล์สำหรับ Error */
        .is-invalid {
            border-color: red !important;
            box-shadow: 0 0 0 1px red !important;
        }
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 4px;
            display: none; /* ซ่อนไว้ในตอนแรก */
        }
        /* สไตล์สำหรับ group radio/checkbox ที่ล้อมด้วยเส้นสีแดง */
        .group-invalid {
            border: 1px solid red;
            padding: 8px;
            border-radius: 8px;
        }


        @media(max-width:600px){
            .container { padding: 24px; }
            .controls{justify-content:stretch}
            .grid-row-2 {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>แบบฟอร์มสมัครงาน</h1>
        <p class="lead">โปรดกรอกข้อมูลส่วนตัวและรายละเอียดที่เกี่ยวข้องเพื่อใช้ในการสมัครงาน</p>

        <form action="/" method="post" enctype="multipart/form-data" novalidate id="job-application-form">
            @csrf

            {{-- ชื่อและนามสกุล --}}
            <div class="grid-row-2">
                <div class="field">
                    <label for="fname">ชื่อ *</label>
                    <input id="fname" name="first_name" type="text" placeholder="ชื่อจริงของคุณ" required>
                    <span id="fname-error" class="error-message">กรุณากรอกข้อมูล</span>
                </div>

                <div class="field">
                    <label for="lname">นามสกุล *</label>
                    <input id="lname" name="last_name" type="text" placeholder="นามสกุลของคุณ" required>
                    <span id="lname-error" class="error-message">กรุณากรอกข้อมูล</span>
                </div>
            </div>

            {{-- วันเกิดและอายุที่คำนวณอัตโนมัติ --}}
            <div class="grid-row-2">
                <div class="field">
                    <label for="dob">วันเดือนปีเกิด *</label>
                    <input id="dob" name="dob" type="date" required>
                    <span id="dob-error" class="error-message">กรุณาเลือกวันเดือนปีเกิด</span>
                </div>

                <div class="field">
                    <label for="age_display">อายุ (คำนวณอัตโนมัติ)</label>
                    <input id="age_display" type="text" readonly placeholder="จะแสดงอายุหลังเลือกวันเกิด">
                </div>
            </div>
            
            {{-- เพศ (Radio Group) --}}
            <div class="field">
                <label>เพศ *</label>
                <div class="gender-row" id="gender-group">
                    <label><input type="radio" name="gender" value="male"> ชาย</label>
                    <label><input type="radio" name="gender" value="female"> หญิง</label>
                </div>
                <span id="gender-error" class="error-message">กรุณาเลือกเพศ</span>
            </div>

            <div class="field">
                <label for="photo">รูปถ่าย (อัปโหลดภาพ) *</label>
                <input id="photo" name="photo" type="file" accept="image/*" required> 
                <span id="photo-error" class="error-message">กรุณาอัปโหลดไฟล์รูปภาพ</span>
            </div>

            <div class="field full">
                <label for="address">ที่อยู่ปัจจุบัน *</label>
                <textarea id="address" name="address" placeholder="บ้านเลขที่, ถนน, แขวง/ตำบล, เขต/อำเภอ, จังหวัด, รหัสไปรษณีย์" required></textarea>
                <span id="address-error" class="error-message">กรุณากรอกที่อยู่</span>
            </div>

            <div class="field">
                <label for="favcolor">สีที่ชอบ (เพื่ออ้างอิง) *</label>
                <select id="favcolor" name="favcolor" required>
                    <option value="" disabled selected>-- กรุณาเลือกสี --</option>
                    <option value="red">แดง</option>
                    <option value="blue">น้ำเงิน</option>
                    <option value="green">เขียว</option>
                    <option value="yellow">เหลือง</option>
                    <option value="purple">ม่วง</option>
                </select>
                <span id="favcolor-error" class="error-message">กรุณาเลือกสีที่ชอบ</span>
            </div>

            {{-- ทักษะ/แนวเพลง (Checkbox Group) --}}
            <div class="field">
                <label>ทักษะ/ความสนใจด้านดนตรี *</label>
                <div class="checkbox-grid" id="music-group">
                    <label><input type="checkbox" name="music[]" value="pop"> Pop</label>
                    <label><input type="checkbox" name="music[]" value="rock"> Rock</label>
                    <label><input type="checkbox" name="music[]" value="hiphop"> Hip-hop</label>
                    <label><input type="checkbox" name="music[]" value="jazz"> Jazz</label>
                    <label><input type="checkbox" name="music[]" value="country"> Country</label>
                    <label><input type="checkbox" name="music[]" value="classical"> Classical</label>
                </div>
                <span id="music-error" class="error-message">กรุณาเลือกแนวเพลงอย่างน้อย 1 อย่าง</span>
            </div>

            {{-- ยินยอม (Checkbox) --}}
            <div class="field full">
                <label class="consent" for="agree-check">
                    <input type="checkbox" name="agree" id="agree-check" required> 
                    ข้าพเจ้ายืนยันว่าข้อมูลข้างต้นเป็นความจริง และยินยอมให้เก็บข้อมูลส่วนบุคคล *
                </label>
                <span id="agree-error" class="error-message" style="margin-left: 20px;">กรุณายินยอมก่อนส่งใบสมัคร</span>
            </div>

            <div class="controls full">
                <button type="reset" class="reset">ล้างข้อมูล</button>
                <button type="submit" class="save">ส่งใบสมัคร</button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection

@push("scripts")
    <script>
        // ฟังก์ชันคำนวณอายุจากวันเกิด (Client-side Logic)
        const calculateAge = (dobString) => {
            if (!dobString) return 'โปรดเลือกวันเกิด';
            
            const today = new Date();
            const birthDate = new Date(dobString);
            if (isNaN(birthDate)) return 'วันเกิดไม่ถูกต้อง';

            let age = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age < 0 ? 'วันเกิดในอนาคต' : `${age} ปี`;
        };
        
        // ฟังก์ชันแสดง/ซ่อน Error Message
        const setError = (id, isError) => {
            const errorElement = document.getElementById(id);
            if (errorElement) {
                errorElement.style.display = isError ? 'block' : 'none';
            }
        };

        // ฟังก์ชันตรวจสอบฟิลด์ (Text, Date, Select, File)
        const validateField = (id) => {
            const field = document.getElementById(id);
            const errorId = `${id}-error`;
            
            if (!field || field.value.trim() === "") {
                field.classList.add("is-invalid");
                setError(errorId, true);
                return false;
            }
            field.classList.remove("is-invalid");
            setError(errorId, false);
            return true;
        };
        
        // ฟังก์ชันตรวจสอบ Radio Buttons (เพศ)
        const validateRadio = (name, groupId) => {
            const inputs = document.querySelectorAll(`input[name="${name}"]`);
            const isChecked = Array.from(inputs).some(input => input.checked);
            const groupDiv = document.getElementById(groupId);
            const errorId = `${name}-error`;
            
            if (!isChecked) {
                if (groupDiv) groupDiv.classList.add('group-invalid');
                setError(errorId, true);
                return false;
            }
            if (groupDiv) groupDiv.classList.remove('group-invalid');
            setError(errorId, false);
            return true;
        };

        // ฟังก์ชันตรวจสอบ Checkboxes (แนวเพลง)
        const validateMusicCheckboxes = (name, groupId) => {
            const inputs = document.querySelectorAll(`input[name="${name}[]"]:checked`);
            const isChecked = inputs.length > 0;
            const groupDiv = document.getElementById(groupId); 
            const errorId = `music-error`;

            if (!isChecked) {
                if (groupDiv) groupDiv.classList.add('group-invalid');
                setError(errorId, true);
                return false;
            }
            if (groupDiv) groupDiv.classList.remove('group-invalid');
            setError(errorId, false);
            return true;
        };

        // ฟังก์ชันหลักสำหรับตรวจสอบข้อมูลทั้งหมดเมื่อกด Submit
        const checkFullValidation = (event) => {
            event.preventDefault(); 
            let isValid = true;
            
            // ตรวจสอบฟิลด์ที่ต้องกรอกทั้งหมด
            isValid = validateField('fname') && isValid;
            isValid = validateField('lname') && isValid;
            isValid = validateField('dob') && isValid;
            isValid = validateField('photo') && isValid; 
            isValid = validateField('address') && isValid;
            isValid = validateField('favcolor') && isValid; 

            // ตรวจสอบ Radio/Checkbox กลุ่ม
            isValid = validateRadio('gender', 'gender-group') && isValid;
            isValid = validateMusicCheckboxes('music', 'music-group') && isValid;
            
            // ตรวจสอบ Checkbox ยินยอม
            const agreeCheck = document.getElementById('agree-check');
            const agreeErrorId = 'agree-error';
            if (!agreeCheck.checked) {
                isValid = false;
                setError(agreeErrorId, true);
            } else {
                setError(agreeErrorId, false);
            }

            // แสดงผลลัพธ์
            if (!isValid) {
                alert(`กรุณากรอกข้อมูลให้ครบถ้วนก่อนส่ง`);
                return false;
            }

            // เมื่อผ่าน Validation ทั้งหมด
            const dobInput = document.getElementById('dob');
            let ageInfo = dobInput.value ? `อายุที่คำนวณได้: ${calculateAge(dobInput.value)}` : 'อายุ: N/A';
            alert(`ข้อมูลผ่านการตรวจสอบ! ${ageInfo}`);
            
            // ถ้าผ่านทั้งหมด ให้ส่งฟอร์มจริง (event.target คือฟอร์ม)
            event.target.submit(); 
            return true;
        };

        // ฟังก์ชันสำหรับเรียกใช้เมื่อมีการเปลี่ยนแปลงที่ช่อง DOB (แสดงอายุแบบ Real-time)
        const updateAgeDisplay = () => {
            const dobInput = document.getElementById('dob');
            const ageDisplay = document.getElementById('age_display');
            if (dobInput && ageDisplay) {
                ageDisplay.value = calculateAge(dobInput.value);
            }
        };

        // ดักจับ Event 'submit' และ 'change' เมื่อโหลดหน้าเว็บเสร็จสมบูรณ์
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('job-application-form');
            if (form) {
                form.addEventListener('submit', checkFullValidation);
            }

            // เพิ่ม Event Listener สำหรับการเปลี่ยนแปลงวันเกิด
            const dobInput = document.getElementById('dob');
            if (dobInput) {
                dobInput.addEventListener('change', updateAgeDisplay);
                dobInput.addEventListener('input', updateAgeDisplay);
            }
        });
    </script>
@endpush