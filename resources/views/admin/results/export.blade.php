<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        table { border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; font-size: 12px; }
        th, td { border: 1px solid #888; padding: 8px; color: #111827; }
        th { font-weight: bold; background: #ffffff; }
        .title { font-size: 18px; font-weight: bold; margin-bottom: 12px; }
    </style>
</head>
<body>
    <div class="title">Riwayat Nilai Siswa - EduTech Learning</div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tipe</th>
                <th>Modul</th>
                <th>Nilai</th>
                <th>Benar</th>
                <th>Total Soal</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse($results as $index => $r)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $r->user?->name ?? $r->student_name ?? '-' }}</td>
                    <td>{{ $r->user?->email ?? '-' }}</td>
                    <td>{{ ucfirst($r->type) }}</td>
                    <td>{{ $r->module?->title ?? 'Evaluasi Akhir' }}</td>
                    <td>{{ $r->score }}</td>
                    <td>{{ $r->correct_count }}</td>
                    <td>{{ $r->total_questions }}</td>
                    <td>{{ $r->created_at?->format('d M Y H:i') }}</td>
                </tr>
            @empty
                <tr><td colspan="9">Belum ada riwayat nilai.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
