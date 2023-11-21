<!-- Github.com/IAmBaghas -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT ID_Buku, Kategori, Nama_Buku, Harga, Stok, Penerbit FROM buku";
$result = $conn->query($sql);

$sql5 = "SELECT ID_Penerbit, Nama, Alamat, Kota, Telepon FROM penerbit";
$resultPenerbit = $conn->query($sql5);

// Form Tambah Buku
if (isset($_POST['submit'])) {
  $ID_Buku = $_POST['ID_Buku'];
  $Kategori = $_POST['Kategori'];
  $Nama_Buku = $_POST['Nama_Buku'];
  $Harga = $_POST['Harga'];
  $Stok = $_POST['Stok'];
  $Penerbit = $_POST['Penerbit'];

  $sql2 = "INSERT INTO buku (ID_Buku, Kategori, Nama_Buku, Harga, Stok, Penerbit) VALUES ('$ID_Buku', '$Kategori', '$Nama_Buku', '$Harga', '$Stok', '$Penerbit')";

  if ($conn->query($sql2) === TRUE) {
    echo "Buku Berhasil Ditambahkan";
    sleep(2);
    header("Location: admin.php");
  } else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }
}

// Hapus Data Buku
if (isset($_POST['delete'])) {
  $ID_Buku = $_POST['ID_Buku'];

  $sql3 = "DELETE FROM buku WHERE ID_Buku = '$ID_Buku'";

  if ($conn->query($sql3) === TRUE) {   
    echo "Buku Dihapus";
    sleep(2);
    header("Location: admin.php");
  } else {
    echo "Error: " . $sql3 . "<br>" . $conn->connect_error;
  }
}

// Edit Data Buku
if (isset($_POST['edit'])) {
  $ID_Buku = $_POST['ID_Buku'];
  $Kategori = $_POST['Kategori'];
  $Nama_Buku = $_POST['Nama_Buku'];
  $Harga = $_POST['Harga'];
  $Stok = $_POST['Stok'];
  $Penerbit = $_POST['Penerbit'];

  $sql4 = "UPDATE buku SET Kategori = '$Kategori', Nama_Buku = '$Nama_Buku', Harga = '$Harga', Stok = '$Stok', Penerbit = '$Penerbit' WHERE ID_Buku = '$ID_Buku'";

  if ($conn->query($sql4) === TRUE) {
    echo "Buku Berhasil Diubah";
    sleep(2);
    header("Location: admin.php");
  } else {
    echo "Error: " . $sql4 . "<br>" . $conn->error;
  }
}

// Form Tambah Data Penerbit
if (isset($_POST['submitPenerbit'])) {
  $ID_Penerbit = $_POST['ID_Penerbit'];
  $Nama = $_POST['Nama'];
  $Alamat = $_POST['Alamat'];
  $Kota = $_POST['Kota'];
  $Telepon = $_POST['Telepon'];

  $sql6 = "INSERT INTO penerbit (ID_Penerbit, Nama, Alamat, Kota, Telepon) VALUES ('$ID_Penerbit', '$Nama', '$Alamat', '$Kota', '$Telepon')";

  if ($conn->query($sql6) === TRUE) {
    echo "Penerbit Berhasil Ditambahkan";
    sleep(2);
    header("Location: admin.php");
  } else {
    echo "Error: " . $sql6 . "<br>" . $conn->error;
  }
}

// Hapus Data Penerbit
if (isset($_POST['deletePenerbit'])) {
  $ID_Penerbit = $_POST['ID_Penerbit'];

  $sql = "DELETE FROM penerbit WHERE ID_Penerbit = '$ID_Penerbit'";

  if ($conn->query($sql) === TRUE) {   
    echo "Penerbit Dihapus";
    sleep(2);
    header("Location: admin.php");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->connect_error;
  }
}

