<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - {{ $topik }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f5f7ff; }
        
        .quiz-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .quiz-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .option {
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            padding: 15px;
            margin-top: 15px;
            transition: 0.2s;
            cursor: pointer;
            font-weight: 500;
        }

        /* State ketika opsi dipilih */
        .option.selected {
            border-color: #4f46e5;
            background: #eef2ff;
            color: #4f46e5;
        }

        .progress {
            height: 10px;
            border-radius: 20px;
        }

        .result-box {
            text-align: center;
        }

        .score-number {
            font-size: 64px;
            font-weight: 700;
            color: #4f46e5;
        }
    </style>
</head>
<body>

    <section class="quiz-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="quiz-card" id="quiz-container">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="mb-0 text-primary fw-bold">Quiz {{ $topik }}</h3>
                            <span class="badge bg-secondary" id="question-counter">Pertanyaan 1 dari {{ count($daftar_soal) }}</span>
                        </div>

                        <div class="progress mb-4">
                            <div class="progress-bar bg-primary" id="quiz-progress" style="width: 0%"></div>
                        </div>

                        <h5 class="mb-4 lh-base" id="question-text">Loading pertanyaan...</h5>

                        <div id="options-container"></div>

                        <div class="d-flex justify-content-end mt-5">
                            <button class="btn btn-primary px-5 py-2 fw-bold" id="next-btn" style="background: #4f46e5; border-radius: 10px;" disabled>
                                Next
                            </button>
                        </div>
                    </div>

                    <div class="quiz-card result-box d-none" id="result-container">
                        <h2 class="fw-bold mb-4">🎉 Quiz Selesai!</h2>
                        <p class="text-muted">Berikut adalah hasil evaluasi belajar kamu untuk topik <strong>{{ $topik }}</strong>:</p>
                        
                        <div class="my-4">
                            <div class="score-number" id="final-score">0</div>
                            <p class="text-secondary fw-medium">Total Skor Kamu</p>
                        </div>

                        <div class="row g-3 my-3">
                            <div class="col-6">
                                <div class="p-3 bg-light rounded-3 border-start border-success border-4">
                                    <h5 class="mb-1 text-success fw-bold" id="correct-count">0</h5>
                                    <span class="text-muted small">Jawaban Benar</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="p-3 bg-light rounded-3 border-start border-danger border-4">
                                    <h5 class="mb-1 text-danger fw-bold" id="wrong-count">0</h5>
                                    <span class="text-muted small">Jawaban Salah</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3 justify-content-center mt-5">
                            <a href="/quiz" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 10px;">Pilih Topik Lain</a>
                            <button onclick="window.location.reload();" class="btn btn-primary px-4 py-2" style="background: #4f46e5; border-radius: 10px;">Coba Lagi</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        const questions = @json($daftar_soal);
        
        let currentQuestionIndex = 0;
        let score = 0;
        let correctAnswersCount = 0;
        let wrongAnswersCount = 0;
        let selectedAnswer = null;

        const questionText = document.getElementById('question-text');
        const optionsContainer = document.getElementById('options-container');
        const nextBtn = document.getElementById('next-btn');
        const questionCounter = document.getElementById('question-counter');
        const quizProgress = document.getElementById('quiz-progress');
        
        const quizContainer = document.getElementById('quiz-container');
        const resultContainer = document.getElementById('result-container');

        function loadQuestion() {
            resetState();
            let currentQuestion = questions[currentQuestionIndex];
            
            questionText.innerText = currentQuestion.pertanyaan;
            questionCounter.innerText = `Pertanyaan ${currentQuestionIndex + 1} dari ${questions.length}`;
            
            let progressPercent = ((currentQuestionIndex) / questions.length) * 100;
            quizProgress.style.width = `${progressPercent}%`;

            currentQuestion.pilihan.forEach(opsi => {
                const div = document.createElement('div');
                div.classList.add('option');
                div.innerText = opsi;
                div.addEventListener('click', () => selectOption(div, opsi));
                optionsContainer.appendChild(div);
            });
        }

        function resetState() {
            selectedAnswer = null;
            nextBtn.disabled = true;
            optionsContainer.innerHTML = '';
        }

        function selectOption(element, optionText) {
            const allOptions = optionsContainer.querySelectorAll('.option');
            allOptions.forEach(opt => opt.classList.remove('selected'));
            
            element.classList.add('selected');
            selectedAnswer = optionText;
            
            nextBtn.disabled = false;
        }

        nextBtn.addEventListener('click', () => {
            let currentQuestion = questions[currentQuestionIndex];
            
            if (selectedAnswer === currentQuestion.jawaban_benar) {
                correctAnswersCount++;
            } else {
                wrongAnswersCount++;
            }

            currentQuestionIndex++;

            if (currentQuestionIndex < questions.length) {
                loadQuestion();
            } else {
                showResults();
            }
        });

        function showResults() {
            quizContainer.classList.add('d-none');
            resultContainer.classList.remove('d-none');
            
            let finalScoreCalculated = Math.round((correctAnswersCount / questions.length) * 100);
            
            document.getElementById('final-score').innerText = finalScoreCalculated;
            document.getElementById('correct-count').innerText = correctAnswersCount;
            document.getElementById('wrong-count').innerText = wrongAnswersCount;
        }

        loadQuestion();
    </script>
</body>
</html>