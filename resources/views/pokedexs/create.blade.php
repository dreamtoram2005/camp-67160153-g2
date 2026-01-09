@extends('template.default')

@section('content')
<style>
    .wide-card { border-radius: 25px; border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.05); }
    .nature-header { 
        background: linear-gradient(135deg, #556b2f 0%, #8fb935 100%); 
        color: white; padding: 40px; border: none;
    }
    .form-label-nature { font-weight: 700; color: #3e4d24; margin-bottom: 10px; }
    
    /* เน้นส่วน Image URL ให้ชัดเจน */
    .image-link-section {
        background-color: #f1f8f0;
        border: 2px dashed #8fb935;
        border-radius: 15px;
        padding: 30px;
    }
    .input-link-group .input-group-text {
        background-color: #556b2f;
        color: white;
        border: none;
        padding: 0 25px;
    }
    .input-link-group input {
        border: 2px solid #556b2f;
        padding: 15px;
        font-weight: bold;
    }
</style>

<div class="container-fluid px-5 animate__animated animate__fadeIn">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card wide-card overflow-hidden">
                <div class="card-header nature-header d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="fw-bold mb-0">🌿 Register New Pokemon</h2>
                        <p class="mb-0 opacity-75">เพิ่มข้อมูลสายพันธุ์ใหม่เข้าสู่สารานุกรม pokedexs</p>
                    </div>
                    <i class="bi bi-leaf fs-1"></i>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('pokedexs.store') }}" method="POST">
                        @csrf
                        
                        <div class="row g-5">
                            <div class="col-lg-8">
                                <h4 class="text-nature fw-bold mb-4 border-bottom pb-2">📂 ข้อมูลพื้นฐาน</h4>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label-nature">ชื่อโปเกมอน</label>
                                        <input type="text" name="name" class="form-control form-control-lg shadow-sm" placeholder="Bulbasaur" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label-nature">ประเภท (Type)</label>
                                        <input type="text" name="type" class="form-control form-control-lg shadow-sm" placeholder="Grass / Poison" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label-nature">สายพันธุ์ (Species)</label>
                                        <input type="text" name="species" class="form-control form-control-lg shadow-sm" required>
                                    </div>
                                </div>

                                <h4 class="text-nature fw-bold mt-5 mb-4 border-bottom pb-2">⚔️ Battle Stats</h4>
                                <div class="row g-3 text-center">
                                    <div class="col-md-4">
                                        <label class="small fw-bold text-danger">HP</label>
                                        <input type="number" name="hp" class="form-control form-control-lg text-center border-danger border-opacity-25">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small fw-bold text-warning">ATTACK</label>
                                        <input type="number" name="attack" class="form-control form-control-lg text-center border-warning border-opacity-25">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small fw-bold text-info">DEFENSE</label>
                                        <input type="number" name="defense" class="form-control form-control-lg text-center border-info border-opacity-25">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <h4 class="text-nature fw-bold mb-4 border-bottom pb-2">🖼️ Artwork & Size</h4>
                                
                                <div class="image-link-section mb-4">
                                    <label class="form-label-nature d-block text-center mb-3">ใส่ลิงก์รูปภาพที่นี่ (IMAGE URL)</label>
                                    <div class="input-group input-link-group shadow">
                                        <span class="input-group-text"><i class="bi bi-link-45deg fs-4"></i></span>
                                        <input type="text" name="image_url" class="form-control" placeholder="https://...">
                                    </div>
                                    <small class="text-muted d-block mt-3 text-center">คัดลอกลิงก์รูปภาพมาวางเพื่อให้แสดงผลบนตาราง</small>
                                </div>

                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label-nature">ส่วนสูง (m)</label>
                                        <input type="number" step="0.01" name="height" class="form-control form-control-lg text-center bg-light">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label-nature">น้ำหนัก (kg)</label>
                                        <input type="number" step="0.01" name="weight" class="form-control form-control-lg text-center bg-light">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pt-4 d-flex justify-content-end gap-3 border-top">
                            <a href="{{ route('pokedexs.index') }}" class="btn btn-light btn-lg px-5 rounded-pill border">ยกเลิก</a>
                            <button type="submit" class="btn btn-nature btn-lg px-5 shadow fw-bold">บันทึกข้อมูลโปเกมอน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection