@extends('layouts.app')
@section('content')
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="chip mb-3"><i class="bi bi-trophy"></i> Leaderboard</span>
            <h2 class="fw-bold mb-2">Peringkat Belajar Siswa</h2>
            <p class="muted mb-0">Peringkat siswa berdasarkan nilai quiz, progress belajar, total poin, dan badge pencapaian.</p>
        </div>

        <div class="card-soft p-3 p-md-4">
            <div class="table-responsive">
                <table class="table table-soft align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Quiz</th>
                            <th>Progress</th>
                            <th>Poin</th>
                            <th>Badge</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $r)
                            <tr>
                                <td><b>#{{ $loop->iteration }}</b></td>
                                <td><b class="text-dark">{{ $r['name'] }}</b></td>
                                <td>{{ $r['class'] }}</td>
                                <td>{{ $r['quiz'] }}</td>
                                <td>{{ $r['progress'] }}%</td>
                                <td>{{ $r['points'] }}</td>
                                <td><span class="chip">{{ $r['badge'] }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
