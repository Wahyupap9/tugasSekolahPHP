<?php 
    require 'function.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM data_kelas WHERE id = $id";
    $item = query($query)[0];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data Kelas</title>
  </head>
  <!-- Remixicons -->
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
  />
  <!-- css -->
   <style>
    /* ================================= Prep ================================= */
/* Fonts */
@import url("https://fonts.googleapis.com/css2?family=Gorditas:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
:root {
  --primary-color: #67e8f9;
  --dark-color: #083344;
  --light-color: #ecfeff;
  --blue: #22d3ee;

  --poppins: "Poppins", sans-serif;
  --gorditas: "Gorditas", serif;
}

html {
  scroll-behavior: smooth;
}

body {
  background-color: var(--light-color);
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  color: inherit;
  font-family: var(--poppins);
}

h1 {
  font-family: var(--gorditas);
}

a {
  text-decoration: none;
}

ul {
  list-style-type: none;
}

   </style>
  <link rel="stylesheet" href="style/styleFormSiswa.css?v=<?php echo time() ?>" />
  <body>
    <div class="container-siswa">
      <h1 class="data-siswa-title" id="data">Ubah Data Kelas</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-box">
          <input
            type="text"
            name="kode_kelas"
            id="nama"
            required
            placeholder="Kode Kelas"
            autocomplete="off"
            value="<?=$item['kode_kelas'];?>"
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
            value="<?=$item['nama_kelas'];?>"
          />
        </div>

        <div class="input-box">
          <input
            type="text"
            name="singkatan"
            id="singkatan"
            required
            placeholder="Singkatan"
            autocomplete="off"
            value="<?=$item['singkatan'];?>"
          />
        </div>

        
        <a href="#data"
          ><button name="submit" type="submit" class="submit-btn">
            Ubah Data Kelas
          </button></a
        >
      </form>
    </div>
  </body>
  <?php 
  if(isset($_POST['submit'])) {
    if(changeKelas($_POST) > 0) {
      echo "<script> alert('data berhasil diubah');
      location.href = 'homepage.php?page=dataKelas';</script>";
  } else {
      echo "<script> alert('data gagal diubah');
      location.href = 'homepage.php?page=dataKelas';</script>";
  } 
  }

?>
</html>
