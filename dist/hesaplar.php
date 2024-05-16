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
    <?php
    include_once 'database.php';
    include 'inc-nav.php'
    ?>
    <div id="layoutSidenav">
        <?php include 'inc-sidenav.php' ?>

        <div id="layoutSidenav_content" style="padding-left: 0px;">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Hesaplar</h1>
                    <div class="card mb-4">
                        <div class="card-body">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit odit quasi nam natus cumque at!
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Hesaplar Listesi
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>İsim</th>
                                            <th>Bakiye</th>
                                            <th>Tür</th>
                                            <th>Para Birimi</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>İsim</th>
                                            <th>Bakiye</th>
                                            <th>Tür</th>
                                            <th>Para Birimi</th>
                                            <th>Oluşturma Tarihi</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        $id = intval(@$_GET["id"]);

                                        if (@$_GET["is"] == "sil") {
                                            $sil = $conn->prepare("DELETE FROM hesap WHERE id = :i");
                                            $sil->bindValue(":i", $id, PDO::PARAM_INT);
                                            if ($sil->execute()) {
                                                header("Location: hesaplar.php?i=silindi");
                                            }
                                        }

                                        $cek = $conn->prepare("select*from hesap");
                                        $cek->execute();

                                        while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>

                                            <tr>
                                                <td><?= $row["id"] ?></td>
                                                <td><?php echo $row["adi"] ?></td>
                                                <td><?= $row["bakiye"] ?></td>
                                                <td><?= $row["tur"] ?></td>
                                                <td><?= $row["parabirimi"] ?></td>
                                                <td><?= $row["olusturmaTarihi"] ?></td>
                                                <td style="width: 320px;">
                                                    <a style="margin-left: 2%;" class="btn btn-danger btn-xs" href="hesaplar.php?is=sil&id=<?= $row["id"] ?>">Sil</a>
                                                    <a style="margin-right: 1%; margin-left: 2%;" class="btn btn-warning btn-xs" href="hesapduzenle.php?id=<?= $row["id"] ?>">Düzenle</a>
                                                    <a style="margin-right: 1%; margin-left: 2%;" class="btn btn-info btn-xs" href="hesaplararasiaktarim.php?id=<?= $row["id"] ?>">Para Aktar</a>
                                                </td>
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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; MrCarrasco</div>
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