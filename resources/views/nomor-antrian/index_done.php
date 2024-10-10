<?php
session_start(); // Mulai session

// Koneksi ke database
require_once "../connection.php";

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika belum login
    header("Location: index.php");
    exit();
}

// Ambil email dari session
$username = $_SESSION['username'];

// Ambil data user berdasarkan email
$query = mysqli_query($mysqli, "SELECT * FROM tbl_user WHERE username='$username'")
                               or die('Ada kesalahan pada query: ' . mysqli_error($mysqli));

// Cek jika data ditemukan
if (mysqli_num_rows($query) > 0) {
    $data_user = mysqli_fetch_assoc($query);

} else {
    echo "Data user tidak ditemukan.";
}

?>

<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="ahmadthoba">

  <!-- Title -->
  <title>Puskesmas Tahunan</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
  
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">

<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   = 'db_antrian';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    error_log("Koneksi gagal: " . $conn->connect_error);
    exit;
}
  
    $sql = "SELECT no_antrian FROM tbl_antrian ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $no_antrian = $row['no_antrian']; // Validate and cast to integer

        $token  = '_H8L#wa-A6mkMbYVQjJB';
        $target = '6288224177471';

        $curl = curl_init();
        $options = [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $target,
                'message' => "Nomor Antrian Anda, $no_antrian",
            ],
            CURLOPT_HTTPHEADER => [
                "Authorization: $token"
            ],
        ];
        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            error_log("cURL error: $error");
        } else {
            // Parse the response to ensure the message was sent successfully
            // ...
        }
    } else {
        echo "Nomor antrian tidak ditemukan.";
    }
// } else {
//     echo "User  tidak ditemukan.";
// }

$conn->close();
?>


<div class="container pt-4">
      <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <i class="bi-people-fill text-success me-3 fs-3"></i>
          <h1 class="h5 pt-2">Nomor Antrian</h1>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index_done.php"><i class="bi-house-fill text-success"></i></a></li>
              <!-- <li class="breadcrumb-item" aria-current="page">Dashboard</li> -->
              <li class="breadcrumb-item" aria-current="page">Antrian</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="row justify-content-lg-center">
        <div class="col-lg-5 mb-4">

          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian</h1>
            </div>
          </div>

          <div class="card border-0 shadow-sm">
            <div class="card-body text-center d-grid p-5">
              <div class="border border-success rounded-2 py-2 mb-5">
                <h3 class="pt-4">NOMOR ANTRIAN ANDA</h3>
                <!-- menampilkan informasi jumlah antrian -->
                <h1 id="antrian" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </main>

  <!-- Footer
  <footer class="footer mt-auto py-4">
    <div class="container"> -->
      <!-- copyright -->
      <!-- <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2021 - <a href="https://www.indrasatya.com/" target="_blank" class="text-danger text-decoration-none">www.indrasatya.com</a>. All rights reserved.
      </div>
    </div>
  </footer> -->

  <!-- <a href="../welcome.php" class="btn btn-success rounded-pill px-4 py-2">
    LOGOUT <i class="bi-chevron-right ms-2"></i> -->

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian').load('../nomor-antrian/get_antrian.php');

      // proses insert data
      $('#insert').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST
          url: 'insert.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian').load('../nomor-antrian/get_antrian.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>
</body>

</html>