<?php
// Pengecekan ajax request untuk mencegah direct access file
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // Panggil file "database.php" untuk koneksi ke database
  require_once "../connection.php";

    // Ambil tanggal sekarang
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

    // Ambil waktu sekarang
    $waktu = gmdate("Y-m-d H:i:s", time() + 60 * 60 * 7);

    // Membuat "no_antrian"
    // Sql statement untuk menampilkan data "no_antrian" terakhir pada tabel "tbl_antrian" berdasarkan "tanggal"
    $query = mysqli_query($mysqli, "SELECT max(no_antrian) as nomor FROM tbl_antrian WHERE tanggal='$tanggal'")
              or die('Ada kesalahan pada query tampil data: ' . mysqli_error($mysqli));

    // Ambil jumlah baris data hasil query
    $rows = mysqli_num_rows($query);

    // Cek hasil query
    // Jika "no_antrian" sudah ada
    if ($rows <> 0) {
      // Ambil data hasil query
      $data = mysqli_fetch_assoc($query);
      // "no_antrian" = "no_antrian" yang terakhir + 1
      $no_antrian = $data['nomor'] + 1;
    }
    // Jika "no_antrian" belum ada
    else {
      // "no_antrian" = 1
      $no_antrian = 1;
    }

    // Sql statement untuk insert data ke tabel "tbl_antrian"
    $insert = mysqli_query($mysqli, "INSERT INTO tbl_antrian (waktu, tanggal, no_antrian) 
                                     VALUES ('$waktu', '$tanggal', '$no_antrian')")
                                     or die('Ada kesalahan pada query insert: ' . mysqli_error($mysqli));

    // Cek query
    // Jika proses insert berhasil
    if ($insert) {
      // Tampilkan pesan sukses insert data
      echo "Sukses";
    }
  } else {
    // Tampilkan pesan jika user tidak ditemukan
    echo "User  tidak ditemukan";
  }
?>