
<?php

session_start();

require 'dbconnection.php';


// kitap ekleme  

if (isset($_POST['save_book'])) {

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $summary = mysqli_real_escape_string($connection, $_POST['summary']);
    $status = $_POST['status'];

    $query = "INSERT INTO book (name,author,summary,status) VALUES ('$name','$author','$summary','$status')";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {

        $_SESSION['message'] = 'Book created succesfully';
        header("Location: bookindex.php");
        exit(0);
    } else {

        $_SESSION['message'] = 'Book not created';
        header("Location: bookindex.php");
        exit(0);
    }
}

// kitap bilgi guncelle


if (isset($_POST['update_book'])) {

    $bookID = mysqli_real_escape_string($connection, $_POST['bookID']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $summary = mysqli_real_escape_string($connection, $_POST['summary']);
    $status =  $_POST['status'];

    $query = "UPDATE book SET  name='$name', author='$author', summary= '$summary', status='$status' WHERE id='$bookID' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {

        $_SESSION['message'] = 'Book updated succesfully';
        header("Location: bookindex.php");
        exit(0);
    } else {
        $_SESSION['message'] = 'Book not updated ';
        header("Location: bookindex.php");
        exit(0);
    }
}

// kitap silme


if (isset($_POST['delete_book'])) {


    $bookID = mysqli_real_escape_string($connection, $_POST['delete_book']);

    $query = "DELETE FROM book WHERE id = '$bookID' ";

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {


        $_SESSION['message'] = 'Book deleted succesfully';
        header("Location: bookindex.php");
        exit(0);
    } else {


        $_SESSION['message'] = 'Book not deleted ';
        header("Location: bookindex.php");
        exit(0);
    }
}


?>