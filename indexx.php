<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVEN Lost & Found - Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url('img/Back.png');
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 90%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .left-side {
            width: 100%;
            padding: 30px;
            text-align: center;
            background-color: #025e8d;
            color: #fff;
            border-radius: 10px 10px 0 0;
        }
        .logo {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
            border-radius: 50%;
        }
        .left-side h1 {
            font-size: 2em;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .right-side {
            width: 100%;
            padding: 30px;
        }
        .login-container {
            width: 100%;
            max-width: 300px;
            margin: auto;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #025e8d;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .login-container input[type="submit"] {
            width: 100%;
            background-color: #025e8d;
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-container input[type="submit"]:hover {
            background-color: #025e8d;
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
            color: #025e8d;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .register-link:hover {
            color: #3f9cff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
            <h1>UNIVEN <br> LOST & FOUND</h1>
        </div>
        <div class="right-side">
            <div class="login-container">
                <h2>Please login below</h2>
                <form action="login.php" method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" value="Login">
                    <a href="register.php" class="register-link">Don't have an account? Register here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
