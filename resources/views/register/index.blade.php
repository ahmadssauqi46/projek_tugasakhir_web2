<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body{
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-card{
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .form-control{
            height: 50px;
            border-radius: 12px;
        }

        .btn-login{
            background: #4f46e5;
            color: white;
            border-radius: 12px;
            height: 50px;
            width: 100%;
            border: none;
        }

        .btn-login:hover{
            background: #4338ca;
        }

        a{
            text-decoration: none;
            color: #4f46e5;
            font-weight: 500;
        }

        a:hover{
            color: #4338ca;
        }

    </style>

</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-card">
                    <h2 class="text-center mb-4">Login EduGame</h2>

                    <form>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Masukkan email">
                        </div>

                        <div class="mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Masukkan password">
                        </div>
                        <button class="btn-login">Login</button>

                        <div class="text-center mt-3">
                            Belum punya akun?
                            <a href="{{ url('/register') }}">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>