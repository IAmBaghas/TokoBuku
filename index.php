<!-- Github.com/IAmBaghas -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$search = isset($_POST['search']) ? $_POST['search'] : '';
$sql = "SELECT ID_Buku, Kategori, Nama_Buku, Harga, Stok, Penerbit FROM buku WHERE Nama_Buku LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
  <head>
      <title>Toko Buku</title>
      <style>
        body {
          font-family: arial, sans-serif;
          padding: 0px;
          margin: 0px;
        }
        table, th, td {
          border: 1px solid black;
          border-collapse: collapse;
        }
        p {
          padding-left: 5px;
          padding-right: 5px;
        }
        .navbar {
          height: 40px;
          padding: 10px;
          display: flex;
          justify-content: space-between;
          align-items: center;
          background-color: slategray;
        }

        .navbar div {
          display: flex;
          align-items: center;
        }

        .navbar div form {
          margin-left: 10px;
        }
        a {
          text-decoration: none;
          color: black;
          padding-top: 6px;
        }
        a:hover {
          color: white;
        }
        .booklist {
          padding: 10px;
        }
      </style>
  </head>
  <body>
      <nav>
        <div class="navbar">
          <div>
            <span style='font-weight: bold; font-size: 24px; padding-right: 10px;'>Toko Buku</span>
            <div class="navlist">
              <a href="index.php">Menu</a> |
              <a href="pengadaan.php">Pengadaan</a> |
              <a href="admin.php">Admin</a>
            </div>
          </div>
          <div>
            <form action="index.php" method="post">
            <input type="text" name="search" placeholder="Cari buku...">
            <input type="submit" value="Cari">
            </form>
            <form action="index.php" method="post">
                <input type="submit" value="Semua buku...">
            </form>
          </div>
        </div>
      </nav>
      
      <div class="booklist">
      <h2>Daftar Buku :</h2>
      <?php
      if ($result->num_rows > 0) {
        echo "<table style='width: 100%'>";
        echo "<tr>";
        echo "<th>ID Buku</th>";
        echo "<th>Kategori</th>";
        echo "<th>Nama Buku</th>";
        echo "<th>Harga</th>";
        echo "<th>Stok</th>";
        echo "<th>Penerbit</th>";
        echo "</tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td><p style='text-align: center;'>" . $row["ID_Buku"]. "</p></td>";
          echo "<td><p style='text-align: center;'>" . $row["Kategori"]. "</p></td>";
          echo "<td><p>" . $row["Nama_Buku"]. "</p></td>";
          echo "<td><p style='text-align: center;'>Rp " . $row["Harga"]. "</p></td>";
          echo "<td><p style='text-align: center;'>" . $row["Stok"]. "</p></td>";
          echo "<td><p>" . $row["Penerbit"]. "</p></td>";
          echo "</tr>";
          // echo "<hr>";
        }
        echo "</table>";
      } else {
        echo "No books found.";
      }
      $conn->close();
      ?>
      </div>
  </body>
</html>
