<?php
// Start session
session_start();

// Include the connect.php file
include 'connect.php';

// Initialize error message variable
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL statement to fetch user data
    $sql = "SELECT user_id, username_email, password FROM users WHERE username_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user with the given username exists
    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $stored_password = $row['password'];

        // Verify password
        if (password_verify($password, $stored_password)) {
            // Password is correct, set session variables and redirect to Landing.php
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: Landin.php");
            exit();
        } else {
            // Password is incorrect
            $error_message = "Incorrect password";
        }
    } else {
        // User with the given username doesn't exist
        $error_message = "User not found";
    }

    // Close statement
    $stmt->close();
}
// Close database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/Back.png'); /* Set background image */
            background-size: cover;
            background-position: center;
        }
        .container {
            display: flex;
            align-items: center;
            width: 80%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8); /* Added a semi-transparent white background */
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .left-side {
            flex: 1;
            padding: 30px;
            text-align: center;
            background-color: #025e8d;
            color: #fff;
        }
        .logo {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
            border-radius: 50%;
        }
        .left-side h1 {
            font-size: 2.5em;
            line-height: 1.2;
            margin-bottom: 30px;
        }
        .right-side {
            flex: 1;
            padding: 30px;
        }
        .login-container {
            max-width: 400px;
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
        .input-container {
    position: relative;
    margin-bottom: 15px;
}

.input-icon {
    position: absolute;
    left: 0px;
    top: 40%;
    transform: translateY(-50%);
    width: 20px; /* Adjust icon width as needed */
    height: auto; /* Maintain aspect ratio */
    pointer-events: none; /* Prevent icon from being clickable */
}

input[type="text"],
input[type="password"] {
    padding-right: 60px; /* Ensure input text doesn't overlap with icon */
}


    </style>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
            <h1>UNIVEN <br> ACCOMODATION PORTAL</h1>
        </div>
        <div class="right-side">
            <div class="login-container">
                <h2>Please login below</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-container">
                        <input type="text" name="username" placeholder="Username" required>
                        <img src="img/user.png" alt="Username" class="input-icon">
                    </div>
                    <div class="input-container">
                        <input type="password" name="password" placeholder="Password" required>
                        <img src="img/pass.png" alt="Email" class="input-icon">
                    </div>
                    <input type="submit" value="Login">
                    <a href="Register.php" class="register-link">Don't have an account? Register here</a>
                    <!-- Error message container -->
                    <?php if(isset($error_message)) { ?>
                        <p style="color: red;"><?php echo $error_message; ?></p>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
