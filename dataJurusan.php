<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Jurusan</title>
    <!-- Remixicons -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- css -->
    <link rel="stylesheet" href="style/prepCss.css?v=<?php echo time() ?>" />
    <link rel="stylesheet" href="style/styleDataSiswa.css?v=<?php echo time() ?>">

    <style>
        .container-data-jurusan {
            width:70%;
            margin: auto;
        }
        table {
            width:100%;
            height:100%;
            overflow:hidden;
            border-radius:.5rem
        }

        td,th {
            padding:.5rem;
        }

        td.button {
            display: flex;
            height:100%;
            justify-content:space-evenly;
            font-size:1.4rem
        }
        td.button a:first-child i {
            color:yellowgreen;
        }
        td.button a:nth-child(2) i {
            color:red;
        }
    </style>

    <!-- php query -->
    <?php
    $data = 'dataJurusan';
    require('function.php');
      $query = "SELECT * FROM data_jurusan";
      $box = query($query);
      
      if(isset($_POST['search'])) {
        $box = searchSiswa($_POST['keyword']);
      }
      ?>

  </head>
  <body>
    <h1 class="title-data">Data Jurusan</h1>
    <!-- search -->
    <form action="" method="POST">
      <input type="text" name="keyword" placeholder="Search" autocomplete="off">
      <button type="submit" name="search" class="submit">Search</button>
    </form>

    <!-- Data -->
    <div class="container-data-jurusan">
        <table border='1' cellspacing="0" cellpadding="10">
            <tr>
                <th>Kode Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Singkatan</th>
                <th>Action</th>
            </tr>
            <?php foreach($box as $item) :?>
                <tr>
                    <td><?=$item['kode_jurusan'];?></td>
                    <td><?=$item['nama_jurusan'];?></td>
                    <td><?=$item['singkatan'];?></td>
                    <td class="button"><a href="editJurusan.php?id=<?=$item['id'];?>"><i class="ri-edit-2-line"></i></a>
                                        <a href="delete.php?id=<?=$item['id']; ?>&data=data_jurusan"><i class="ri-delete-bin-fill"></i></td></a>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
  </body>
</html>
