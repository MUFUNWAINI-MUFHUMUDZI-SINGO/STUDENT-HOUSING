<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVEN ACCOMMODATION</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
        <div class="nav-links">
            
            <a href="Landin.php" class="nav-link">HOME</a>
            
            <a href="APPLY.php" class="nav-link">APPLY</a>
            
            <a href="TRACK.php" class="nav-link">TRACK</a>
            
            <a href="UPDATE.php" class="nav-link">UPDATE PROFILE</a>



        </div>
        <a href="logout.php"><img class="logout-icon" src="img/icons8-logout-48.png" alt="Logout"></a>
    </div>

    <!-- Container for User Information and Additional Information -->
    <div class="container-wrapper">
        <div class="container user-additional-container">
            <h1>User Information</h1>
            <?php
            session_start(); // Start the session
            include 'connect.php';

            // Assuming you have a session variable containing the user ID
            $user_id = $_SESSION['user_id'];

            // Fetch user information from the database
            $sql_user = "SELECT * FROM users WHERE user_id = ?";
            $stmt_user = $conn->prepare($sql_user);
            $stmt_user->bind_param("i", $user_id);
            $stmt_user->execute();
            $result_user = $stmt_user->get_result();
            $user_data = $result_user->fetch_assoc();

            // Display user information
            echo "<p>Username/Email: " . $user_data['username_email'] . "</p>";
            echo "<p>Full Name: " . $user_data['full_name'] . "</p>";

            $stmt_user->close();

         // Fetch additional information from the database
$sql_additional = "SELECT * FROM update_information WHERE user_id = ?";
$stmt_additional = $conn->prepare($sql_additional);
$stmt_additional->bind_param("i", $user_id);
$stmt_additional->execute();
$result_additional = $stmt_additional->get_result();

// Check if there is any data returned
if ($result_additional->num_rows > 0) {
    $additional_data = $result_additional->fetch_assoc();
    // Display additional information
    echo "<h1>Additional Information</h1>";
    echo "<p>Student Number: " . ($additional_data['student_number'] ?? "Not updated") . "</p>";
    echo "<p>Degree Code: " . ($additional_data['degree_code'] ?? "Not updated") . "</p>";
    echo "<p>Year of Study: " . ($additional_data['year_of_study'] ?? "Not updated") . "</p>";
    echo "<p>Level of Study: " . ($additional_data['level_of_study'] ?? "Not updated") . "</p>";
    echo "<p>Bursary: " . ($additional_data['bursary'] ?? "Not updated") . "</p>";
    echo "<p>Gender: " . ($additional_data['gender'] ?? "Not updated") . "</p>";
    echo "<p>Disability: " . ($additional_data['disability'] ?? "Not updated") . "</p>";
} else {
    echo "<h1>Additional Information</h1>";
    echo "<p>No additional information available</p>";
}

$stmt_additional->close();

            ?>
        </div>
    
      <!-- Container for Application Information -->
<div class="container application-info-container">
    <h1>Application Information</h1>
    <table>
        <tr>
            <th>Residence</th>
            <th>Room Number</th>
            <th>Status</th>
        </tr>
        <?php
        // Fetch application information from the database
        $sql_application = "SELECT * FROM residence_application WHERE user_id = ?";
        $stmt_application = $conn->prepare($sql_application);
        $stmt_application->bind_param("i", $user_id);
        $stmt_application->execute();
        $result_application = $stmt_application->get_result();

        // Loop through each row of the result set and display as table rows
        while ($application_data = $result_application->fetch_assoc()) {
            echo "<tr>";
            // First Residence
            echo "<td style='background-color: ";
            // Set color based on status
            if ($application_data['first_status'] == 'waitinglist') {
                echo "yellow";
            } elseif ($application_data['first_status'] == 'admitted') {
                echo "green";
            } elseif ($application_data['first_status'] == 'rejected') {
                echo "red";
            }
            echo ";'>" . $application_data['first_residence_name'] . "</td>";

            // First Room Number
            echo "<td>" . $application_data['first_room_number'] . "</td>";

            // First Status
            echo "<td>" . $application_data['first_status'] . "</td>";
            echo "</tr>";

            echo "<tr>";
            // Second Residence
            echo "<td style='background-color: ";
            // Set color based on status
            if ($application_data['second_status'] == 'waitinglist') {
                echo "yellow";
            } elseif ($application_data['second_status'] == 'admitted') {
                echo "green";
            } elseif ($application_data['second_status'] == 'rejected') {
                echo "red";
            }
            echo ";'>" . $application_data['second_residence_name'] . "</td>";

            // Second Room Number
            echo "<td>" . $application_data['second_room_number'] . "</td>";

            // Second Status
            echo "<td>" . $application_data['second_status'] . "</td>";
            echo "</tr>";
        }

        $stmt_application->close();
        ?>
    </table>
</div>

    </div>
</body>
</html>


<style>
/* Style for the application information table */
.application-info-container table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #ddd;
    margin-top: 20px;
}

.application-info-container th, .application-info-container td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.application-info-container th {
    background-color: #025e8d; 
    color: #fff;
}


.application-info-container td {
    background-color: #fff;
}

.application-info-container tr:nth-child(even) {
    background-color: #f2f2f2;
}

.application-info-container tr:hover {
    background-color: #ddd;
}

.user-additional-container {
    width: calc(50% - 20px); /* Adjust width as needed */
    margin-right: 20px; /* Adjust margin as needed */
}

.application-info-container {
    width: calc(50% - 20px); /* Adjust width as needed */
    margin-left: 20px; /* Adjust margin as needed */
}


body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.navbar {
    background-color: #025e8d;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    color: #fff;
}

.logo {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-right: 20px;
}

.nav-links {
    display: flex;
    align-items: center;
}

.nav-link {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
    font-weight: bold;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #3f9cff;
}

.logout-icon {
    font-size: 1.5em;
    cursor: pointer;
}

.container-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap; /* Allow containers to wrap to the next line if needed */
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto; /* Center the containers horizontally */
}

.container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    margin: 20px;
    width: calc(50% - 40px); /* Each container takes 50% of the container-wrapper width */
    max-width: 400px; /* Limit the max width of each container */
}

h1 {
    color: #025e8d;
    margin-bottom: 15px;
}

p {
    color: #333;
    margin-bottom: 20px;
}

.btn {
    background-color: #025e8d;
    color: #fff;
    border: none;
    padding: 15px 30px;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease;
    display: inline-block; /* Align the button horizontally */
}

.btn:hover {
    background-color: #3f9cff;
}

    </style>