// Edit Data Penerbit
if (isset($_POST['editPenerbit'])) {
  $ID_Penerbit = $_POST['ID_Penerbit'];
  $Nama = $_POST['Nama'];
  $Alamat = $_POST['Alamat'];
  $Kota = $_POST['Kota'];
  $Telepon = $_POST['Telepon'];

  $sql8 = "UPDATE penerbit SET Nama = '$Nama', Alamat = '$Alamat', Kota = '$Kota', Telepon = '$Telepon' WHERE ID_Penerbit = '$ID_Penerbit'";

  if ($conn->query($sql8) === TRUE) {
    echo "Penerbit Berhasil Diubah";
    sleep(2);
    header("Location: admin.php");
  } else {
    echo "Error: " . $sql8 . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Admin Page</title>
    <script>
        function showForm() {
            document.getElementById('form').style.display = 'block';
            document.getElementById('main').style.display = 'none';
        }

        function hideForm() {
            document.getElementById('form').style.display = 'none';
            document.getElementById('main').style.display = 'block';
        }

        function showEditForm(ID_Buku, Kategori, Nama_Buku, Harga, Stok, Penerbit) {
            document.getElementById('editForm').style.display = 'block';
            document.getElementById('main').style.display = 'none';
            document.getElementById('ID_Buku').value = ID_Buku;
            document.getElementById('Kategori').value = Kategori;
            document.getElementById('Nama_Buku').value = Nama_Buku;
            document.getElementById('Harga').value = Harga;
            document.getElementById('Stok').value = Stok;
            document.getElementById('Penerbit').value = Penerbit;
        }

        function hideEditForm() {
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('main').style.display = 'block';
        }

        function showPenerbit() {
          document.getElementById('penerbit').style.display = 'block';
          document.getElementById('main').style.display = 'none';
        }

        function hidePenerbit() {
          document.getElementById('penerbit').style.display = 'none';
          document.getElementById('main').style.display = 'block';
        }

        function showEditPenerbit(ID_Penerbit, Nama, Alamat, Kota, Telepon) {
          document.getElementById('editPenerbit').style.display = 'block';
          document.getElementById('main').style.display = 'none';
          document.getElementById('ID_Penerbit').value = ID_Penerbit;
          document.getElementById('Nama').value = Nama;
          document.getElementById('Alamat').value = Alamat;
          document.getElementById('Kota').value = Kota;
          document.getElementById('Telepon').value = Telepon;
        }

        function hideEditPenerbit() {
          document.getElementById('editPenerbit').style.display = 'none';
          document.getElementById('main').style.display = 'block';
        }

        function delayRedirect() {
            setTimeout(function() {
                window.location.href = 'admin.php';
            }, 2000);
        }
    </script>
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
        .booklist, .listPenerbit {
          padding: 10px;
        }
        .hapus a:hover {
          color: slategray;
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
    
    <div id="main">

      <!-- List Buku -->
      <div class="booklist">
        <h1>Halaman Admin</h1>
        <h2>Daftar Buku :</h2>
        <button onclick="showForm()" style='margin-bottom: 5px;'>Tambah Buku</button>
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
            echo "<th></th>";
            echo "<th></th>";
            echo "</tr>";
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td><p style='text-align: center;'>" . $row["ID_Buku"]. "</p></td>";
              echo "<td><p style='text-align: center;'>" . $row["Kategori"]. "</p></td>";
              echo "<td><p>" . $row["Nama_Buku"]. "</p></td>";
              echo "<td><p style='text-align: center;'>Rp " . $row["Harga"]. "</p></td>";
              echo "<td><p style='text-align: center;'>" . $row["Stok"]. "</p></td>";
              echo "<td><p>" . $row["Penerbit"]. "</p></td>";

              // Delete Button
              echo "<td style='text-align: center;'>";
              echo "<form action='delete.php' method='get'>";
              echo "<input type='hidden' name='idBuku' value='".$row["ID_Buku"]."'>";
              echo "<button type='submit'>Delete</button>";
              echo "</form>";
              echo "</td>";

              // Edit Button
              echo "<td style='text-align: center;'><button onclick='showEditForm(\"".$row["ID_Buku"]."\", \"".$row["Kategori"]."\", \"".$row["Nama_Buku"]."\", \"".$row["Harga"]."\", \"".$row["Stok"]."\", \"".$row["Penerbit"]."\")'>Edit</button></td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo "Tidak ada data ditemukan.";
          }
          ?>
        </div>

        <hr/>

        <!-- List Penerbit -->
        <div class='listPenerbit'>
          <h2>Daftar Penerbit :</h2>
          <button onclick="showPenerbit()" style='margin-bottom: 5px;'>Tambah Data Penerbit</button>
          <?php
          if ($resultPenerbit->num_rows > 0) {
            echo "<table style='width: 100%'>";
            echo "<tr>";
            echo "<th>ID Penerbit</th>";
            echo "<th>Nama Penerbit</th>";
            echo "<th>Alamat</th>";
            echo "<th>Kota</th>";
            echo "<th>Telepon</th>";
            echo "<th></th>";
            echo "<th></th>";
            echo "</tr>";
            while($penerbit = $resultPenerbit->fetch_assoc()) {
              echo "<tr>";
              echo "<td><p style='text-align: center;'>" . $penerbit["ID_Penerbit"]. "</p></td>";
              echo "<td><p>" . $penerbit["Nama"]. "</p></td>";
              echo "<td><p>" . $penerbit["Alamat"]. "</p></td>";
              echo "<td><p style='text-align: center;'>" . $penerbit["Kota"]. "</p></td>";
              echo "<td><p style='text-align: center;'>" . $penerbit["Telepon"]. "</p></td>";

              // Delete Button
              echo "<td style='text-align: center;'>";
              echo "<form action='delete.php' method='get'>";
              echo "<input type='hidden' name='idPenerbit' value='".$penerbit["ID_Penerbit"]."'>";
              echo "<button type='submit'>Delete</button>";
              echo "</form>";
              echo "</td>";

              // Edit Button
              echo "<td style='text-align: center;'><button onclick='showEditPenerbit(\"".$penerbit["ID_Penerbit"]."\", \"".$penerbit["Nama"]."\", \"".$penerbit["Alamat"]."\", \"".$penerbit["Kota"]."\", \"".$penerbit["Telepon"]."\")'>Edit</button></td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo "Tidak ada data ditemukan.";
          }
          ?>
        </div>
    </div>

    <!-- Input Data Buku -->
    <div id="form" style="display: none; padding: 10px;">
        <h2>Masukan Detail Buku :</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
          <table>
            <tr>
              <td style='width: 15%; padding: 5px;'>ID Buku</td> 
              <td style='width: 25%'><input type="text" name="ID_Buku" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Kategori</td> 
              <td style='width: 25%'><input type="text" name="Kategori" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Nama Buku</td> 
              <td style='width: 25%'><input type="text" name="Nama_Buku" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Harga</td> 
              <td style='width: 25%'><input type="text" name="Harga" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Stok</td> 
              <td style='width: 25%'><input type="text" name="Stok" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Penerbit</td> 
              <td style='width: 25%'><input type="text" name="Penerbit" style='width: 98%;'></td>
            </tr>
          </table>
          <br>
            <input type="submit" name="submit" value="Tambahkan">
            <button type="button" onclick="hideForm()">Cancel</button>
        </form>
    </div>

    <!-- Edit Data Buku -->
    <div id="editForm" style="display: none; padding: 10px;">
        <h2>Edit Detail Buku :</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
          <table>
            <tr>
              <td style='width: 15%; padding: 5px;'>ID Buku</td> 
              <td style='width: 25%'><input type='text' id="ID_Buku" name='ID_Buku' style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Kategori</td> 
              <td style='width: 25%'><input type="text" id="Kategori" name="Kategori" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Nama Buku</td> 
              <td style='width: 25%'><input type="text" id="Nama_Buku" name="Nama_Buku" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Harga</td> 
              <td style='width: 25%'><input type="text" id="Harga" name="Harga" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Stok</td> 
              <td style='width: 25%'><input type="text" id="Stok" name="Stok" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Penerbit</td> 
              <td style='width: 25%'><input type="text" id="Penerbit" name="Penerbit" style='width: 98%;'></td>
            </tr>
          </table>
          <br>
            <input type="submit" name="edit" value="Edit">
            <button type="button" onclick="hideEditForm()">Cancel</button>
        </form>
    </div>


    <!-- Input Penerbit -->
    <div id="penerbit" style="display: none; padding: 10px;">
        <h2>Masukan Detail Penerbit :</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
          <table>
            <tr>
              <td style='width: 15%; padding: 5px;'>ID Penerbit</td> 
              <td style='width: 25%'><input type="text" name="ID_Penerbit" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Nama Penerbit</td> 
              <td style='width: 25%'><input type="text" name="Nama" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Alamat</td> 
              <td style='width: 25%'><input type="text" name="Alamat" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Kota</td> 
              <td style='width: 25%'><input type="text" name="Kota" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Telepon</td> 
              <td style='width: 25%'><input type="text" name="Telepon" style='width: 98%;'></td>
            </tr>
          </table>
          <br>
            <input type="submit" name="submitPenerbit" value="Tambahkan">
            <button type="button" onclick="hidePenerbit()">Cancel</button>
        </form>
    </div>

    <!-- Edit Data Penerbit -->
    <div id="editPenerbit" style="display: none; padding: 10px;">
        <h2>Edit Detail Buku :</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
          <table>
            <tr>
              <td style='width: 15%; padding: 5px;'>ID Penerbit</td> 
              <td style='width: 25%'><input type='text' id="ID_Penerbit" name='ID_Penerbit' style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Nama Penerbit</td> 
              <td style='width: 25%'><input type="text" id="Nama" name="Nama" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Alamat</td> 
              <td style='width: 25%'><input type="text" id="Alamat" name="Alamat" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Kota</td> 
              <td style='width: 25%'><input type="text" id="Kota" name="Kota" style='width: 98%;'></td>
            </tr>
            <tr>
              <td style='width: 15%; padding: 5px;'>Telepon</td> 
              <td style='width: 25%'><input type="text" id="Telepon" name="Telepon" style='width: 98%;'></td>
            </tr>
          </table>
          <br>
            <input type="submit" name="editPenerbit" value="Edit">
            <button type="button" onclick="hideEditPenerbit()">Cancel</button>
        </form>
    </div>

  </body>
</html>
