<?php
// Include the connect.php file
include 'connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the selected residence options from the form
    $first_residence = $_POST["1residence"];
    $second_residence = $_POST["2residence"];

    // Prepare SQL statement to insert data into the residence_application table
    $sql = "INSERT INTO residence_application (user_id, first_residence_name, first_room_number, first_status, second_residence_name, second_room_number, second_status) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $user_id, $first_residence, $first_room_number, $first_status, $second_residence, $second_room_number, $second_status);

  
    session_start(); // Start the session

    // Check if the user is logged in (assuming you have a session variable named 'user_id')
    if(isset($_SESSION['user_id'])) {
        // Retrieve the user ID from the session
        $user_id = $_SESSION['user_id'];
    } else {
        // Redirect the user to the login page or display an error message
        header("Location: Landin.php");
        exit; // Stop further execution
    }
    

    // Generate random room numbers for both first and second residence options
    $first_room_number = mt_rand(1, 100); // Generate a random number between 1 and 100
    $second_room_number = mt_rand(1, 100); // Generate a random number between 1 and 100

    // Set default status as "waitinglist"
    $first_status = "waitinglist";
    $second_status = "waitinglist";

    // Execute the statement
    if ($stmt->execute()) {
        echo "Residence options submitted successfully";
        // Redirect to Landin.php or any other page
        header("Location: TRACK.php");
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Apply for Accommodation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #025e8d;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            color: #025e8d;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background-color: #28a745;
            margin-right: 10px;
        }

        button[type="button"] {
            background-color: #dc3545;
        }

        button:hover {
            background-color: #0056b3;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        button[type="button"]:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Apply for Accommodation</h1>
        <form action="" method="post" enctype="multipart/form-data">
            
            <label for="1residence">First option Residence:</label>
            <select id="1residence" name="1residence" required>
                <option value="" disabled selected hidden>Select Residence</option>
                <option value="F3">F3 MALE HOSTEL</option>
                <option value="F4">F4 FEMALE HOSTEL</option>
                <option value="F5">F5 FEMALE HOSTEL</option>
                <option value="Riverside postgrad res">RIVERSIDE PROSGRADUATE RESIDENCE</option>
                <option value="Mango groove">MANGO GROOVE</option>
                <option value="Lost City BOYS">LOST CITY BOYS</option>
                <option value="LOST CITY GIRLS">LOST CITY GIRLS</option>
                <option value="NEW MALE">NEW MALE RESIDENCE</option>
                <option value="NEW FEMALE">NEW FEMALE RESIDENCE</option>
                <option value="DBSA FEMALE">DBSA FEMALE</option>
                <option value="DBSA MALE">DBSA MALE</option>
            </select>

            <label for="2residence">Second option Residence:</label>
            <select id="2residence" name="2residence" required>
                <option value="" disabled selected hidden>Select Residence</option>
                <option value="F3">F3 MALE HOSTEL</option>
                <option value="F4">F4 FEMALE HOSTEL</option>
                <option value="F5">F5 FEMALE HOSTEL</option>
                <option value="Riverside postgrad res">RIVERSIDE PROSGRADUATE RESIDENCE</option>
                <option value="Mango groove">MANGO GROOVE</option>
                <option value="Lost City BOYS">LOST CITY BOYS</option>
                <option value="LOST CITY GIRLS">LOST CITY GIRLS</option>
                <option value="NEW MALE">NEW MALE RESIDENCE</option>
                <option value="NEW FEMALE">NEW FEMALE RESIDENCE</option>
                <option value="DBSA FEMALE">DBSA FEMALE</option>
                <option value="DBSA MALE">DBSA MALE</option>
            </select>

            <button type="submit">Submit</button>
            <button type="button" onclick="window.location.href='Landin.php'">Cancel</button>
        </form>
    </div>
</body>
</html>



