<?php

session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "projedatabase";

$connection = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connection) {
    die('connection failed' . mysqli_connect_error());
}

if (isset($_POST['email']) && isset($_POST['password'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = hash("sha256",$_POST['password']);

        $sql = " SELECT * FROM user WHERE email='$email' AND password='$password'";

        $query = mysqli_query($connection, $sql);

        if (mysqli_num_rows($query) > 0) {
            echo "user exist";
            $row = mysqli_fetch_array($query);

            $_SESSION['loggedin'] = true;


            if ($row['usertype'] == 'admin') {
                echo "admin";
                $_SESSION['usertype'] = true;
                header("Location: ./admin/admindashboard.php");
                exit();
            } else {
                echo "user";
                $_SESSION['usertype'] = false;
                header("Location: ./user/userdashboard.php");
            }
        } else {
            echo "invalid login";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Library Management System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
    <style>
        body {
            background-image: url("https://c4.wallpaperflare.com/wallpaper/526/8/1002/library-interior-interior-design-books-wallpaper-preview.jpg");
            margin: 0;
            padding: 0;
            font-family: 'Lato', sans-serif;
            background-color: #f6f6f6;
        }

        h1 {
            font-size: 3em;
            text-align: center;
            color: white;
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
        input[type=password] {
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
            background-color: #4CAF50;
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
                color: white;
            }

            .container {
                max-width: 95%;
                padding-top: 30px;
            }

            form {
                padding: 30px;
            }

            input[type=email],
            input[type=password] {
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
        <h1>Login</h1>
        <form action="index.php" method="post">
            <label for="email">Email</label>
            <input placeholder="email" type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input placeholder="password" type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>