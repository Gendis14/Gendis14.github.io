<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color:whitesmoke;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .card-container {
            position: relative;
            width: 400px; /* Adjusted width */
            height: 200px;
        }

        .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
        }

        .icon {
            font-size: 24px;
            color: #555;
        }

        h2 {
            color: #555;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding-left: 35px;
        }

        .icon-input {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #555;
        }

        .password-toggle {
            cursor: pointer;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #555;
        }

        .card img {
            width: 100%; /* Make the image fill the card */
            border-radius: 10px; /* Apply border-radius to match the card */
            margin-bottom: 10px;
        }

        .btn-primary {
            background: linear-gradient(to right, #8A2BE2, #FF1493, #87CEEB);
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #8A2BE2, #FF1493, #87CEEB);
        }
    </style>
</head>
<body>
    <div class="card-container">
        <div class="card">
            <h2>Login Mahasiswa</h2>
            <img src="https://img.freepik.com/premium-vector/stealing-data-concept-flat-vector-illustration-online-registration-form-login-social-media-account-female-cartoon-character-thinking-about-security-male-hacker-tries-gather-personal-data_241107-1246.jpg" alt="Placeholder Image">
            <form action="ceklogin.php" method="post">
                <div class="form-group">
                    <div class="icon-input">
                        <i class="fas fa-user"></i>
                    </div>
                    <label for="nim" class="sr-only">NIM:</label>
                    <input type="text" id="nim" name="nim" class="form-control" placeholder="NIM" required>
                </div>

                <div class="form-group">
                    <div class="icon-input">
                        <i class="fas fa-lock"></i>
                    </div>
                    <label for="password" class="sr-only">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>
