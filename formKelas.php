<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Data Kelas</title>
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
      <h1 class="data-siswa-title" id="data">Tambah Data Kelas</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <input
            type="text"
            name="kode_kelas"
            id="nama"
            required
            placeholder="Kode Kelas"
            autocomplete="off"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="nama_kelas"
            id="nama_kelas"
            required
            placeholder="Nama Kelas"
            autocomplete="off"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="singkatan"
            id="singkatan"
            required
            placeholder="Singkatan"
            autocomplete="off"a
          />
        </div>

        
        <a href="#data"
          ><button name="submit" type="submit" class="submit-btn">
            Tambah Data Kelas
          </button></a
        >
      </form>
    </div>
  </body>
  <?php      require('function.php');
  if(isset($_POST['submit'])) {
    if(tambahKelas($_POST) > 0) {
      echo "<script> alert('data berhasil ditambahkan');
      location.href = 'homepage.php?page=dataKelas';</script>";
  } else {
      echo "<script> alert('data gagal ditambahkan');
      location.href = 'homepage.php?page=formKelas';</script>";
  } 
  }

?>
</html>