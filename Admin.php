<?php
// Include necessary files and establish database connection
include 'connect.php';

// Check if admin is logged in, if not, redirect to admin login page
// Add your authentication logic here

// Retrieve data from the database (example query with JOIN)
$sql = "SELECT residence_application.*, users.full_name 
        FROM residence_application 
        INNER JOIN users ON residence_application.user_id = users.user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Housing</title>
    <!-- Include your CSS or external stylesheet links here -->
</head>
<body>
    <div class="navbar">
        <img class="logo" src="img/UNI.jpg" alt="Univen Lost & Found Logo">
        <div class="nav-links">
            <a href="#" class="nav-link">UNIVEN STUDENT ACCOMMODATION</a>
        </div>
        <a href="#"><img class="logout-icon" src="img/icons8-logout-48.png" alt="Logout"></a>
    </div>

    <!-- Display Applications Table -->
    <div class="container">
        <h1>Applications</h1>
        <form action="" method="post">
            <input type="submit" name="submit" value="Update Status">
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>First Residence</th>
                        <th>First Room Number</th>
                        <th>First Status</th>
                        <th>Second Residence</th>
                        <th>Second Room Number</th>
                        <th>Second Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['user_id'] . "</td>";
                            echo "<td>" . $row['full_name'] . "</td>";
                            echo "<td>" . $row['first_residence_name'] . "</td>";
                            echo "<td>" . $row['first_room_number'] . "</td>";
                            echo "<td>
                                    <select name='first_status[" . $row['application_id'] . "]'>
                                        <option value='waitinglist' " . ($row['first_status'] == 'waitinglist' ? 'selected' : '') . ">Waitinglist</option>
                                        <option value='admitted' " . ($row['first_status'] == 'admitted' ? 'selected' : '') . ">Admitted</option>
                                        <option value='rejected' " . ($row['first_status'] == 'rejected' ? 'selected' : '') . ">Rejected</option>
                                    </select>
                                  </td>";
                            echo "<td>" . $row['second_residence_name'] . "</td>";
                            echo "<td>" . $row['second_room_number'] . "</td>";
                            echo "<td>
                                    <select name='second_status[" . $row['application_id'] . "]'>
                                        <option value='waitinglist' " . ($row['second_status'] == 'waitinglist' ? 'selected' : '') . ">Waitinglist</option>
                                        <option value='admitted' " . ($row['second_status'] == 'admitted' ? 'selected' : '') . ">Admitted</option>
                                        <option value='rejected' " . ($row['second_status'] == 'rejected' ? 'selected' : '') . ">Rejected</option>
                                    </select>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No applications found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <!-- Include footer or additional elements if needed -->

</body>
</html>

<?php
// Process form submission to update status
if (isset($_POST['submit'])) {
    // Loop through each application ID and update its status
    foreach ($_POST['first_status'] as $application_id => $status) {
        $sql_update = "UPDATE residence_application SET first_status = ? WHERE application_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $status, $application_id);
        $stmt_update->execute();
        $stmt_update->close();
    }
    
    // Loop through each application ID and update its status
    foreach ($_POST['second_status'] as $application_id => $status) {
        $sql_update = "UPDATE residence_application SET second_status = ? WHERE application_id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $status, $application_id);
        $stmt_update->execute();
        $stmt_update->close();
    }
    
    // Redirect to the same page to avoid form resubmission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Close database connection
$conn->close();
?>


<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
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

        .container {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        select {
            padding: 5px;
        }

      
        input[type="submit"] {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>