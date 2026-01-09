@extends('template.default')

@section('content')
<style>
    /* ปรับพื้นหลังและการ์ดให้ดูมีมิติ */
    .pokedex-table-card {
        border-radius: 25px;
        border: none;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    }
    .table thead th {
        background-color: #f8f9fa;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        color: #6c757d;
        border-bottom: 2px solid #eee;
    }
    /* สี Badge แยกตามค่าพลัง */
    .stat-badge-hp { background-color: #ff4757; color: white; border-radius: 8px; padding: 5px 10px; }
    .stat-badge-atk { background-color: #ffa502; color: white; border-radius: 8px; padding: 5px 10px; }
    .stat-badge-def { background-color: #2e86de; color: white; border-radius: 8px; padding: 5px 10px; }
    
    .type-pill {
        background: linear-gradient(45deg, #1e3799, #00d2ff);
        color: white;
        border-radius: 50px;
        padding: 4px 15px;
        font-size: 0.85rem;
        box-shadow: 0 4px 10px rgba(0,210,255,0.3);
    }
    .pokemon-avatar {
        width: 60px;
        height: 60px;
        object-fit: contain;
        background: #f1f2f6;
        border-radius: 15px;
        padding: 5px;
        transition: 0.3s;
    }
    .pokemon-row:hover .pokemon-avatar {
        transform: scale(1.1) rotate(5deg);
        background: #e1e2e6;
    }
    .btn-edit { color: #ffa502; border: 2px solid #ffa502; border-radius: 10px; font-weight: bold; }
    .btn-edit:hover { background: #ffa502; color: white; }
    .btn-delete { color: #ff4757; border: 2px solid #ff4757; border-radius: 10px; font-weight: bold; }
    .btn-delete:hover { background: #ff4757; color: white; }
</style>

<div class="container-fluid animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-5 bg-white p-4 shadow-sm" style="border-radius: 20px;">
        <div>
            <h2 class="fw-bold mb-0 text-dark"><i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i> POKEDEX MASTER DATABASE</h2>
            <p class="text-muted mb-0">ระบบจัดการข้อมูลและค่าสถิติโปเกมอนอย่างเป็นทางการ</p>
        </div>
        <a href="{{ route('pokedexs.create') }}" class="btn btn-dark btn-lg rounded-pill shadow-lg px-4">
            <i class="bi bi-plus-circle-fill me-2"></i> REGISTER NEW
        </a>
    </div>

    <div class="card pokedex-table-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr class="text-center">
                        <th class="ps-4 text-start">Identity</th>
                        <th>Type & Species</th>
                        <th>Battle Stats (HP / ATK / DEF)</th>
                        <th>Measurement</th>
                        <th class="pe-4">Management</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pokedexs as $pokedex)
                    <tr class="pokemon-row text-center">
                        <td class="ps-4 text-start">
                            <div class="d-flex align-items-center">
                                <span class="me-3 fw-black text-dark fs-4" style="letter-spacing: -1px;">
                                    #{{ sprintf('%03d', $pokedex->id) }}
                                </span>
                                    <img src="{{ $pokedex->image_url ?? 'https://via.placeholder.com/100' }}" class="pokemon-avatar me-3 shadow-sm">
                                <div>
                                    <h5 class="mb-0 fw-bold text-dark">{{ $pokedex->name }}</h5>
                                    <small class="text-success fw-bold text-uppercase">Lv. 100</small>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="mb-1"><span class="type-pill">{{ $pokedex->type }}</span></div>
                            <small class="text-muted">{{ $pokedex->species }}</small>
                        </td>

                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <div class="stat-badge-hp shadow-sm">
                                    <small class="d-block small-label" style="font-size: 0.6rem;">HP</small>
                                    {{ $pokedex->hp ?? 0 }}
                                </div>
                                <div class="stat-badge-atk shadow-sm">
                                    <small class="d-block small-label" style="font-size: 0.6rem;">ATK</small>
                                    {{ $pokedex->attack ?? 0 }}
                                </div>
                                <div class="stat-badge-def shadow-sm">
                                    <small class="d-block small-label" style="font-size: 0.6rem;">DEF</small>
                                    {{ $pokedex->defense ?? 0 }}
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="badge bg-light text-dark border p-2 w-75">
                                <span class="d-block"><i class="bi bi-arrows-vertical text-secondary"></i> {{ $pokedex->height ?? '0' }} m</span>
                                <span class="d-block"><i class="bi bi-speedometer2 text-secondary"></i> {{ $pokedex->weight ?? '0' }} kg</span>
                            </div>
                        </td>

                        <td class="pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('pokedexs.edit', $pokedex->id) }}" class="btn btn-edit btn-sm px-3">
                                    <i class="bi bi-pencil-square"></i> EDIT
                                </a>
                                <form action="{{ route('pokedexs.destroy', $pokedex->id) }}" method="POST" onsubmit="return confirm('⚠️ ยืนยันการลบข้อมูลนี้?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-sm px-3">
                                        <i class="bi bi-trash3-fill"></i> DELETE
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <h4 class="text-muted">ไม่พบข้อมูลในระบบ</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection