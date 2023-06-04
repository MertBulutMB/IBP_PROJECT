<!-- kitap bilgilerini dbye eklemek icin -->


<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Book</title>
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
                        <h4 class="m-0">Add Book
                            <a href="bookindex.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="bookcode.php" method="POST">

                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="name" name="name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Author</label>
                                <input type="text" name="author" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Summary</label>
                                <textarea name="summary" rows="3" class="form-control"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">--status--</option>
                                    <option value="available">available</option>
                                    <option value="unavailable">unavailable</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_book" class="btn btn-primary">Add Book</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>

</body>

</html>