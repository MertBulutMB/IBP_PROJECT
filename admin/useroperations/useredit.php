<!-- dbdeki bilgileri editlemek icin  kod bootstrap falan kullanıldı tasarımda -->

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
    <title>User Edit</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <?php include('message.php') ?>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="m-0">User Edit
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

                                <form action="usercode.php" method="POST">

                                    <input type="hidden" name="userID" value="<?= $userID ?>">

                                    <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">Password</label>
                                        <input type="text" name="password" value="<?= $user['password']; ?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label for="">User Type</label>
                                        <select value="<?= $user['usertype']; ?>" name="usertype" class="form-control">
                                            <option value="">--select user type--</option>
                                            <option value="admin">admin</option>
                                            <option value="user">user</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>