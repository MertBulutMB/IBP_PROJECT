<!-- dbdeki kitap bilgilerini editleme sayfası-->

<?php

session_start();

require 'dbconnection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Edit</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <?php include('message.php') ?>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="m-0">Book Edit
                            <a href="bookindex.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {

                            $bookID = mysqli_real_escape_string($connection, $_GET['id']);
                            $query = "SELECT * FROM book WHERE id='$bookID'";

                            $query_run = mysqli_query($connection, $query);

                            // Check if record exists
                            if (mysqli_num_rows($query_run) > 0) {
                                $book = mysqli_fetch_array($query_run);

                        ?>

                                <form action="bookcode.php" method="POST">

                                    <input type="hidden" name="bookID" value="<?= $bookID ?>">

                                    <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="name" name="name" value="<?= $book['name']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Author</label>
                                        <input type="text" name="author" value="<?= $book['author']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Summary</label>
                                        <textarea name="summary" rows="3" class="form-control"><?= $book['summary']; ?></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="">--status--</option>
                                            <option value="available" <?= $book['status'] == 'available' ? 'selected' : ''; ?>>available</option>
                                            <option value="unavailable" <?= $book['status'] == 'unavailable' ? 'selected' : ''; ?>>unavailable</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_book" class="btn btn-primary">Update Book</button>
                                    </div>

                                </form>

                        <?php
                            } else {
                                echo "<h4>No ID Found!!</h4>";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>

</html>