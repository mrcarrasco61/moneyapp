<?php

include_once 'database.php';

$guncelle = $conn->prepare("UPDATE `kullanici` SET `kullaniciadi` = :kullaniciAdi");
$guncelle->bindParam(":kullaniciAdi", $_POST["kullaniciAdi"], PDO::PARAM_STR);

$guncelle->execute();
?>

<script>alert("kullanıcı veya şifre değişikliğinden sonra çıkış yapmanız gerekmektedir")</script>
<?php
header("Location: cikisyap.php?i=basarili");

?>