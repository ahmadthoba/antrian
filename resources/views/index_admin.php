<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <!-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Title -->
  <title>Puskesmas Tahunan</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

  <!-- Custom Style -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
        <!-- judul halaman -->
        <div class="d-flex align-items-center me-md-auto">
          <i class="bi-people-fill text-success me-3 fs-3"></i>
          <h1 class="h5 pt-2">Admin</h1>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <!-- <li class="breadcrumb-item"><a href="../index_admin.php"><i class="bi-house-fill text-success"></i></a></li> -->
              <li class="breadcrumb-item" aria-current="page"><a href="../register_admin.php" class="text-warning" style="font-weight:600;text-decoration:none;">Register Here</a></li>
              <!-- <li class="breadcrumb-item" aria-current="page">Antrian</li> -->
            </ol>
          </nav>
        </div>
      </div>

      <!-- tampilkan pesan selamat datang -->
      <!-- <div class="alert alert-light d-flex align-items-center mb-5" role="alert">
        <i class="bi-info-circle text-success me-3 fs-3"></i>
        <div>
          <strong>Selamat Datang, ADMIN</strong>. Silahkan pilih halaman yang ingin ditampilkan.
        </div>
      </div> -->

        <!-- link halaman panggilan antrian -->
        <div class="col-lg-6 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-body p-5">
              <div class="feature-icon-1 bg-success bg-gradient mb-4">
                <i class="bi-mic"></i>
              </div>
              <h3>Panggilan Antrian</h3>
              <p class="mb-4">Halaman Panggilan Antrian digunakan petugas puskesmass untuk memanggil antrian pasien.</p>
              <a href="panggilan-antrian/index" class="btn btn-success rounded-pill px-4 py-2">
              <!-- <a href="indexx.php" class="btn btn-success rounded-pill px-4 py-2"> -->
                Tampilkan <i class="bi-chevron-right ms-2"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container-fluid">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        <!-- &copy; 2021 - <a href="" target="_blank" class="text-danger text-decoration-none">ahmadthoba</a>. All rights reserved. -->
      </div>
    </div>
  </footer>

  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

<a href="welcome.php" class="btn btn-success rounded-pill px-4 py-2">
LOGOUT <i class="bi-chevron-right ms-2"></i>

</html>