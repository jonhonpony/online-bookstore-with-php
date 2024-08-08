<?php
header('Content-Type: text/html; charset=utf-8');

session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepetim</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Özel CSS -->
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>

<!-- Header -->
<header class="bg-primary text-white text-center py-4 mb-4">
    <h1 class="display-4">Sepetim</h1>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="index.php">Kitap Maðazasý</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Anasayfa</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="sepetim.php">Sepet <span id="cart-counter" class="badge bg-light text-dark"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span></a>
            </li>
        </ul>
    </div>
</nav>

<main class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Sepetinizdeki Kitaplar</h2>
            <div id="cartItems" class="row mt-4">
                <?php
                $totalPrice = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $bookIds = implode(',', $_SESSION['cart']);
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "Admin1234";
                    $dbname = "online_bookstore";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, title, author, price FROM books WHERE id IN ($bookIds)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $totalPrice += $row['price'];
                            echo '
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $row['title'] . '</h5>
                                        <p class="card-text">' . $row['author'] . '</p>
                                        <p class="card-text">' . $row['price'] . ' TL</p>
                                        <button class="btn btn-danger" onclick="removeFromCart(' . $row['id'] . ')">Kaldýr</button>
                                    </div>
                                </div>
                            </div>';
                        }
                    } else {
                        echo '<p class="text-center">Sepetinizde kitap yok.</p>';
                    }

                    $conn->close();
                } else {
                    echo '<p class="text-center">Sepetinizde kitap yok.</p>';
                }
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="text-center">Ürün Detaylarý</h2>
            <ul class="list-group mb-3">
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $bookIds = implode(',', $_SESSION['cart']);
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "Admin1234";
                    $dbname = "online_bookstore";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT title, price FROM books WHERE id IN ($bookIds)";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                ' . $row['title'] . '
                                <span>' . $row['price'] . ' TL</span>
                            </li>';
                        }
                    }

                    $conn->close();
                }
                ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Toplam Fiyat</strong>
                    <strong><?php echo $totalPrice; ?> TL</strong>
                </li>
            </ul>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kitap Maðazasý. Tüm Haklarý Saklýdýr.</p>
</footer>

<!-- Bootstrap JS ve gerekli diðer scriptler -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="Scripts/main.js"></script>

</body>
</html>
