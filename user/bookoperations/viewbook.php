<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Books List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .book {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }

        .book h2 {
            margin-top: 0;
        }

        .book p {
            margin: 0;
        }

        .book-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            font-weight: bold;
        }

        .book-status-avail {
            background-color: green;
        }

        .book-status-unavail {
            background-color: red;
        }

        /* Responsive styles */
        @media screen and (max-width: 600px) {
            main {
                padding: 10px;
            }

            .book {
                margin: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Books List</h1>
        <style>
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
    </header>

    <main>

        <button>
            <a href="../userdashboard.php">Back</a>
        </button>

        <br>
        <br>

        <?php
        session_start();
        require 'dbconnection.php';

        if ($_SESSION['usertype']) {
            header('Location: ../../index.php');
            exit();
        }

        $sql = "SELECT name, author, summary, status FROM book";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $author = $row['author'];
                $summary = $row['summary'];
                $status = $row['status'];

                echo "<div class='book'>";
                echo "<h2>{$name}</h2>";
                echo "<p><strong>Author:</strong> {$author}</p>";
                echo "<p><strong>Summary:</strong> {$summary}</p>";

                if ($status == 'available') {
                    echo "<p><span class='book-status book-status-avail'>{$status}</span></p>";
                } else {
                    echo "<p><span class='book-status book-status-unavail'>{$status}</span></p>";
                }

                echo "</div>";
            }
        } else {
            echo "No books found.";
        }

        $connection->close();
        ?>
    </main>
</body>

</html>