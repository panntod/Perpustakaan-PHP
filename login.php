<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link
        href="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Perpustakaan_Nasional_Republik_Indonesia_insignia.svg/1200px-Perpustakaan_Nasional_Republik_Indonesia_insignia.svg.png"
        rel="icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1588580000645-4562a6d2c839?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        .login-form {
            background-color: rgba(222, 222, 222, 0.8);
            padding: 3rem 1rem;
            border-radius: 10px;
            margin-top: 100px;
        }

        a {
            color: #8B4513;
        }

        a:hover {
            color: #8B4513;
        }

        p {
            margin: 1rem 0;
            text-align: center;
        }

        .btn-brown {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            background-color: #8B4513;
            border-color: #8B4513;
        }

        .btn-brown:focus {
            box-shadow: 0 0 0 0.2rem #8B4513;
            background-color: #8B4513;
        }

        .btn-brown:hover {
            color: #fff;
            border-color: #8B4513;
            background-color: #DAC0A3;
        }

        .form-control:focus {
            border-color: #8B4513;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="login-form">
                    <h2 class="text-center">Login</h2>
                    <form action="proses_login.php" method="post"">
                        <div class=" form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                </div>
                <button type="submit" class="btn btn-brown btn-block">Login</button>
                <p class="mt-5">Dont have any account? <a href="tambah_siswa.php">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>