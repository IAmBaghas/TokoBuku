<!-- Github.com/IAmBaghas -->

<?php
$idPenerbit = $_GET['idPenerbit'];
$idBuku = $_GET['idBuku'];

$conn = new mysqli('localhost', 'root', '', 'data');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM penerbit WHERE ID_Penerbit = '$idPenerbit'";
$sql1 = "DELETE FROM buku WHERE ID_Buku = '$idBuku'";

if ($conn->query($sql) === TRUE) {
    header("Location: admin.php"); 
} else {
    echo "Error deleting record: " . $conn->error;
}

if ($conn->query($sql1) === TRUE) {
    header("Location: admin.php"); 
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
