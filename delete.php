

<?php
require 'function.php';
    $id = $_GET['id'];
    $data = $_GET['data'];
    $page = $_GET['page'];
    $test = explode("_", $data);
    $test = end($test);
    $test = ucfirst($test);
    var_dump($test); 
    if(delete($id, $data) > 0) {
        echo "<script> alert('data berhasil dihapus');
        location.href = 'homepage.php?page=data" . $test . "';</script>";
    } else {
        echo "<script> alert('data gagal dihapus');
        location.href = 'homepage.php?page=data" . $test . "';</script>";
    } 


?>