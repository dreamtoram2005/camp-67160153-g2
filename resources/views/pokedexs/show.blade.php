@extends('template.default')

@section('content')
<div class="container-custom">
    <div class="row mb-4">
        <div class="col-md-12">
            <h1>{{ $pokedex->name }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Name:</strong></div>
                        <div class="col-md-8">{{ $pokedex->name }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Type:</strong></div>
                        <div class="col-md-8">{{ $pokedex->type }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Species:</strong></div>
                        <div class="col-md-8">{{ $pokedex->species }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Height:</strong></div>
                        <div class="col-md-8">{{ $pokedex->height }} cm</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Weight:</strong></div>
                        <div class="col-md-8">{{ $pokedex->weight }} kg</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>HP:</strong></div>
                        <div class="col-md-8">{{ $pokedex->hp }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Attack:</strong></div>
                        <div class="col-md-8">{{ $pokedex->attack }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Defense:</strong></div>
                        <div class="col-md-8">{{ $pokedex->defense }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Image URL:</strong></div>
                        <div class="col-md-8">
                            @if($pokedex->image_url)
                                {{ $pokedex->image_url }}<br>
                                <img src="{{ $pokedex->image_url }}" alt="{{ $pokedex->name }}" style="width: 200px; height: 200px; margin-top: 10px;">
                            @else
                                N/A
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Created:</strong></div>
                        <div class="col-md-8">{{ $pokedex->created_at }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4"><strong>Updated:</strong></div>
                        <div class="col-md-8">{{ $pokedex->updated_at }}</div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('pokedexs.edit', $pokedex->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('pokedexs.destroy', $pokedex->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
                <a href="{{ route('pokedexs.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
