<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Mağazası</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Özel CSS -->
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>

<!-- Header -->
<header class="bg-primary text-white text-center py-4 mb-4">
    <h1 class="display-4">Online Kitap Mağazası</h1>
    <p class="lead">Binlerce kitap, tek tıkla kapınızda!</p>
</header>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="index.php">Kitap Mağazası</a>
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
    <!-- Kitap Arama -->
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center">Kitap Arama</h2>
            <input type="text" id="searchBox" class="form-control" placeholder="Kitap başlığı veya yazar ara..." oninput="searchBooks()">
            <div id="results" class="row mt-4"></div>
        </div>
    </div>

    <!-- Tüm Kitaplar -->
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <h2 class="text-center">Tüm Kitaplar</h2>
            <div id="allBooks" class="row mt-4"></div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="bookDetailsModal" tabindex="-1" aria-labelledby="bookDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookDetailsModalLabel">Kitap Detayları</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Book details will be loaded here -->
                <div id="bookDetailsContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2024 Kitap Mağazası. Tüm Hakları Saklıdır.</p>
</footer>

<!-- Bootstrap JS ve gerekli diğer scriptler -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="Scripts/main.js"></script>
</body>
</html>
