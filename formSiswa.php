<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <!-- Remixicons -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
  />
  <!-- css -->
  <link rel="stylesheet" href="style/prepCss.css?v=<?php echo time() ?>" />
  <link rel="stylesheet" href="style/styleFormSiswa.css?v=<?php echo time() ?>" />
  <body>
    <div class="container-siswa">
      <h1 class="data-siswa-title" id="data">Form Siswa</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <input
            type="text"
            name="nama"
            id="nama"
            required
            placeholder="Nama"
            autocomplete="off"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="nis"
            id="nis"
            required
            placeholder="NIS"
            autocomplete="off"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="alamat"
            id="alamat"
            required
            placeholder="Alamat"
            autocomplete="off"
          />
        </div>

        <div class="jenis-kelamin-box">
          <input
            type="radio"
            name="jenis-kelamin"
            value="Laki-laki"
            id="laki-laki"
          />
          <label for="laki-laki">
            <div class="label-box laki-laki">
              <div class="label-box-logo"><i class="ri-men-line"></i></div>
              <div class="label-box-title"><p>Laki-laki</p></div>
            </div></label
          >
          <input
            type="radio"
            name="jenis-kelamin"
            value="Perempuan"
            id="perempuan"
          />
          <label for="perempuan">
            <div class="label-box perempuan">
              <div class="label-box-logo"><i class="ri-women-line"></i></div>
              <div class="label-box-title"><p>Perempuan</p></div>
            </div></label
          ><br />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="email"
            id="email"
            required
            placeholder="Email"
            autocomplete="off"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="no-telepon"
            id="no-telepon"
            required
            placeholder="No Telepon"
            autocomplete="off"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="kelas"
            id="kelas"
            required
            placeholder="Kelas"
            autocomplete="off"
          />
        </div>
        <div class="input-box">
        <input class="custom-file-input" type="file" name="photo"></div>
        <a href="#data"
          ><button name="submit" type="submit" class="submit-btn">
            Tambah Data Siswa
          </button></a
        >
      </form>
    </div>
  </body>
  <?php      require('function.php');
  if(isset($_POST['submit'])) {
    if(tambahSiswa($_POST) > 0) {
      echo "<script> alert('data berhasil ditambahkan');
      location.href = 'homepage.php?page=dataSiswa';</script>";
  } else {
      echo "<script> alert('data gagal ditambahkan');
      location.href = 'homepage.php?page=dataSiswa';</script>";
  } 
  }

?>
</html>
