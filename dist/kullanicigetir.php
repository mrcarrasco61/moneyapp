<?php
function getir(){
    include_once 'database.php';
    $cek = $conn->prepare("select*from kullanici");
    $cek->execute();
    $row = $cek->fetch(PDO::FETCH_ASSOC);
    $_SESSION["kadi"] = $row["kullaniciadi"];
    $d = print_r($row["kullaniciadi"]);
    return $d;
}
exit(getir());
