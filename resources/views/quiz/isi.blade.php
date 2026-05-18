<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ujian Kuis Teori: {{ $category }} - EduGame</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { 
            font-family: 'Poppins', sans-serif; 
        }
        body { 
            background-color: #f4f6f9; 
        }
        /* Style penyesuaian Navbar terdahulu */
        .navbar-custom {
            background-color: #4f46e5;
            padding: 15px 0;
        }
        .navbar-custom .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 24px;
        }
        .navbar-custom .nav-link {
            color: white !important;
            opacity: 0.9;
            font-size: 16px;
        }
        .navbar-custom .nav-link:hover {
            opacity: 1;
        }
        .quiz-header { 
            background: linear-gradient(135deg, #4f46e5, #6366f1); 
            color: white; 
            padding: 40px 0; 
            border-radius: 0 0 24px 24px; 
        }
        .question-card { 
            background: white; 
            border: none; 
            border-radius: 16px; 
            box-shadow: 0 4px 12px rgba(0,0,0,0.03); 
            padding: 24px; 
            margin-bottom: 25px; 
        }
        .option-container { 
            display: flex; 
            flex-direction: column; 
            gap: 12px; 
            margin-top: 15px; 
        }
        .option-box { 
            display: flex; 
            align-items: center; 
            padding: 14px 20px; 
            background: #f8fafc; 
            border: 2px solid #e2e8f0; 
            border-radius: 12px; 
            cursor: pointer; 
            transition: 0.2s; 
        }
        .option-box:hover { 
            background: #f1f5f9; 
            border-color: #cbd5e1; 
        }
        .option-box input[type="radio"] { 
            margin-right: 15px; 
            width: 18px; 
            height: 18px; 
            accent-color: #4f46e5; 
        }
        .quiz-step {
            display: none;
        }
        .quiz-step.active {
            display: block;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">EduGame</a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/materi') }}">Materi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="quiz-header text-center mb-5">
        <div class="container">
            <span class="badge bg-white text-primary fw-bold px-3 py-2 mb-2 text-uppercase">Mode Teori</span>
            <h2 class="fw-bold m-0">Lembar Kuis {{ $category }}</h2>
            <p class="opacity-75 m-0 mt-1">Jawablah pertanyaan pilihan ganda di bawah ini dengan saksama!</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <form action="{{ url('/quiz/submit') }}" method="POST" id="quizForm">
                    @csrf
                    <input type="hidden" name="category" value="{{ $category }}">

                    @if(isset($questions) && $questions->count() > 0)
                        @foreach($questions as $index => $q)
                            <div class="quiz-step {{ $index === 0 ? 'active' : '' }}" data-step="{{ $index }}">
                                <div class="card question-card">
                                    <h5 class="fw-bold text-dark mb-1">Soal {{ $index + 1 }} dari {{ $questions->count() }}</h5>
                                    <p class="text-secondary">{{ $q->question_text ?? $q->soal }}</p>
                                    
                                    <div class="option-container">
                                        <label class="option-box">
                                            <input type="radio" name="answers[{{ $q->id }}]" value="A" required>
                                            <span><b>A.</b> {{ $q->option_a ?? $q->a }}</span>
                                        </label>
                                        <label class="option-box">
                                            <input type="radio" name="answers[{{ $q->id }}]" value="B">
                                            <span><b>B.</b> {{ $q->option_b ?? $q->b }}</span>
                                        </label>
                                        <label class="option-box">
                                            <input type="radio" name="answers[{{ $q->id }}]" value="C">
                                            <span><b>C.</b> {{ $q->option_c ?? $q->c }}</span>
                                        </label>
                                        <label class="option-box">
                                            <input type="radio" name="answers[{{ $q->id }}]" value="D">
                                            <span><b>D.</b> {{ $q->option_d ?? $q->d }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @for($i = 0; $i < 3; $i++)
                            <div class="quiz-step {{ $i === 0 ? 'active' : '' }}" data-step="{{ $i }}">
                                <div class="card question-card">
                                    <h5 class="fw-bold text-dark mb-1">Soal {{ $i + 1 }} dari 3</h5>
                                    <p class="text-secondary">Berikut ini yang termasuk ke dalam cakupan materi dasar "{{ $category }}" (Pertanyaan Ke-{{ $i + 1 }}) adalah...</p>
                                    
                                    <div class="option-container">
                                        <label class="option-box">
                                            <input type="radio" name="answers[default_{{ $i }}]" value="A" required>
                                            <span><b>A.</b> Komponen atau bagian operasional utama sistem komputer</span>
                                        </label>
                                        <label class="option-box">
                                            <input type="radio" name="answers[default_{{ $i }}]" value="B">
                                            <span><b>B.</b> Bahasa pemrograman tingkat tinggi versi komersial</span>
                                        </label>
                                        <label class="option-box">
                                            <input type="radio" name="answers[default_{{ $i }}]" value="C">
                                            <span><b>C.</b> Desain arsitektur fisik gedung perkantoran modern</span>
                                        </label>
                                        <label class="option-box">
                                            <input type="radio" name="answers[default_{{ $i }}]" value="D">
                                            <span><b>D.</b> Skema manajemen pemasaran produk digital global</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    @endif

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <button type="button" class="btn btn-outline-secondary px-4 py-2.5 rounded-3 fw-bold d-none" id="btnPrev" onclick="navigateStep(-1)">Sebelumnya</button>
                            <a href="{{ url('/quiz') }}" class="btn btn-outline-danger px-4 py-2.5 rounded-3 fw-bold" id="btnCancel">Batal</a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary px-5 py-2.5 rounded-3 fw-bold shadow" id="btnNext" onclick="navigateStep(1)">Selanjutnya</button>
                            <button type="submit" class="btn btn-success px-5 py-2.5 rounded-3 fw-bold shadow d-none" id="btnSubmit">Kirim Hasil Kuis</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentStep = 0;
        const steps = document.querySelectorAll('.quiz-step');
        const btnPrev = document.getElementById('btnPrev');
        const btnCancel = document.getElementById('btnCancel');
        const btnNext = document.getElementById('btnNext');
        const btnSubmit = document.getElementById('btnSubmit');

        function navigateStep(direction) {
            if (direction === 1) {
                const currentActiveCard = steps[currentStep];
                const inputs = currentActiveCard.querySelectorAll('input[type="radio"]');
                let isChecked = false;
                
                inputs.forEach(input => {
                    if (input.checked) isChecked = true;
                });

                if (!isChecked) {
                    alert('Silakan pilih salah satu jawaban terlebih dahulu sebelum melanjutkan!');
                    return;
                }
            }

            steps[currentStep].classList.remove('active');
            currentStep += direction;
            steps[currentStep].classList.add('active');

            if (currentStep === 0) {
                btnPrev.classList.add('d-none');
                btnCancel.classList.remove('d-none');
            } else {
                btnCancel.classList.add('d-none');
                btnPrev.classList.remove('d-none');
            }

            if (currentStep === steps.length - 1) {
                btnNext.classList.add('d-none');
                btnSubmit.classList.remove('d-none');
            } else {
                btnNext.classList.remove('d-none');
                btnSubmit.classList.add('d-none');
            }
        }
    </script>
</body>
</html>