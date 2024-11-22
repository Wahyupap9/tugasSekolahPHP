<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Remixicons -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Css -->
    <link rel="stylesheet" href="style/prepCss.css?v=<?php echo time() ?>" />
    <link rel="stylesheet" href="style/style.css?v=<?php echo time() ?>" />
  </head>
  <body>
    <style>
      .nav-homepage {
        overflow:scroll;
      }
      ::-webkit-scrollbar {
        display:none;
      }
      scrollbar {
        display:none;
      }
    </style>
    <nav class="nav-homepage">
      <h1 class="title">Data Wira</h1>

      <!-- Data -->
      <h1 class="title-list">Data</h1>
      <ul class="list">
        <div class="list-item">
          <i class="ri-user-fill"></i>
          <a href="?page=dataSiswa">
            <li>Data Siswa</li>
          </a>
        </div>
        <div class="list-item">
          <i class="ri-reactjs-line"></i>
          <a href="?page=dataJurusan">
            <li>Data Jurusan</li>
          </a>
        </div>
        <div class="list-item">
          <i class="ri-user-2-fill"></i>
          <a href="?page=dataGuru">
            <li>Data Guru</li>
          </a>
        </div>
        <div class="list-item">
          <i class="ri-school-fill"></i>
          <a href="?page=dataKelas">
            <li>Data Kelas</li>
          </a>
        </div>
      </ul>

      <!-- Tambah -->
      <h1 class="title-list">Tambah</h1>
      <ul class="list">
        <div class="list-item">
          <i class="ri-user-fill"></i>
          <a href="?page=formSiswa">
            <li>Tambah Data Siswa</li>
          </a>
        </div>
        <div class="list-item">
          <i class="ri-reactjs-line"></i>
          <a href="?page=formJurusan">
            <li>Tambah Data Jurusan</li>
          </a>
        </div>
        <div class="list-item">
          <i class="ri-user-2-fill"></i>
          <a href="?page=formGuru">
            <li>Tambah Data Guru</li>
          </a>
        </div>
        <div class="list-item">
          <i class="ri-school-fill"></i>
          <a href="?page=formKelas">
            <li>Tambah Data Kelas</li>
          </a>
        </div>
      </ul>

      <h1 class="title-list">Absen</h1>
      <ul>
        <div class="list-item">
        <i class="ri-calendar-check-fill"></i>
            <a href="?page=absenXIRPL1&kelas=XI RPL 1">
              <li>XI RPL 1</li>
            </a>
      </div>
        <div class="list-item">
        <i class="ri-calendar-check-fill"></i>
            <a href="?page=absenXIRPL2&kelas=XI RPL 2">
              <li>XI RPL 2</li>
            </a>
        </ul>
      </div>
    </nav>

    <?php
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    switch($page){
      case 'dataSiswa':
        include 'dataSiswa.php';
        break;
      case 'dataGuru':
        include 'dataGuru.php';
        break;
      case 'dataJurusan':
        include 'dataJurusan.php';
        break;
      case 'dataKelas':
        include 'dataKelas.php';
        break;
      case 'formSiswa':
        include 'formSiswa.php';
        break;
      case 'formGuru':
        include 'formGuru.php';
        break;
      case 'formJurusan':
        include 'formJurusan.php';
        break;
      case 'formKelas':
        include 'formKelas.php';
        break;
      case 'editKelas':
        include 'editSiswa.php';
        break;
      case 'absenXIRPL1':
        include 'absenXIRPL1.php';
        break;
      case 'absenXIRPL2':
        include 'absenXIRPL2.php';
        break;
      case 'formAbsenXIRPL1':
        include 'formAbsenXIRPL1.php';
        break;
      case 'formAbsenXIRPL2':
        include 'formAbsenXIRPL2.php';
        break;

      default:
        include 'dataSiswa.php';
        break;
    }}
    else {
      include 'dataSiswa.php';  
    } ?>
  </body>
</html>
