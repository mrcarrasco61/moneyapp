<?php
function getir(){
    include_once 'database.php';
    $cek = $conn->prepare("select*from kullanici");
    $cek->execute();
    $row = $cek->fetch(PDO::FETCH_ASSOC);
    $d = print_r($row["sifre"]);
    return $d;
}
exit(getir());
