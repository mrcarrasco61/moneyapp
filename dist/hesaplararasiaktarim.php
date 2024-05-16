<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Aktarım</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include 'inc-nav.php' ?>
    <div id="layoutSidenav">
        <?php include 'inc-sidenav.php' ?>

        <div id="layoutSidenav_content" style="padding-left: 0px;">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Hesaplar Arası Aktarim</h1>
                    <hr>

                    <div class="row">
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form role="form" action="" method="POST" enctype="multipart/form-data">

                                                <span>Sadece Para Birimleri Aynı Olan Hesaplar Arasında Aktarım Yapabilirsiniz</span><br><br>

                                                <?php require_once 'database.php';

                                                @$id = $_GET["id"];
                                                $cek = $conn->prepare("select*from `hesap` where `id` = :id");
                                                $cek->bindValue(":id", $id, PDO::PARAM_INT);
                                                $cek->execute();
                                                $row = $cek->fetch(PDO::FETCH_ASSOC);

                                                if ($row) {
                                                } else {
                                                    echo 'Bu ID ye ait bir hesap yok <hr> ';
                                                }

                                                ?>
                                                <div class="form-group">
                                                    <label>Ana Hesap</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="anaHesap" id="optionsRadios1" value="<?= $row["id"] ?>" checked> <span>Hesap Adı: <?= $row["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $row["tur"] ?></span> &nbsp; - &nbsp; <span>Bakiye: <?= $row["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $row["parabirimi"] ?> </span>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Aktarım Yapılacak Hesap</label>

                                                    <?php

                                                    $hesapcek = $conn->prepare("select*from `hesap` where `parabirimi` = :parabirimi and `id` <> :id");
                                                    $hesapcek->bindValue(":id", $row["id"], PDO::PARAM_STR);
                                                    $hesapcek->bindValue(":parabirimi", $row["parabirimi"], PDO::PARAM_STR);
                                                    $hesapcek->execute();
                                                    $hesapRow= $hesapcek;
                                                    while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="aktarilacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span >Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                            </label>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>

                                                <div class="form-group">
                                                    <label>Miktar</label>
                                                    <input type="number" min="0" class="form-control col-md-6" name="miktar" placeholder="Hesap Parasını Giriniz" required>
                                                </div>

                                                <input type="submit" name="submit" value="Kaydet" class="btn btn-success">
                                                <button type="reset" class="btn btn-danger">Temizle</button>
                                            </form>

                                            <?php

                                            if (@$_POST["submit"]) {

                                                if ($_POST["miktar"] > $row["bakiye"]) {
                                            ?>
                                                    <script>
                                                        if (window.alert("Girilen Bakiye Yetersiz")) {
                                                            <?php
                                                            header("Refresh:0;url=hesaplar.php?i=BakiyeYetersiz");
                                                            ?>
                                                        }
                                                    </script>

                                            <?php
                                                } else if ($_POST["miktar"] <= $row["bakiye"]) {

                                                    // - Hesap Hareketleri - EKLEME
                                                    $anaHesapID = $_POST["anaHesap"];
                                                    $aktarilacakHesapID = $_POST["aktarilacakHesap"];
                                                    $miktar = $_POST["miktar"];
                                                    $kategori = "Aktarım";

                                                    $hesapHareketiEkle = $conn->prepare("INSERT INTO hesaphareketleri(`anaHesap`, `aktarilanHesap`,`islemTutarı`,`islemKategori`)
                                                                    VALUES ('$anaHesapID','$aktarilacakHesapID','$miktar','$kategori')");

                                                    // - Hesaplardaki Değeleri Azaltma ve Arttırma -
                                                    $degisenPara = $_POST["miktar"];
                                                    // Ana Hesap
                                                    $anaHesapSonBakiye = $row["bakiye"] - $_POST["miktar"];
                                                    $anaHesapGuncelle = $conn->prepare("UPDATE `hesap` SET `bakiye` = :hesapBakiye WHERE `id` = :id");
                                                    $anaHesapGuncelle->bindParam(":hesapBakiye", $anaHesapSonBakiye);
                                                    $anaHesapGuncelle->bindParam(":id", $row["id"], PDO::PARAM_INT);

                                                    //

                                                    //Giden Hesap
                                                    $gidecekHesapCek = $conn->prepare("select*from `hesap` where `id` = :id");
                                                    $gidecekHesapCek->bindValue(":id",$_POST["aktarilacakHesap"],PDO::PARAM_INT);
                                                    $gidecekHesapCek->execute();
                                                    $gidecekHesapRow = $gidecekHesapCek->fetch(PDO::FETCH_ASSOC);
                                                    $gidenHesapSonBakiye = 0;
                                                    if ($gidecekHesapCek) {
                                                        $gidenHesapSonBakiye = $gidecekHesapRow["bakiye"] + $_POST["miktar"];
                                                    }
                                                    else {
                                                        echo ' <hr> Bu ID ye ait bir hesap yok AKTARIM YAPILAMAZ <hr> ';
                                                    }
                                                    

                                                    $gidenHesapGuncelle = $conn->prepare("UPDATE `hesap` SET `bakiye` = :gidenBakiye WHERE `id` = :id");
                                                    $gidenHesapGuncelle->bindParam(":gidenBakiye", $gidenHesapSonBakiye);
                                                    $gidenHesapGuncelle->bindParam(":id", $_POST["aktarilacakHesap"], PDO::PARAM_INT);

                                                    if ($hesapHareketiEkle->execute() and $anaHesapGuncelle->execute() and  $gidenHesapGuncelle->execute()) {
                                                        header("Location: hesaphareketleri.php?i=eklendi");
                                                        echo $gidenHesapSonBakiye;
                                                        echo $anaHesapSonBakiye;
                                                    } else {
                                                        print_r($hesapHareketiEkle->errorInfo());
                                                        print_r($anaHesapGuncelle->errorInfo());
                                                        print_r($gidenHesapGuncelle->errorInfo());
                                                    }
                                                }
                                            }

                                            ?>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    < src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></>
    < src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></>
    < src="js/scripts.js"></>
    < src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></>
    < src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></>
    < src="assets/demo/datatables-demo.js"></>
</body>

</html>