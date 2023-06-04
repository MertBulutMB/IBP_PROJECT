<?php
session_start();

// Admin oturumunu kontrol et

// Duyuru eklemek için form gönderildiğinde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Veritabanı bağlantısı ve diğer ayarlar
    $host = 'localhost';
    $dbname = 'projedatabase';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Duyuru bilgilerini al ve güvenlik kontrolleri yap
        $title = $_POST['title'];
        $content = $_POST['content'];

        // XSS saldırılarına karşı girişleri temizle
        $title = htmlspecialchars($title);
        $content = htmlspecialchars($content);

        // SQL enjeksiyonu saldırılarına karşı sorguyu hazırla
        $sql = "INSERT INTO announcement (title, content, date) VALUES (:title, :content, :date)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);

        // Tarih alanını doğrudan kullanmayın, otomatik tarih ataması yapın
        $date = date('Y-m-d');
        $stmt->bindParam(':date', $date);

        // Duyuruyu veritabanına ekle
        $stmt->execute();

        // Başarılı bir şekilde eklendiğinde yönlendirme yap
        header("Location: admindashboard.php");
        exit;
    } catch (PDOException $e) {
        // Hata durumunda hata mesajını göster veya logla
        echo "Hata: " . $e->getMessage();
        exit;
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            border: 2px solid #000000;
            background-color: #ffffff;
            padding: 20px;
            margin-top: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        input[type=text],
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            background-color: #e8f0fe;
            color: #333;
        }

        input[type=submit] {
            background-color: #ffcc00;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type=submit]:hover {
            background-color: #ffc107;
        }

        p.success {
            color: #4caf50;
            margin-top: 20px;
            text-align: center;
        }

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

        /* Desktop layout */
        @media (min-width: 992px) {

            /* Form styles */
            form {
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* Tablet layout */
        @media (max-width: 991px) {

            /* Form styles */
            form {
                max-width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        /* Mobile layout */
        @media (max-width: 768px) {

            /* Form styles */
            form {
                max-width: 95%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        input[type=text],
        textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            background-color: #e8f0fe;
            color: #333;
            resize: vertical;
        }
    </style>
</head>

<body>
    <h2>Write your announcement</h2>

    <!-- Duyuru ekleme formu -->
    <form method="POST" action="">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Content</label>
        <textarea id="content" name="content" required></textarea>

        <input type="submit" value="Add Announcement">
    </form>

    <?php
    // Duyuru eklendikten sonra başarılı mesajını göster
    if (isset($_GET['success']) && $_GET['success'] === '1') {
        echo "<p class='success'>Duyuru başarıyla eklendi.</p>";
    }
    ?>

    <div>
        <button class="button"><a href="./admindashboard.php">Go to Homepage</a></button>
    </div>

</body>

</html>