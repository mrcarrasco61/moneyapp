<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>MMONEY</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <?php
    include_once 'database.php';
    //SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'market'
    $akaryakit = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'akaryakit'");
    $akaryakit->execute();
    $akaryakitROW = $akaryakit->fetch(PDO::FETCH_ASSOC);

    $market = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'market'");
    $market->execute();
    $marketROW = $market->fetch(PDO::FETCH_ASSOC);

    $restorant = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'restorant'");
    $restorant->execute();
    $restorantROW = $restorant->fetch(PDO::FETCH_ASSOC);

    $ulasim = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'ulasim'");
    $ulasim->execute();
    $ulasimROW = $ulasim->fetch(PDO::FETCH_ASSOC);

    $hediyeler = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'hediyeler'");
    $hediyeler->execute();
    $hediyelerROW = $hediyeler->fetch(PDO::FETCH_ASSOC);

    $hobiler = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'hobiler'");
    $hobiler->execute();
    $hobilerROW = $hobiler->fetch(PDO::FETCH_ASSOC);

    $diger = $conn->prepare("SELECT h.harcamaKategori,SUM(h.harcamaTutari) AS 'tutar' FROM harcamahareketleri h WHERE h.harcamaKategori = 'diger'");
    $diger->execute();
    $digerROW = $diger->fetch(PDO::FETCH_ASSOC);




    $dataPoints = array(
        array("label" => "Akaryakıt", "y" => $akaryakitROW["tutar"]),
        array("label" => "Market", "y" => $marketROW["tutar"]),
        array("label" => "Restorant", "y" => $restorantROW["tutar"]),
        array("label" => "Ulaşım", "y" => $ulasimROW["tutar"]),
        array("label" => "Hediyeler", "y" => $hediyelerROW["tutar"]),
        array("label" => "Hobiler", "y" => $hobilerROW["tutar"]),
        array("label" => "Diğer", "y" => $digerROW["tutar"]),
    );

    ?>
    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light1", // "light1", "light2", "dark1", "dark2"
                title: {
                    text: "Kategorilere Göre Harcama Tutarı"
                },
                axisY: {
                    title: "Harma Miktarı"
                },
                data: [{
                    type: "column",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
</head>

<body class="sb-nav-fixed">
    <?php require_once 'inc-nav.php' ?>
    <div id="layoutSidenav">
        <?php require_once 'inc-sidenav.php' ?>
        <div id="layoutSidenav_content" style="padding-left: 0px;">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4 mb-3">Anasayfa</h1>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Hesap Sayısı</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body" style="color: #212529">Hesaplara Git</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" href="hesaplar.php" style="color: #212529">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Hesap Ekle</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="hesapekle.php">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Hesap Hareketleri</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="hesaphareketleri.php">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-info text-white mb-4">
                                <div class="card-body">Kategoriler</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="kategoriler.php">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body">Harcama Hareketleri</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="harcamahareketleri.php">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-4">
                            <div class="card bg-light text-white mb-4">
                                <div class="card-body" style="color: black;">Kullanıcı Hareketleri</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small stretched-link" style="color: black;" href="kullanicidetay.php">Detaylara Git</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header">
                                <b>Kategoriye Göre Harcama Tablosu</b>
                            </div>
                            <div id="chartContainer" style="height: 500px; width: 80%;margin: 0 auto;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        </div>
                    </div>
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Son Hesap Hareketleri
                        </div>

                        <?php
                        include_once 'database.php';
                        $cek = $conn->prepare("select*from hesaphareketleri");
                        $cek->execute();
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ana Hesap</th>
                                            <th>Aktarılan Hesap</th>
                                            <th>İşlem Tutarı</th>
                                            <th>İslem Kategori</th>
                                            <th>İşlem Tarihi</th>

                                        </tr>
                                    </thead>
                                    <tbody id="transData">
                                        <?php
                                        $sayi = 0;
                                        while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
                                            $sayi++;
                                            $anaHesapCek = $conn->prepare("select*from `hesap` where `id` = :id");
                                            $anaHesapCek->bindValue(":id", $row["anaHesap"], PDO::PARAM_INT);
                                            $anaHesapCek->execute();
                                            $anaHesapRow = $anaHesapCek->fetch(PDO::FETCH_ASSOC);

                                            $aktarilanHesapCek = $conn->prepare("select*from `hesap` where `id` = :id");
                                            $aktarilanHesapCek->bindValue(":id", $row["aktarilanHesap"], PDO::PARAM_INT);
                                            $aktarilanHesapCek->execute();
                                            $aktarilanHesapRow = $aktarilanHesapCek->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                            <tr>
                                                <td class=""><?= $sayi ?></td>
                                                <td class="description"><span><?= $anaHesapRow["adi"]; ?> - <?= $anaHesapRow["tur"]; ?></span></td>
                                                <td class="description"><span><?= $aktarilanHesapRow["adi"]; ?> - <?= $aktarilanHesapRow["tur"]; ?></span></td>
                                                <td class="total"><span><?= $row["islemTutarı"] ?> - <?= $anaHesapRow["parabirimi"]; ?></span></td>
                                                <td class="description"><span><?= $row["islemKategori"] ?></span></td>
                                                <td class="date"><span><?= $row["islemTarihi"] ?></span></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>



                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once 'inc-footer.php' ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>