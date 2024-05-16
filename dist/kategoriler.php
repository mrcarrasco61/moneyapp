<?php include_once 'database.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kategoriler</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php require_once 'inc-nav.php' ?>
    <div id="layoutSidenav">
        <?php require_once 'inc-sidenav.php' ?>
        <div id="layoutSidenav_content" style="padding-left: 0px;">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Hesaplar</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit odit quasi nam natus cumque at!
                        </div>
                    </div>
                    <style type="text/css">
                        h1 {
                            color: green;
                        }

                        .xyz {
                            background-size: auto;
                            text-align: center;
                            padding-top: 100px;
                            padding-bottom: 100px;
                            background-color: #E7E7E7;
                        }

                        .btn-circle.btn-sm {
                            width: 30px;
                            height: 30px;
                            padding: 6px 0px;
                            border-radius: 15px;
                            font-size: 8px;
                            text-align: center;
                        }

                        .btn-circle.btn-md {
                            width: 50px;
                            height: 50px;
                            padding: 7px 10px;
                            border-radius: 25px;
                            font-size: 10px;
                            text-align: center;
                        }

                        .btn-circle.btn-xl {
                            width: 100px;
                            height: 100px;
                            margin-right: 5%;
                            border-radius: 70px;
                            font-size: 18px;
                            text-align: center;
                        }
                    </style>
                    <div class="xyz">

                        <input type="button" class="btn btn-primary btn-circle btn-xl" data-toggle="modal" data-target="#akaryakitModal" value="Akaryakıt" />
                        <input type="button" class="btn btn-secondary btn-circle btn-xl" data-toggle="modal" data-target="#marketModal" value="Market" />
                        <input type="button" class="btn btn-success btn-circle btn-xl" data-toggle="modal" data-target="#restorantModal" value="Restorant" />
                        <input type="button" class="btn btn-danger btn-circle btn-xl" data-toggle="modal" data-target="#ulasimModal" value="Ulaşım" />
                        <input type="button" class="btn btn-warning btn-circle btn-xl" data-toggle="modal" data-target="#hediyelerModal" value="Hediyeler" />
                        <input type="button" class="btn btn-light btn-circle btn-xl" data-toggle="modal" data-target="#hobilerModal" value="Hobiler" />
                        <input type="button" class="btn btn-dark btn-circle btn-xl" data-toggle="modal" data-target="#digerModal" value="Diğer" />
                    </div>
                </div>

                <div id="akaryakitModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Akaryakıt</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="akaryakit" type="text" name="kategori" value="akaryakit" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" name="miktar" step=".01" class="form-control input-lg" name="harcanacakMiktar">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn btn-success" value="Harcama Ekle"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="marketModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Market</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="market" type="text" name="kategori" value="market" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" name="miktar" step=".01" class="form-control input-lg" name="harcanacakMiktar">
                                        </div>
                                    </div>
                                    <div>
                                    <input type="submit" class="btn btn-success" value="Harcama Ekle"></input>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="restorantModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Restorant</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="restorant" type="text" name="kategori" value="restorant" readonly>
                                        </div>
                                        <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" step=".01" class="form-control input-lg" name="miktar">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Harcama Ekle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="ulasimModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Ulaşım</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="ulasim" type="text" name="kategori" value="ulasim" readonly>
                                        </div>
                                        <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" step=".01" class="form-control input-lg" name="miktar">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Harcama Ekle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="hediyelerModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Hediyeler</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="hediyeler" type="text" name="kategori" value="hediyeler" readonly>
                                        </div>
                                        <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" step=".01" class="form-control input-lg" name="miktar">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Harcama Ekle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="hobilerModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Hobiler</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="hobiler" type="text" name="kategori" value="hobiler" readonly>
                                        </div>
                                        <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" step=".01" class="form-control input-lg" name="miktar">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Harcama Ekle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="digerModal" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title">Diğer</h1>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="harcamaekle.php">
                                    <input type="hidden" name="_token" value="">
                                    <div class="form-group">
                                        <label class="control-label">Kategori Adı</label>
                                        <div>
                                            <input class="form-control input-lg" id="diger" type="text" name="kategori" value="diger" readonly>
                                        </div>
                                        <div class="form-group">
                                        <label>Aktarım Yapılacak Hesap</label>

                                        <?php

                                        $hesapcek = $conn->prepare("select*from `hesap`");
                                        $hesapcek->execute();
                                        $hesapRow = $hesapcek;
                                        while ($hesapRow = $hesapcek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="harcanacakHesap" id="optionsRadios1" value="<?= $hesapRow["id"] ?>" required> <span>Hesap Adı: <?= $hesapRow["adi"] ?></span> &nbsp; - &nbsp; <span>Hesap Türü: <?= $hesapRow["tur"] ?></span> &nbsp; - &nbsp; <span id="Bakiye">Bakiye: <?= $hesapRow["bakiye"] ?> ₺</span> &nbsp; - &nbsp; <span>Para Birimi: <?= $hesapRow["parabirimi"] ?> </span>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Miktar</label>
                                        <div>
                                            <input type="number" step=".01" class="form-control input-lg" name="miktar">
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success">Harcama Ekle</button>
                                    </div>
                                </form>
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