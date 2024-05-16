<?php

include_once 'database.php';

$guncelle = $conn->prepare("UPDATE `kullanici` SET `sifre` = :kullaniciSifre");
$guncelle->bindParam(":kullaniciSifre", $_POST["sifre"], PDO::PARAM_STR);

$guncelle->execute();
?>

<script>alert("kullanıcı veya şifre değişikliğinden sonra çıkış yapmanız gerekmektedir")</script>
<?php
header("Location: cikisyap.php?i=basarili");

?>