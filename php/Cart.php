<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $bookId = intval($_POST['book_id']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if ($action === 'add') {
        if (!in_array($bookId, $_SESSION['cart'])) {
            $_SESSION['cart'][] = $bookId;
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'already_added']);
        }
    } elseif ($action === 'remove') {
        if (in_array($bookId, $_SESSION['cart'])) {
            $_SESSION['cart'] = array_diff($_SESSION['cart'], [$bookId]);
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'not_in_cart']);
        }
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error']);
}
