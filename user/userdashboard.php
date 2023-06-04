<?php

session_start();

require 'dbconnection.php';

// url girerek gitmeyi engelleme

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../index.php');
    exit();
}
if ($_SESSION['usertype']) {
    header('Location: ../index.php');
    exit();
}

// kitap sayısını çeken kod
$result = mysqli_query($connection, "SELECT COUNT(*) FROM book;");
$row = mysqli_fetch_array($result);
$bookcount = $row[0];


// duyuruları çeken kod
$sql = "SELECT * FROM announcement ORDER BY date DESC ";
$result = mysqli_query($connection, $sql);

?>


<!DOCTYPE html>
<html>

<head>

    <title>User Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 220px;
            background-color: #414141;
            padding-top: 20px;
        }

        .menu li {
            list-style: none;
            padding: 15px;
            border-bottom: 1px solid #444;
        }

        .menu li:last-child {
            border-bottom: none;
        }

        .menu li a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .menu li a i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 220px;
            padding: 30px;
        }

        .header {
            margin-bottom: 30px;
        }

        .info {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        /* Responsive Stil */

        @media only screen and (max-width: 768px) {
            .sidebar {
                position: static;
                height: auto;
                width: 100%;
                padding-top: 0;
                margin-bottom: 20px;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">

        <ul class="menu">
            <li class="active"><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="./useroperations/passwordchange.php"><i class="fas fa-key"></i> Password Operations</a></li>

            <li><a href="./bookoperations/viewbook.php"><i class="fas fa-book"></i> View Books</a></li>


            <li><a href="./bookoperations/searchbook.php"><i class="fas fa-book-open"></i> Search Books</a></li>


            <li><a href="../mesaj/index.php"><i class="fas fa-envelope"></i>Messages</a></li>

            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

        </ul>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>User Panel</h1>
        </div>
        <div class="info">
            <p>
            <h3>You can make your operations using this page.</h3>
            </p>
        </div>


        <section>
            <br>
            <br>
            <br>
            <div class="info">
                <div class="container">
                    <h2> <u> <strong> Recent Announcements </strong> </u></h2>
                    <br>
                    <br>
                    <p> <?php if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row["title"] . " " . $row["content"] . " " . $row['date'] . "<br>";
                            }
                        } else {
                            echo "0 results";
                        } ?></p>

                </div>
            </div>
            <br>
            <br>
            <div class="col-sm-6">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">
                        <h4>Number Of Books </h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                        <h1><?php echo $bookcount; ?></h1>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

</html>