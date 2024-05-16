<?php

include_once 'database.php';

// echo $_POST["harcanacakHesap"] . $_POST["kategori"] . $_POST["miktar"];

$hesapcek = $conn->prepare("select*from `hesap` where `id` = :id");
$hesapcek->bindValue(":id", $_POST["harcanacakHesap"], PDO::PARAM_STR);
$hesapcek->execute();
$hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC);

// foreach ($hesapRow as $x) {
//     
//     echo $x;
// }

if ($hesapRow["bakiye"] < $_POST["miktar"]) {

?>
    <script>
        alert("Yetersiz Bakiye");
    </script>
<?php
    header("Refresh:0;url=kategoriler.php");
} else if ($hesapRow["bakiye"] >= $_POST["miktar"]) {

    $sonpara = $hesapRow["bakiye"]-$_POST["miktar"];

    $guncelle = $conn->prepare("UPDATE `hesap` SET `bakiye` = :hesapBakiye WHERE `id` = :id");
    $guncelle->bindParam(":hesapBakiye", $sonpara, PDO::PARAM_STR);
    $guncelle->bindParam(":id", $_POST["harcanacakHesap"] , PDO::PARAM_INT);

    // if ($guncelle->execute()) {
    //     header("Location: hesapekle.php?i=eklendi");
    // } else {
    //     print_r($guncelle->errorInfo());
    // }

    $anaHesapID = $_POST["harcanacakHesap"];
    $kategori = $_POST["kategori"];
    $miktar = $_POST["miktar"];


    $hesapHareketiEkle = $conn->prepare("INSERT INTO harcamahareketleri(`harcamaYapilanHesap`, `harcamaTutari`,`harcamaKategori`)
    VALUES ('$anaHesapID','$miktar','$kategori')");

    if ($guncelle->execute() and $hesapHareketiEkle->execute()) {
        header("Location: harcamahareketleri.php?i=basarili");
    }
}
?>