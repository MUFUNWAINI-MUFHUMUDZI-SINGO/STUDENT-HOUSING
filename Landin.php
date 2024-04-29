<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIVEN ACCOMODATION</title>
    <style>
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
            color: orange;
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
        .report-container {
            background-color: #f8f8f8;
        }
        .find-container {
            background-color: #ebebeb;
        }
        h1 {
            color: #025e8d;
            margin-bottom: 15px;
        }
        .well {
            color: brown;
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
            background-color: orange;
        }

        .footer {
            background-color: #025e8d;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }

        .footer .flex {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }

        .footer h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer ul li {
            margin-bottom: 10px;
        }

        .footer .contact-info p {
            margin-bottom: 10px;
        }

        /* Styling links in the footer */
        .footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .footer p {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;

        }

        .footer a:hover {
            color: orange;
        }

        
    </style>
</head>
<body>
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
    <div class="container-wrapper">

    <div class="container report-container">
            <h1 class="well">WELCOME TO ACCOMODATION ONLINE PORTAL</h1>
            <p>Welcome to univen student accomodation portal.</p>
            
        </div>


        <div class="container report-container">
            <h1>APPLY FOR ACCOMODATION</h1>
            <p>Use this section to apply for accomodation on campus.</p>
            <a href="APPLY.php" class="btn">APPLY</a>
        </div>

        <div class="container report-container">
            <h1>TRACK YOUR APPLICATION</h1>
            <p>Use this section to track your application.</p>
            <a href="TRACK.php" class="btn">TRACK</a>
        </div>

        <div class="container report-container">
            <h1>UPDATE PROFILE INFORMATION</h1>
            <p>Use this section to update information on your application.</p>
            <a href="UPDATE.php" class="btn">UPDATE</a>
        </div>

       
    </div>



    <footer class="footer">
        <div class="flex">
            <div class="col-md-4">
                <div class="social-media">
                    <h3>Let’s Connect</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">LinkedIn</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="quick-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">About UNIVEN</a></li>
                        <li><a href="#">Student Affairs</a></li>
                        <li><a href="#">Library</a></li>
                        <li><a href="#">Research, Innovation and Postgraduate Studies</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
            <div class="quick-links">
                    <h3>Contact</h3>
                    <p>Switchboard: +27 15 962 8000</p>
                    <p>Emergency Numbers: 015 962 8603 / 8193 / 8120</p>
                    <p>Ambulance: +27 15 962 5461 / 015 962 9152 / 079 901 9305 (WhatsApp: 081 463 0343)</p>
                </div>
            </div>
        </div>
    </footer>


</body>


</html>


