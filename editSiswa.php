<?php 
    require 'function.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM data_siswa WHERE id = $id";
    $item = query($query)[0];
?>

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

.last-photo {
  display: flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
}

.last-photo-title {
  text-align:center;
  color:var(--dark-color);
  padding-block:2rem;
}

.last-photo img {
  width:50%;
  height:50%;
}
   </style>
  <link rel="stylesheet" href="style/styleFormSiswa.css?v=<?php echo time() ?>" />
  <body>
    <div class="container-siswa">
      <h1 class="data-siswa-title" id="data">Form Siswa</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <input type="hidden" name="id" value="<?= $item['id']; ?>">
          <input
            type="text"
            name="nama"
            id="nama"
            required
            placeholder="Nama"
            autocomplete="off"
            value="<?= $item['nama']; ?>"
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
            value="<?= $item['nis']; ?>"
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
            value="<?= $item['alamat']; ?>"
          />
        </div>

        <div class="jenis-kelamin-box">
          <input
            type="radio"
            name="jenis-kelamin"
            value="Laki-laki"
            id="laki-laki"
            <?php if($item['jenis_kelamin'] == "Laki-laki") {
                echo "checked";
            } ?>
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
            <?php if($item['jenis_kelamin'] == "Perempuan") {
                echo "checked";
            } ?>
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
            type="email"
            name="email"
            id="email"
            required
            placeholder="Email"
            autocomplete="off"
            value="<?= $item['email']; ?>"
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
            value="<?= $item['no_telepon']; ?>"
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
            value="<?= $item['kelas']; ?>"
          />
        </div>
        <div class="input-box">
          <input
            type="file"
            name="photo"
            id="kelas"
          />
        </div>
          <input
            type="hidden"
            name="photoLama"
            id="kelas"
            value="<?=$item['photo'];?>"
          />
          <button name="submit" type="submit" class="submit-btn">
            Ubah Data Siswa
        </button>
      </form>

      <div class="last-photo">
        <h1 class="last-photo-title">Last Photo Used</h1>
        <img src="style/photos/<?=$item['photo'];?>" alt="">
      </div>
    </div>
  </body>
  <?php 
  if(isset($_POST['submit'])) {
    if(changeSiswa($_POST) > 0) {
      echo "<script> alert('data berhasil diubah');
      location.href = 'homepage.php?page=dataSiswa';</script>";
  } else {
      echo "<script> alert('data gagal diubah');
      location.href = 'homepage.php?page=dataSiswa';</script>";
  } 
  }

?>
</html>
