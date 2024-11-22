<?php $conn = mysqli_connect("localhost","root","","tugasphp");

// Query
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $box = [];
    // var_dump($result);die;   
    if(!$result) {
        return false;
    }
    while($boxItem = mysqli_fetch_assoc($result)) {
        $box[] = $boxItem;
    }

    return $box;
}

// =============================================== FUNCTION TAMBAH ===============================================

// Tambah data Absen
function goAbsen($data) {
    global $conn;
    $sql = "INSERT INTO absen (id, nis, day, date, month, year, absen, kelas) VALUES ";
    $values = [];
    foreach ($data as $row) {
        $values[] = "(NULL, '" 
        . $conn->real_escape_string($row['nis']) . "', '"
        . $conn->real_escape_string($row['day']) . "', '" 
        . $conn->real_escape_string($row['date']) . "', '" 
        . $conn->real_escape_string($row['month']) . "', '" 
        . $conn->real_escape_string($row['year']) . "', '" 
        . $conn->real_escape_string($row['absen']) . "', '"
        . $conn->real_escape_string($row['kelas']). "')";
}
    $sql .= implode(',', $values);
    // var_dump($sql);die;
    if ($conn->query($sql) === TRUE) {
        echo "New records inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tambah Data Guru
function tambahGuru($data) {
    global $conn;
    $nama = $data['nama'];
    $kode = $data['kode_guru'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis-kelamin'];
    $email = $data['email'];
    $no_telepon = $data['no-telepon'];
    $kelas = $data['kelas'];
    $photo = upload();

    $query = "INSERT INTO data_guru
                VALUES ('','$nama','$kode','$alamat','$jenis_kelamin','$email','$no_telepon','$kelas', '$photo')";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Tambah data Jurusan
function tambahJurusan($data) {
    global $conn;
    $kode = $data['kode_jurusan'];
    $nama = $data['nama_jurusan'];
    $singkatan = $data['singkatan'];
    
    $query = "INSERT INTO data_jurusan
                VALUES
                ('','$kode','$nama','$singkatan')";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Tambah data Kelas
function tambahKelas($data) {
    global $conn;
    $kode = $data['kode_kelas'];
    $nama = $data['nama_kelas'];
    $singkatan = $data['singkatan'];

    $query = "INSERT INTO data_kelas
                VALUES ('','$kode','$nama','$singkatan')";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Tambah data Siswa
function tambahSiswa($data) {
    global $conn;
    $nis = $data['nis'];
    // var_dump($nis);die;

    $sqlCheck = "SELECT COUNT(*) AS count FROM data_siswa WHERE nis = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("s", $nis);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();
    $row = $result->fetch_assoc();

    // var_dump($row['count']);die;

    if ($row['count'] > 0) {
        echo "<script> alert('NIS sudah ada'); </script>";
        return false;
    }

    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis-kelamin'];
    $email = $data['email'];
    $no_telepon = $data['no-telepon'];
    $kelas = $data['kelas'];
    $photo = upload();
    if(!$photo) {
        return false;
    } 


    $query = "INSERT INTO data_siswa
                VALUES ('','$nama','$nis','$alamat','$jenis_kelamin','$email','$no_telepon','$kelas','$photo'
                )";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Upload 
function upload() {
    // var_dump($_FILES);die;
    $photo = $_FILES['photo'];
    $nama = $photo['name'];
    $type = $photo['type'];
    $error = $photo['error'];
    $tmp_name = $photo['tmp_name'];
    $size = $photo['size'];

    if($error === 4) {
        echo "<script> alert('pilih gambar terlebih dahulu');</script>";
        return false;
    }

    $validation = ['jpg','png','jpeg'];
    $ekstensiFoto = explode(".",$nama);
    $namaFoto = $ekstensiFoto[0];
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if(!in_array($ekstensiFoto, $validation)) {
        echo "<script> alert('jenis ekstensi gambar tidak valid');</script>";
        return false;
    }

    // Upload ke file photos
    $newNama = uniqid();
    $newNama = $namaFoto . $newNama .  "." . $ekstensiFoto;
    move_uploaded_file($tmp_name, "style/photos/" . $newNama);
    return $newNama;
}

// Delete
function delete($id, $table) {
    global $conn;
    $query = "DELETE FROM $table WHERE id = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// =============================================== FUNCTION CHANGE ===============================================

// Change Siswa
function changeSiswa($data) {
    global $conn;
    $nama = $data['nama'];
    $nis = $data['nis'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis-kelamin'];
    $email = $data['email'];
    $no_telepon = $data['no-telepon'];
    $kelas = $data['kelas'];
    $id = $data['id'];
    $photoLama = $data['photoLama'];
    if($_FILES['photo']['error'] === 4) {
        $photo = $photoLama;
    } else {
        $photo = upload();
        unlink("style/photos/" . $photoLama);
    }

    $query = "UPDATE data_siswa SET 
                nama = '$nama',
                nis = '$nis',
                alamat = '$alamat',
                jenis_kelamin = '$jenis_kelamin',
                email = '$email',
                no_telepon = '$no_telepon',
                kelas = '$kelas',
                photo = '$photo' WHERE id = $id
                ";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Change Jurusan
function changeJurusan($data) {
    global $conn;
    $kodeJurusan = $_POST['kode_jurusan'];
    $namaJurusan = $_POST['nama_jurusan'];
    $singkatan = $_POST['singkatan'];

    $query = "UPDATE data_jurusan SET
                kode_jurusan = '$kodeJurusan',
                nama_jurusan = '$namaJurusan',
                singkatan = '$singkatan'
                ";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// change Guru
function changeGuru($data) {
    global $conn;
    $nama = $data['nama'];
    $kodeGuru = $data['kode_guru'];
    $alamat = $data['alamat'];
    $jenis_kelamin = $data['jenis-kelamin'];
    $email = $data['email'];
    $no_telepon = $data['no-telepon'];
    $kelas = $data['kelas'];
    $id = $data['id'];
    $photoLama = $data['photoLama'];
    if($_FILES['photo']['error'] === 4) {
        $photo = $photoLama;
    } else {
        $photo = upload();
        unlink("style/photos/" . $photoLama);
    }

    if(!$photo) {
        return false;
    }

    $query = "UPDATE data_guru SET
                nama = '$nama',
                kode_guru = '$kodeGuru',
                alamat = '$alamat',
                jenis_kelamin = '$jenis_kelamin',
                email = '$email',
                no_telepon = '$no_telepon',
                kelas = '$kelas',
                photo = '$photo' WHERE id = $id
                ";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// change Kelas
function changeKelas($data) {
    global $conn;
    $id = $_GET['id'];
    $kodeKelas = $_POST['kode_kelas'];
    $namaKelas = $_POST['nama_kelas'];
    $singkatan = $_POST['singkatan'];

    $query = "UPDATE data_kelas SET
                kode_kelas = '$kodeKelas',
                nama_kelas = '$namaKelas',
                singkatan = '$singkatan'
                WHERE id = $id";

    $result = mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// =============================================== SEARCH FUNCTION ===============================================
// Search Siswa
function searchSiswa($keyword) {
    $query = "SELECT * FROM data_siswa WHERE
                nama LIKE '%$keyword%'OR
                nis LIKE '%$keyword%'OR
                alamat LIKE '%$keyword%'OR
                jenis_kelamin LIKE '%$keyword%'OR
                email LIKE '%$keyword%'OR
                no_telepon LIKE '%$keyword%'OR
                kelas LIKE '%$keyword%'";
    return query($query);
}
// Search Absen
function searchAbsen($keyword) {
    // var_dump($keyword);die;
    $nis = $keyword['nis'];
    $day = $keyword['day'];
    $date = $keyword['date'];
    $month = $keyword['month'];
    $year = $keyword['year'];
    $absen = $keyword['absen'];

    $query = "SELECT * FROM absen WHERE
                nis LIKE '%$nis%' AND
                day LIKE '%$day%' AND
                date LIKE '%$date%' AND
                month LIKE '%$month%' AND
                year LIKE '%$year%'";
                // -- nama LIKE '%$nama%'";
    return query($query);
}