<?php
    session_start();
    include_once 'database.php';
    $kullanici = $_SESSION["kadi"];
            $is = 'cikis';


            $girisLogEkle = $conn->prepare("INSERT INTO log(`kullanici`,`is`)
                                            VALUES ('$kullanici','$is')");
            $girisLogEkle->execute();
    $_SESSION["girisKontrol"] = 0;
    unset($_SESSION["kadi"]);
    header("Refresh:1;url=login.php");
    session_destroy();
?>