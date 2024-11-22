<?php
//  require 'function.php';
require('function.php');
$kelas = 'XI RPL 2';
$query = "SELECT * FROM data_siswa WHERE kelas = '$kelas'";
$box = query($query);
// var_dump($_SERVER['DOCUMENT_ROOT']);
// var_dump($box);die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<!-- Remixicons -->
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
  />
  <!-- css -->
  <link rel="stylesheet" href="style/prepCss.css?v=<?php echo time() ?>" />
  <link rel="stylesheet" href="style/styleFormAbsen.css?v=<?php echo time() ?>" />
<body>
    <h1 class="title-page">Absen Siswa XI RPL 2</h1>
    <div class="container-semua-hadir">
        <button class="semua_hadir">Semua Hadir</button>
    </div>
    <div class="container-form">
        <form action="" method="post">
            <table border="1" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Absen</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach($box as $item) : ?>
                    <input type="hidden" value="<?=$item['nis'];?>" name="nis[]">
                    <input type="hidden" value="<?=$item['kelas'];?>" name="kelas">
                    <tr>
                        <td class="no"><?=$i;?></td>
                        <td class="nis"><?=$item['nis'];?></td>
                        <td class="nama"><?=$item['nama'];?></td>
                        <td class="absen">
                            <div class="list-absen-item">
                                <input type="radio" class="hadir"name="data_<?=$i;?>" value="H" for="H" required>
                                <label for="H">Hadir</label>
                            </div>
                            
                            <div class="list-absen-item">
                                <input type="radio" name="data_<?=$i;?>" value="TH" for="TH" required>
                                <label for="TH">Tidak Hadir</label>
                            </div>

                            <div class="list-absen-item">
                                <input type="radio" name="data_<?=$i;?>" value="S" for="S" required>
                                <label for="S">Sakit</label>
                            </div>

                            <div class="list-absen-item">
                                <input type="radio" name="data_<?=$i;?>" value="I" for="I" required>
                                <label for="I">Ijin</label>
                            </div>
                        </td>
                    </tr>
                    
                    <?php $i++; endforeach; ?>
            </table>
            <button name="submit" type="submit" class="submit">Submit</button>
        </form>

        <?php if(isset($_POST['submit'])) {
            // var_dump($conn);die;
            $niss = $_POST['nis'];
            $day = date('l');
            $date = date('d');
            $month = date('M');
            $year = date('Y');
            // var_dump($year);die;
            $absenStructure = [];
            foreach($_POST as $absenSiswa => $absen) {
                if(strpos($absenSiswa, 'data_') === 0) {
                $absenStructure[] = $absen;
                }
            }
            // print_r($absenStructure);

            $structuredData = [];
            foreach ($niss as $index => $nis) {
                if (isset($absenStructure[$index])) {
                    $structuredData[] = [
                        'id' => NULL,
                        'nis' => $nis,
                        'day' => $day,
                        'date' => $date,
                        'month' => $month,
                        'year' => $year,
                        'absen' => $absenStructure[$index],
                        'kelas' => $_POST['kelas']
                     ];
                }
            }
            // print_r($structuredData);die;
            goAbsen($structuredData);
        } ?>
    </div>
    <script src="main.js"></script>
</body>
</html>