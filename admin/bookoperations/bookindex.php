<?php

//anasayfa

session_start();

require 'dbconnection.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../../index.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">


    <style>
        .button {
            background-color: #ffcc00;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .button:hover {
            background-color: darkgreen;
        }

        a {
            text-decoration: none;
            text-decoration-color: white;
        }
    </style>

    <title>Books</title>
</head>

<body>
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-flex justify-content-between align-items-center">Book Details
                            <a href="addbook.php" class="btn btn-primary">Add Book</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Author</th>
                                        <th>Summary</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM book";
                                    $query_run = mysqli_query($connection, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $bookData) {
                                    ?>
                                            <tr>
                                                <td><?= $bookData['id']; ?></td>
                                                <td><?= $bookData['name']; ?></td>
                                                <td><?= $bookData['author']; ?></td>
                                                <td><?= $bookData['summary']; ?></td>
                                                <td><?= $bookData['status']; ?></td>
                                                <td>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                                        <a href="bookview.php?id=<?= $bookData['id']; ?>" class="btn btn-info btn-sm me-md-2 mb-2">View</a>
                                                        <a href="bookedit.php?id=<?= $bookData['id']; ?>" class="btn btn-success btn-sm me-md-2 mb-2">Edit</a>
                                                        <form action="bookcode.php" method="POST">
                                                            <button type="submit" name="delete_book" value="<?= $bookData['id']; ?>" class="btn btn-danger btn-sm mb-2">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<h4>No Record Found</h4>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div>
            <button class="button"><a href="../admindashboard.php">Go to Homepage</a></button>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>