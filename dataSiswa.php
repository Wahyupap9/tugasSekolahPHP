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
    <!-- css -->
    <link rel="stylesheet" href="style/prepCss.css?v=<?php echo time() ?>" />
    <link rel="stylesheet" href="style/styleDataSiswa.css?v=<?php echo time() ?>">

    <!-- php query -->
    <?php
     require('function.php');
      $query = "SELECT * FROM data_siswa";
      $box = query($query);
      
      if(isset($_POST['search'])) {
        $box = searchSiswa($_POST['keyword']);
      }
      ?>

  </head>
  <body>
    <h1 class="title-data">Data Siswa</h1>
    <!-- search -->
    <form action="" method="POST">
      <input type="text" name="keyword" placeholder="Search" autocomplete="off">
      <button type="submit" name="search" class="submit">Search</button>
    </form>
    <!-- Pop up Details -->
    
    <?php if(isset($_GET['id']) && isset($_GET['page']) == 'dataSiswa') : 
        $id = $_GET['id'];
        $queryPopup = "SELECT * FROM data_siswa WHERE id = $id";
        $showDetails = query($queryPopup)[0]; ?>
        <div class="overlay dNone">
         <div class="popup">
          <div class="close-button"> <a href="?page='dataSiswa'"><i class="ri-close-large-line"></i></a></div>
          <img src="style/photos/<?= $showDetails['photo']; ?>" alt="">
          <div class="details">
            <table>
              <tr>
                <th>Nama</th>
                <th>:</th>
                <td><?=$showDetails['nama']; ?></td>
              </tr>
              <tr>
                <th>NIS</th>
                <th>:</th>
                <td><?=$showDetails['nis']; ?></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?=$showDetails['alamat']; ?></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <th>:</th>
                <td><?=$showDetails['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                <th>Email</th>
                <th>:</th>
                <td><?=$showDetails['email']; ?></td>
              </tr>
              <tr>
                <th>No Telepon</th>
                <th>:</th>
                <td><?= $showDetails['no_telepon']; ?></td>
              </tr>
            </table>
          </div>
        </div>
       </div>
      <?php endif; ?>

    <!-- Data -->
    <div class="container-data">
      <?php foreach ($box as $item) : ?>
        <div class="item <?php if($item['jenis_kelamin'] === "Perempuan") {
          echo "perempuan";} else {echo "laki-laki";} ?>">
          <div class="buttons">
            <a href="editSiswa.php?id=<?= $item['id']; ?>"><i class="ri-edit-2-fill"></i></a>
            <a href="delete.php?id=<?= $item['id']; ?>&data=data_siswa&page=dataSiswa"><i class="ri-delete-bin-fill"></i></a>
          </div>
          <img src="style/photos/<?= $item['photo']; ?>" alt="">
          <div class="text">
            <h1 class="nama"><?= $item['nama']; ?></h1>
            <p class="kelas"><?= $item['kelas']; ?></p>
          </div>
          <a href="?id=<?= $item['id']; ?>&page='dataSiswa"><button class="showDetails">Detail</button></a>
        </div>

      <?php endforeach; ?>
    </div>
  </body>
</html>
