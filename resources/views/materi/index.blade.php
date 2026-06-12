@extends('layouts.app')
@section('content')
<section class="section"><div class="container"><h2 class="fw-bold">Materi Pembelajaran</h2><p class="muted">7 sub bab belajar dasar komputer. Selesaikan latihan 5 soal agar materi berikutnya terbuka.</p><div class="row g-4">
@foreach($modules as $module)
@php $locked = $loop->index > 0 && empty($progress[$modules[$loop->index-1]->id]); $done = !empty($progress[$module->id]); @endphp
<div class="col-md-6 col-xl-4"><div class="card-soft p-4 h-100"><div class="d-flex gap-3"><div class="icon-box"><i class="bi {{ $module->image ?: 'bi-cpu' }}"></i></div><div><h5 class="fw-bold">{{ $module->title }}</h5><p class="small muted">{{ $module->summary }}</p><span class="badge {{ $done?'status-done':($locked?'status-lock':'status-open') }} mb-3">{{ $done?'Selesai':($locked?'Terkunci':'Terbuka') }}</span><br>@if($locked)<button class="btn btn-soft btn-sm" disabled>Pelajari Materi</button>@else<a href="{{ route('materi.show',$module) }}" class="btn btn-main btn-sm">Pelajari Materi</a>@endif</div></div></div></div>
@endforeach
</div></div></section>
@endsection
