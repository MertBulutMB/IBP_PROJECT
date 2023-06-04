<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../../index.php');
    exit();
}


$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "projedatabase";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connection) {
    die('connection failed' . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $email = $_POST["email"];
    $currentpassword = hash("sha256",$_POST["currentpassword"]);
    $newpassword = hash("sha256", $_POST["newpassword"]);
    $confirmpassword = hash("sha256", $_POST["confirmpassword"]);


    $sql = "SELECT * FROM user WHERE email='$email' AND password='$currentpassword'";
    $result = mysqli_query($connection, $sql);


    if (mysqli_num_rows($result) > 0) {

        if ($newpassword == $confirmpassword) {
            $sql = "UPDATE user SET password='$newpassword' WHERE email='$email'";
            if (mysqli_query($connection, $sql)) {
                $_SESSION['message'] = 'Password updated successfully';
                header("Location: ../userdashboard.php");
            } else {

                $_SESSION['message'] = 'Error updating password!';

                echo "<h2> Error updating password: </h2>" . mysqli_error($connection);
            }
        } else {

            $_SESSION['message'] = 'New passwords do not match. Please try again.';
            echo "<h2> New passwords do not match. Please try again. </h2>";
        }
    } else {

        $_SESSION['message'] = 'Current password is incorrect. Please try again.';
        echo "<h2> Current password is incorrect. Please try again. </h2>";
    }

    mysqli_close($connection);
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Password Update</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lato', sans-serif;
            background-color: #313131;
        }

        h1 {
            font-size: 3em;
            text-align: center;
            color: #000000;
            margin-top: 50px;
            margin-bottom: 30px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 50px;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #444;
        }

        input[type=email],
        input[type=password],
        input[type=text] {
            width: 100%;
            padding: 15px 20px;
            margin: 8px 0;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            font-size: 1.1em;
            outline: none;
        }

        input[type=submit] {
            background-color: #000000;
            color: white;
            padding: 14px 28px;
            margin: 20px 0 10px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease-in-out;
            outline: none;
        }

        input[type=submit]:hover {
            background-color: #3e8e41;
        }

        @media only screen and (max-width: 480px) {
            h1 {
                font-size: 2em;
                margin-top: 30px;
            }

            .container {
                max-width: 95%;
                padding-top: 30px;
            }

            form {
                padding: 30px;
            }

            input[type=email],
            input[type=password],
            input[type=text] {
                padding: 10px 15px;
                font-size: 1em;
            }

            input[type=submit] {
                padding: 12px 18px;
                font-size: 1.1em;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Password Reset</h1>
        <form action="passwordchange.php" method="POST">

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="email" id="email" required>

            <label for="password">Current Password</label>
            <input placeholder="current password" type="text" id="password" name="currentpassword" required>

            <label for="password">New Password</label>
            <input placeholder="new password" type="text" id="password" name="newpassword" required>

            <label for="password">Confirm Password</label>
            <input placeholder="confirm new password" type="text" id="password" name="confirmpassword" required>

            <input type="submit" value="Update Password">

        </form>


    </div>
</body>

</html>