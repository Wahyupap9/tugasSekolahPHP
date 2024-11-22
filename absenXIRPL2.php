<?php      require('function.php');
$kelas = $_GET['kelas'];
$query = "SELECT * FROM absen WHERE kelas = '$kelas'";
// var_dump($kelas);
$box = query($query);
// var_dump($box);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen XI RPL 1</title>
</head>
<!-- Remixicons -->
<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
  />
  <!-- css -->
  <link rel="stylesheet" href="style/prepCss.css?v=<?php echo time() ?>" />
  <link rel="stylesheet" href="style/styleabsen.css?v=<?php echo time() ?>" />
<body>
    <h1 class="title-data">XI RPL 1</h1>
    <div class="absen-button-container">
        <a href="?page=formAbsenXIRPL2"><button class="absen">Absen</button></a>
    </div>

        <form action="" method="post">
            <div class="search-container">
            <input type="text" name="nis" placeholder="NIS" class="nis">
            
            <select name="day" class="day" id="">
                <option value="">Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Monday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <select name="date" class="date" id="">
                <option value="">Date</option>
            <?php
            for ($i=1; $i<=31; $i++) :?>    
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php
    endfor;
?></select>
    <select name="month" class="month" onchange="show_month()">
        <option value=''>Month</option>
        <option value='Jan'>January</option>
        <option value='Feb'>February</option>
        <option value='Mar'>March</option>
        <option value='Apr'>April</option>
        <option value='May'>May</option>
        <option value='Jun'>June</option>
        <option value='Jul'>July</option>
        <option value='Aug'>August</option>
        <option value='Sep'>September</option>
        <option value='ct'>October</option>
        <option value='Nov'>November</option>
        <option value='Dec'>December</option>
    </select> 
            <select name="year" class="year" id="">
                <option value="">Year</option>
                <?php for($i = 2000; $i <= date('Y'); $i++) : ?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php endfor; ?>
            </select>
            <select name="absen" class="absen" id="">
                <option value="">Absen</option>
                <option value="h">Hadir</option>
                <option value="t">Tidak Hadir</option>
                <option value="s">Sakit</option>
                <option value="i">Ijin</option>
            </select>
            
        </div>
        <button type="submit" class="submit" name="submit">Search</button>
    </form>
    <?php if(isset($_POST['submit'])) {
    $box = searchAbsen($_POST);
    // var_dump($box);die;
    
}?>

    <table border="1" cellspacing="0">
        <tr>
            <th class="id">ID</th>
            <th class="nis">NIS</th>
            <th class="nama">Nama</th>
            <th class="tanggal">Tanggal</th>
            <th class="absen">Absen</th>
        </tr>
        <?php foreach($box as $item) : ?>
            <?php $tanggal = "";
                    if($item['day'] !== "") {
                        $tanggal .= $item['day'] . " ";
                    }
                    if($item['date'] !== "") {
                        $tanggal .= $item['date'] . " ";
                    }
                    if($item['month'] !== "") {
                        $tanggal .= $item['month'] . " ";
                    }
                    if($item['year'] !== "") {
                        $tanggal .= $item['year'];
                    }
            ?>
            <tr>
                <td><?= $item['id']?></td>
                <td><?= $item['nis']?></td>
                <td>
                    <?php $nis = $item['nis'];
                    $result = mysqli_query($conn, "SELECT * FROM data_siswa WHERE nis = $nis");
                    echo mysqli_fetch_assoc($result)['nama'];
                 ?></td>
                <td><?= $tanggal?></td>
                <td><?= $item['absen']?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

