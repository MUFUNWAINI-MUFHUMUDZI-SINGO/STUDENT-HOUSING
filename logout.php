<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>32400012</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #E5E4E2;
        } 
     .logout-container {
        text-align: center;
        margin-top: 100px;
        border: 2px solid #ccc;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: inline-block;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .question {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .buttons {
        display: flex;
        justify-content: center;
    }

    .logout-btn {
        background-color: red;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-right: 10px;
    }

    .go-back-btn {
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        margin-left: 10px;
    }
    </style>

    <link rel="stylesheet" href="style.css">
   
</head>
<body>



<div class="logout-container">
    <div class="question">
        <p>Are you sure you want to log out ?</p>
    </div>
    <div class="buttons">
        <button class="logout-btn" onclick="location.href='INDEX.php';">Logout</button>
        <button class="go-back-btn" onclick="location.href='Landin.php';">Go back</button>
    </div>
</div>

</body>
</html>

<style>
       
       

        

       .menu {
           list-style-type: none;
           margin: 0;
           padding: 0;
           display: flex;
           align-items: center;
       }

       .menu li {
           margin-right: 20px;
       }

       .menu li a {
           color: white;
           text-decoration: none;
           font-weight: bold;
       }

       .menu li a:hover {
           color: #FFD700;
       }

       .navbar red li a:hover{
           color:#FFD700;
       }

       .content {
           padding: 40px;
           text-align: center;
           color: #002232;
       }

       .footer {
           background-color: #002232;
           color: #fff;
           padding: 20px 0;
           text-align: center;
       }

       .footer ul {
           list-style-type: none;
           padding: 0;
       }

       .footer ul li {
           display: inline;
           margin-right: 10px;
       }

       .footer ul li:before {
           content: "|";
           margin-right: 10px;
       }

       .footer ul li:first-child:before {
           content: "";
           margin-right: 0;
       }
       </style>


