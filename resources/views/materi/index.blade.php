@extends('layouts.app')

@section('content')
<section class="hero text-center py-5 bg-primary text-white">
    <div class="container py-4">
        <h1 class="fw-bold display-4 text-white">Materi Pembelajaran</h1>
        <p class="lead text-white-50">Selesaikan latihan tiap modul agar modul berikutnya terbuka.</p>
    </div>
</section>

<section class="section py-5 bg-light">
    <div class="container">
        <div class="row g-4 justify-content-center">

            @foreach($modules as $i => $m)
                @php 
                    $prev = $i > 0 ? $modules[$i - 1] : null; 
                    $locked = $prev && !($progress[$prev->id] ?? false); 
                @endphp

                <div class="col-md-4">
                    <div class="card-soft p-4 h-100 shadow-sm border-0 rounded-4 bg-white d-flex flex-column justify-content-between custom-card-hover {{ $locked ? 'opacity-75' : '' }}">
                        <div>
                            <div class="display-4 mb-2">{{ $m->image }}</div>
                            
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1.5 rounded-pill small fw-semibold">
                                Modul {{ $m->order }}
                            </span>
                            
                            <h4 class="fw-bold text-dark mt-3 mb-2">{{ $m->title }}</h4>
                            <p class="text-muted small mb-4 lh-base">{{ $m->summary }}</p>
                        </div>

                        <div>
                            @if($locked)
                                <button class="btn btn-secondary w-100 rounded-3 py-2 fw-semibold" disabled>🔒 Terkunci</button>
                                <small class="text-danger d-block mt-2 text-center small">Selesaikan latihan {{ $prev->title }} dulu.</small>
                            @else
                                <a href="{{ route('materi.show', $m) }}" class="btn btn-primary w-100 rounded-3 py-2 fw-semibold">Baca Materi</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

<style>
    .rounded-4 { border-radius: 1rem !important; }
    
    .custom-card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .custom-card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }
</style>
@endsection