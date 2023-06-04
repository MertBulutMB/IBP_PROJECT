<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .results {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        .results h2 {
            margin-top: 0;
        }

        .book {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f8f8;
        }

        .book h3 {
            margin-top: 0;
            margin-bottom: 5px;
        }

        .book p {
            margin: 0;
        }

        button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 24px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <h1>Book Search</h1>
    <form method="post" action="">
        <input type="text" name="search" placeholder="Search for books">
        <button type="submit">Search</button>
    </form>

    <button>
        <a href="../userdashboard.php">Back</a>
    </button>

    <?php

    session_start();
    require 'dbconnection.php';

    if ($_SESSION['usertype']) {
        header('Location: ../../index.php');
        exit();
    }

    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($connection, $_POST['search']);
        $sql = "SELECT * FROM book WHERE name LIKE '%$search%' OR author LIKE '%$search%'";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="results">';
            echo '<h2>Results:</h2>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="book">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>By ' . $row['author'] . '</p>';
                echo '<p>Status: ' . $row['status'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo '<div class="results">';
            echo '<p>No results found</p>';
            echo '</div>';
        }
    }

    // Close the connection
    mysqli_close($connection);

    ?>
</body>

</html>