// book_details.php
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "Admin1234";
$dbname = "online_bookstore";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

$book = $result->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($book, JSON_PRETTY_PRINT);
$conn->close();
?>
