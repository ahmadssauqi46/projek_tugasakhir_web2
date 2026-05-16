<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: #f5f7ff;
            font-family: Arial, sans-serif;
        }

        .hero{
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: white;
            text-align: center;
            padding: 80px 0;
        }

        .card-about{
            background: white;
            border-radius: 20px;
            padding: 40px;
            color: black;
            margin-top: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .contact-card{
            background: #f8f9ff;
            border-radius: 15px;
            padding: 20px;
            height: 100%;
            border: 1px solid #e5e7eb;
        }

        .contact-title{
            font-weight: bold;
            margin-bottom: 10px;
            color: #4f46e5;
        }

    </style>

</head>
<body>

    <section class="hero">

        <div class="container">

            <h1>Tentang EduGame</h1>

            <p>
                Media pembelajaran interaktif berbasis web
                dengan gamification dan real-time score tracking.
            </p>

            <div class="card-about">

                <h3>Tujuan Website</h3>

                <p>
                    Membantu siswa belajar komputer dengan cara
                    yang lebih modern, menarik, dan interaktif.
                </p>

                <hr>

                <h4>Developer</h4>

                <p>
                    Ahmad Sauqi | Alfria Afdha | Tegar Kurniawan
                </p>

                <hr>

                <h4 class="mb-4">
                    Kontak Developer
                </h4>

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <div class="contact-card">

                            <div class="contact-title">
                                📧 Email
                            </div>

                            <p class="mb-0">
                                edukomlearning@gmail.com
                            </p>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="contact-card">

                            <div class="contact-title">
                                📱 WhatsApp
                            </div>

                            <p class="mb-0">
                                +62 895-3651-36837
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>