<?php
// Start a session
session_start();

// Include the connect.php file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare SQL statement to insert data into the users table
    $sql = "INSERT INTO users (username_email, full_name, password) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username_email, $full_name, $password);

    // Set parameters and execute the statement
    $username_email = $_POST["username_email"];
    $full_name = $_POST["full_name"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security

    if ($stmt->execute()) {
        // Store user information in session if needed
        $_SESSION['username'] = $username_email;
        
        // Redirect to INDEX.php or any other page
        header("Location: sucess.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
   
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
            <h1>UNIVEN <br> ACCOMODATION PORTAL</h1>
        </div>
        <div class="right-side">
            <div class="signup-container">
                <h2>Create an Account</h2>
                <form action=" " method="post">
                    <input type="text" name="username_email" placeholder="Username or Email" required>
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <input type="submit" value="Sign Up">
                      <!-- Error message container -->
                      <?php if(isset($error_message)) { ?>
                        <p style="color: red;"><?php echo $error_message; ?></p>
                    <?php } ?>
                    <a href="INDEX.php" class="login-link">Already have an account? Log in here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


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
        .signup-container {
            max-width: 400px;
            margin: auto;
        }
        .signup-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #025e8d;
        }
        .signup-container input[type="text"],
        .signup-container input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
        }
        .signup-container input[type="submit"] {
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
        .signup-container input[type="submit"]:hover {
            background-color: #025e8d;
        }
        .login-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            font-size: 0.9em;
            color: #025e8d;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .login-link:hover {
            color: #3f9cff;
        }
    </style>
