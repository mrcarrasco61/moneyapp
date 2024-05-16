<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Hesaplar</title>
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
                    <h1 class="mt-4">Hesap Ekle</h1>
                    <hr>

                    <div class="row">
                        <div class="container">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <!-- PHP BÖLÜMÜ -->

                                            <?php
                                            require_once 'database.php';

                                            if (@$_POST["submit"]) {
                                                $adi = $_POST["hesapAdi"];
                                                $bakiye = $_POST["hesapBakiye"];
                                                $tur = $_POST["hesapTur"];
                                                $parabirimi = $_POST["hesapParaBirimi"];

                                                $ekle = $conn->prepare("INSERT INTO hesap(`adi`, `bakiye`,`tur`,`parabirimi`)
                                                                    VALUES ('$adi','$bakiye','$tur','$parabirimi')");
                                                if ($ekle->execute()) {
                                                    header("Location: hesapekle.php?i=eklendi");
                                                } else {
                                                    print_r($ekle->errorInfo());
                                                }
                                            }

                                            ?>

                                            <form role="form" action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Hesap Adı</label>
                                                    <input type="text" class="form-control" name="hesapAdi" placeholder="Başlık Giriniz">
                                                </div>
                                                <div class="form-group">
                                                    <label>Bakiye</label>
                                                    <input type="number" class="form-control" name="hesapBakiye" placeholder="Hesap Parasını Giriniz">
                                                </div>

                                                <div class="form-group">
                                                    <label>Tür</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="hesapTur" id="optionsRadios1" value="nakit" checked>Nakit
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="hesapTur" id="optionsRadios2" value="kart">Kart
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <style>
                                                        .select-block {
                                                            width: 300px;
                                                            margin: 110px auto 30px;
                                                            position: relative;
                                                        }

                                                        select {
                                                            width: 25%;
                                                            height: 50px;
                                                            font-size: 100%;
                                                            font-weight: bold;
                                                            cursor: pointer;
                                                            border-radius: 0;
                                                            background-color: #cccccc;
                                                            border: none;
                                                            border: 2px solid #cccccc;
                                                            border-radius: 4px;
                                                            color: white;
                                                            appearance: none;
                                                            padding: 8px 38px 10px 18px;
                                                            -webkit-appearance: none;
                                                            -moz-appearance: none;
                                                            transition: color 0.3s ease, background-color 0.3s ease, border-bottom-color 0.3s ease;
                                                        }

                                                        /* For IE <= 11 */
                                                        select::-ms-expand {
                                                            display: none;
                                                        }

                                                        .selectIcon {
                                                            top: 7px;
                                                            right: 15px;
                                                            width: 30px;
                                                            height: 36px;
                                                            padding-left: 5px;
                                                            pointer-events: none;
                                                            position: absolute;
                                                            transition: background-color 0.3s ease, border-color 0.3s ease;
                                                        }

                                                        .selectIcon svg.icon {
                                                            transition: fill 0.3s ease;
                                                            fill: white;
                                                        }

                                                        select:hover,
                                                        select:focus {
                                                            color: #000000;
                                                            background-color: white;
                                                        }

                                                        select:hover~.selectIcon,
                                                        select:focus~.selectIcon {
                                                            background-color: white;
                                                        }

                                                        select:hover~.selectIcon svg.icon,
                                                        select:focus~.selectIcon svg.icon {
                                                            fill: #1A33FF;
                                                        }
                                                    </style>
                                                    <label>Para Birimi</label>
                                                    <select class="col-md-12" name="hesapParaBirimi">
                                                        <option value="" disabled selected>Para Birimi Seçin</option>
                                                        <option value="TRY">TRY</option>
                                                        <option value="USD">USD</option>
                                                        <option value="EUR">EUR</option>
                                                    </select>
                                                </div>
                                                <input type="submit" name="submit" value="Kaydet" class="btn btn-success">
                                                <button type="reset" class="btn btn-danger">Temizle</button>
                                            </form>
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
                        <div class="text-muted">Copyright MrCarrasco</div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>