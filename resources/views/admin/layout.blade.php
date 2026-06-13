<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin EduTech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="app-shell">
        <aside class="admin-side">
            <div class="brand">
                <span class="brand-mark">
                    <i class="bi bi-cpu"></i>
                </span>

                <span>
                    EduTech Admin
                    <small>Panel Guru</small>
                </span>
            </div>

            @php
                $questionType = request('type');
                $menus = [
                    [
                        'group' => 'Utama',
                        'route' => 'admin.dashboard',
                        'label' => 'Dashboard',
                        'icon' => 'bi-speedometer2',
                        'active' => request()->routeIs('admin.dashboard'),
                    ],
                    [
                        'group' => 'Data',
                        'route' => 'admin.students.index',
                        'label' => 'Data Siswa',
                        'icon' => 'bi-people',
                        'active' => request()->routeIs('admin.students.*'),
                    ],
                    [
                        'group' => 'Data',
                        'route' => 'admin.modules.index',
                        'label' => 'Data Modul',
                        'icon' => 'bi-journal-text',
                        'active' => request()->routeIs('admin.modules.*'),
                    ],
                    [
                        'group' => 'Soal',
                        'route' => 'admin.questions.index',
                        'label' => 'Soal Latihan',
                        'icon' => 'bi-ui-checks',
                        'params' => ['type' => 'latihan'],
                        'active' => request()->routeIs('admin.questions.*') && $questionType === 'latihan',
                    ],
                    [
                        'group' => 'Soal',
                        'route' => 'admin.questions.index',
                        'label' => 'Soal Quiz',
                        'icon' => 'bi-patch-question',
                        'params' => ['type' => 'quiz'],
                        'active' => request()->routeIs('admin.questions.*') && $questionType === 'quiz',
                    ],
                    [
                        'group' => 'Soal',
                        'route' => 'admin.questions.index',
                        'label' => 'Soal Evaluasi',
                        'icon' => 'bi-clipboard-check',
                        'params' => ['type' => 'evaluasi'],
                        'active' => request()->routeIs('admin.questions.*') && $questionType === 'evaluasi',
                    ],
                    [
                        'group' => 'Laporan',
                        'route' => 'admin.results.index',
                        'label' => 'Data Nilai',
                        'icon' => 'bi-bar-chart',
                        'active' => request()->routeIs('admin.results.*'),
                    ],
                ];
                $lastGroup = null;
            @endphp

            <nav>
                @foreach ($menus as $menu)
                    @if ($lastGroup !== $menu['group'])
                        <div class="side-label">
                            {{ $menu['group'] }}
                        </div>

                        @php
                            $lastGroup = $menu['group'];
                        @endphp
                    @endif

                    <a
                        href="{{ route($menu['route'], $menu['params'] ?? []) }}"
                        class="{{ $menu['active'] ? 'active' : '' }}">
                        <i class="bi {{ $menu['icon'] }}"></i>
                        <span>{{ $menu['label'] }}</span>
                    </a>
                @endforeach

                <div class="side-label">
                    Akun
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="logout-btn" type="submit">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>
        <main class="admin-main">
            @if (session('success'))
                <div class="alert alert-success card-soft mb-3">
                    {{ session('success') }}
                </div>
            @endif
            @yield('admin')
        </main>
    </div>
</body>
</html>