<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #f5f7ff;
        }

        .quiz-section{
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .quiz-card{
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .option{
            border: 2px solid #e5e7eb;
            border-radius: 15px;
            padding: 15px;
            margin-top: 15px;
            transition: 0.3s;
            cursor: pointer;
        }

        .option:hover{
            background: #4f46e5;
            color: white;
        }

        .progress{
            height: 10px;
            border-radius: 20px;
        }

    </style>

</head>
<body>

    <section class="quiz-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="quiz-card">

                        <h3 class="mb-4">
                            Quiz Komputer
                        </h3>

                        <div class="progress mb-4">

                            <div class="progress-bar bg-primary" style="width: 40%"></div>

                        </div>

                        <h5>
                            Apa fungsi utama CPU pada komputer?
                        </h5>

                        <div class="option">
                            Menyimpan data
                        </div>

                        <div class="option">
                            Memproses data
                        </div>

                        <div class="option">
                            Menampilkan gambar
                        </div>

                        <div class="option">
                            Menghubungkan internet
                        </div>

                        <div class="d-flex justify-content-between mt-4">

                            <button class="btn btn-secondary">
                                Previous
                            </button>

                            <button class="btn btn-primary">
                                Next
                            </button>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</body>
</html>