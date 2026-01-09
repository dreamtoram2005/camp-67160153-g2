@extends('template.default')

@section('content')
<style>
    /* สไตล์พิเศษเฉพาะหน้า Edit เพื่อความโดดเด่น */
    .edit-container {
        background: #1a1c2c; /* พื้นหลังน้ำเงินเข้ม */
        border-radius: 30px;
        padding: 40px;
        color: #fff;
        border: 2px solid #4a90e2;
        box-shadow: 0 0 20px rgba(74, 144, 226, 0.3);
    }
    .form-control-cyber {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid #4a90e2;
        color: #00d4ff !important;
        border-radius: 10px;
    }
    .form-control-cyber:focus {
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 10px #00d4ff;
    }
    .neon-text {
        color: #00d4ff;
        text-shadow: 0 0 10px #00d4ff;
        font-weight: bold;
    }
    .stat-label {
        font-size: 0.8rem;
        color: #888;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="edit-container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="neon-text mb-0">🛠️ EDIT POKEDEX DATA</h2>
                    <small class="text-muted">ID: #{{ $pokedex->id }} | กำลังปรับปรุงข้อมูลของ {{ $pokedex->name }}</small>
                </div>
                @if($pokedex->image_url)
                    <img src="{{ $pokedex->image_url }}" alt="preview" style="height: 80px; filter: drop-shadow(0 0 10px #00d4ff);">
                @endif
            </div>

            <form action="{{ route('pokedexs.update', $pokedex->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="row">
                    <div class="col-md-5">
                        <div class="mb-4">
                            <label class="stat-label">Pokemon Name</label>
                            <input type="text" class="form-control form-control-cyber" name="name" value="{{ old('name', $pokedex->name) }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="stat-label">Element Type</label>
                            <input type="text" class="form-control form-control-cyber" name="type" value="{{ old('type', $pokedex->type) }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="stat-label">Species Classification</label>
                            <input type="text" class="form-control form-control-cyber" name="species" value="{{ old('species', $pokedex->species) }}" required>
                        </div>
                    </div>

                    <div class="col-md-7 border-start border-secondary ps-md-5">
                        <p class="text-white-50 mb-3 small">BATTLE CAPABILITIES</p>
                        <div class="row g-3">
                            <div class="col-4">
                                <label class="stat-label">HP</label>
                                <input type="number" name="hp" class="form-control form-control-cyber text-center" value="{{ $pokedex->hp }}">
                            </div>
                            <div class="col-4">
                                <label class="stat-label">Attack</label>
                                <input type="number" name="attack" class="form-control form-control-cyber text-center" value="{{ $pokedex->attack }}">
                            </div>
                            <div class="col-4">
                                <label class="stat-label">Defense</label>
                                <input type="number" name="defense" class="form-control form-control-cyber text-center" value="{{ $pokedex->defense }}">
                            </div>
                            <div class="col-6 mt-4">
                                <label class="stat-label">Height (m)</label>
                                <input type="number" step="0.01" name="height" class="form-control form-control-cyber" value="{{ $pokedex->height }}">
                            </div>
                            <div class="col-6 mt-4">
                                <label class="stat-label">Weight (kg)</label>
                                <input type="number" step="0.01" name="weight" class="form-control form-control-cyber" value="{{ $pokedex->weight }}">
                            </div>
                        </div>
                        
                        <div class="mt-5">
                            <label class="stat-label">Visual Asset Link (URL)</label>
                            <input type="text" class="form-control form-control-cyber" name="image_url" value="{{ $pokedex->image_url }}">
                        </div>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-end gap-3">
                    <a href="{{ route('pokedexs.index') }}" class="btn btn-outline-secondary px-5 rounded-pill">Back to List</a>
                    <button type="submit" class="btn btn-primary px-5 rounded-pill shadow" style="background: #4a90e2;">Update Archive</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection