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
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; /* ปรับ Font ให้ดูเป็นทางการขึ้น */
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
            padding:40px; /* เพิ่ม Padding เพื่อความหรูหรา */
        }

        h1{font-size:32px;margin:0 0 4px} /* ปรับขนาดหัวข้อ */
        p.lead{margin:0 0 30px;color:var(--muted);font-size:16px} /* ปรับขนาดคำอธิบาย */

        form{
            display:flex;
            flex-direction: column;
            gap:24px; /* เพิ่มระยะห่างระหว่างกลุ่มฟิลด์ */
        }

        label{display:block;font-size:14px;margin-bottom:8px;color:#111827; font-weight: 600;} /* เน้น Label */
        .field{display:flex;flex-direction:column}

        input[type=text], input[type=date], input[type=file], textarea, select{
            padding:12px 14px; /* เพิ่ม Padding ใน Input */
            border:1px solid #d1d5db; /* ปรับสี Border ให้ดูนุ่มนวลขึ้น */
            border-radius:8px; /* ปรับ Corner Radius */
            font-size:16px;
            transition: border-color 0.2s;
        }
        input:focus, textarea:focus, select:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 0 1px var(--accent);
        }

        /* ปรับลดความสูงของกล่องข้อความ */
        textarea{min-height:70px;resize:vertical} 

        .gender-row{display:flex;gap:20px;align-items:center}
        
        .checkbox-grid{display:flex;flex-wrap:wrap;gap:12px} /* เพิ่มระยะห่าง Checkbox */
        .checkbox-grid label{
            display:flex;
            gap:8px;
            align-items:center;
            background:#f8fafc;
            border:1px solid #eef2ff;
            padding:10px 14px; /* เพิ่ม Padding Checkbox Label */
            border-radius:8px;
            font-size:14px;
            cursor: pointer;
        }

        .controls{
            display:flex;
            gap:12px; /* เพิ่มระยะห่างปุ่ม */
            justify-content:flex-end;
            margin-top:20px; /* เพิ่ม Margin ด้านบน */
        }
        
        button{
            padding:12px 24px; /* เพิ่ม Padding ปุ่ม */
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

        @media(max-width:760px){
            .container { padding: 24px; }
            .controls{justify-content:stretch}
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>แบบฟอร์มสมัครงาน</h1>
        <p class="lead">โปรดกรอกข้อมูลส่วนตัวและรายละเอียดที่เกี่ยวข้องเพื่อใช้ในการสมัครงาน</p>

        <form action="#" method="post" enctype="multipart/form-data" novalidate>
            <div class="field">
                <label for="fname">ชื่อ *</label>
                <input id="fname" name="first_name" type="text" placeholder="ชื่อจริงของคุณ" required>
            </div>

            <div class="field">
                <label for="lname">นามสกุล *</label>
                <input id="lname" name="last_name" type="text" placeholder="นามสกุลของคุณ" required>
            </div>

            <div class="field">
                <label for="dob">วันเดือนปีเกิด</label>
                <input id="dob" name="dob" type="date">
            </div>

            <div class="field">
                <label>เพศ</label>
                <div class="gender-row">
                    <label><input type="radio" name="gender" value="male"> ชาย</label>
                    <label><input type="radio" name="gender" value="female"> หญิง</label>
                </div>
            </div>

            <div class="field">
                <label for="photo">รูปถ่าย (อัปโหลดภาพ)</label>
                <input id="photo" name="photo" type="file" accept="image/*">
            </div>

            <div class="field full">
                <label for="address">ที่อยู่ปัจจุบัน</label>
                <textarea id="address" name="address" placeholder="บ้านเลขที่, ถนน, แขวง/ตำบล, เขต/อำเภอ, จังหวัด, รหัสไปรษณีย์"></textarea>
            </div>

            <div class="field">
                <label for="favcolor">สีที่ชอบ (เพื่ออ้างอิง)</label>
                <select id="favcolor" name="favcolor">
                    <option value="" disabled selected>-- กรุณาเลือกสี --</option>
                    <option value="red">แดง</option>
                    <option value="blue">น้ำเงิน</option>
                    <option value="green">เขียว</option>
                    <option value="yellow">เหลือง</option>
                    <option value="purple">ม่วง</option>
                </select>
            </div>

            <div class="field">
                <label>ทักษะ/ความสนใจด้านดนตรี</label>
                <div class="checkbox-grid">
                    <label><input type="checkbox" name="music" value="pop"> Pop</label>
                    <label><input type="checkbox" name="music" value="rock"> Rock</label>
                    <label><input type="checkbox" name="music" value="hiphop"> Hip-hop</label>
                    <label><input type="checkbox" name="music" value="jazz"> Jazz</label>
                    <label><input type="checkbox" name="music" value="country"> Country</label>
                    <label><input type="checkbox" name="music" value="classical"> Classical</label>
                </div>
            </div>

            <div class="field full">
                <label class="consent">
                    <input type="checkbox" name="agree" required> 
                    ข้าพเจ้ายืนยันว่าข้อมูลข้างต้นเป็นความจริง และยินยอมให้เก็บข้อมูลส่วนบุคคล
                </label>
            </div>

            <div class="controls full">
                <button type="reset" class="reset">ล้างข้อมูล</button>
                <button type="submit" class="save">ส่งใบสมัคร</button>
            </div>
        </form>
    </div>
</body>
</html>