<!-- dbdeki bilgileri gostermek icin kod bootstrap falan kullanıldı tasarımda -->

<?php

require 'dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User View Details</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">


        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="m-0">User View Details
                            <a href="userindex.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_GET['id'])) {

                            $userID = mysqli_real_escape_string($connection, $_GET['id']);
                            $query = "SELECT * FROM user WHERE id='$userID'";

                            $query_run = mysqli_query($connection, $query);

                            // Check if record exists
                            if (mysqli_num_rows($query_run) > 0) {
                                $user = mysqli_fetch_array($query_run);
                        ?>

                                <div class="mb-3">
                                    <label for="">Email</label>

                                    <p class="form-control">
                                        <?= $user['email']; ?>
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label for="">Password</label>

                                    <p class="form-control">
                                        <?= $user['password']; ?>
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label for="">User Type</label>

                                    <p class="form-control">
                                        <?= $user['usertype']; ?>

                                    </p>
                                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>