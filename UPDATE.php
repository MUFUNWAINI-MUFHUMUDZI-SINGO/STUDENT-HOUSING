<?php
// Include the connect.php file
include 'connect.php';

// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

// Get user_id from session
$user_id = $_SESSION['user_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $studentNumber = $_POST["studentNumber"];
    $degreeCode = $_POST["degreeCode"];
    $yearOfStudy = $_POST["yearOfStudy"];
    $levelOfStudy = $_POST["levelOfStudy"];
    $bursary = $_POST["bursary"];
    $gender = $_POST["gender"];
    $disability = $_POST["disability"];

    // Check if user has previously submitted information
    $sql_check = "SELECT * FROM update_information WHERE user_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $user_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // User has submitted information before, perform an update
        $sql_update = "UPDATE update_information SET student_number = ?, degree_code = ?, year_of_study = ?, level_of_study = ?, bursary = ?, gender = ?, disability = ? WHERE user_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssssssi", $studentNumber, $degreeCode, $yearOfStudy, $levelOfStudy, $bursary, $gender, $disability, $user_id);

        if ($stmt_update->execute()) {
            // Redirect to TRACK.PHP after successful update
            header("Location: TRACK.PHP");
            exit();
        } else {
            echo "Error updating information: " . $stmt_update->error;
        }

        $stmt_update->close();
    } else {
        // User is submitting information for the first time, perform an insert
        $sql_insert = "INSERT INTO update_information (user_id, student_number, degree_code, year_of_study, level_of_study, bursary, gender, disability) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("isssssss", $user_id, $studentNumber, $degreeCode, $yearOfStudy, $levelOfStudy, $bursary, $gender, $disability);

        if ($stmt_insert->execute()) {
            // Redirect to TRACK.PHP after successful insert
            header("Location: TRACK.PHP");
            exit();
        } else {
            echo "Error submitting information: " . $stmt_insert->error;
        }

        $stmt_insert->close();
    }
// Close statement
    $stmt_check->close();
}

// Close database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update information</title>
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
        <h1>UPDATE INFORMATION</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="studentNumber">Student Number:</label>
            <input type="text" id="studentNumber" name="studentNumber" placeholder="Enter your student number" required>

            <label for="degreeCode">Degree Code:</label>
            <input type="text" id="degreeCode" name="degreeCode" placeholder="Enter your degree code" required>
            
            <label for="yearOfStudy">Year of Study:</label>
            <select id="yearOfStudy" name="yearOfStudy" required>
                <option value="" disabled selected hidden>Select Year of Study</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
               
            </select>


            <label for="levelOfStudy">Level of Study:</label>
            <select id="levelOfStudy" name="levelOfStudy" required>
                <option value="" disabled selected hidden>Select level of Study</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth</option>
                <option value="Postgraduate">Postgraduate</option>
            </select>

            <label for="bursary">Bursary:</label>
            <select id="bursary" name="bursary" required>
                <option value="" disabled selected hidden>Select Bursary</option>
                <option value="NSFAS">NSFAS</option>
                <option value="Funza">Funza</option>
                <option value="NRF">NRF</option>
                <option value="SelfFunded">Self-funded</option>
                <option value="Other">Other</option>
            </select>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="" disabled selected hidden>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="disability">Disability:</label>
            <select id="disability" name="disability" required>
                <option value="" disabled selected hidden>Select Disability</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

           

            <button type="submit">Submit</button>
            <button type="button" onclick="window.location.href='Landin.php'">Cancel</button>
        </form>
    </div>
</body>
</html>
