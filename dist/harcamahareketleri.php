<?php include_once 'database.php'; ?>
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Harcama Hareket</title>
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
                <?php
                $cek = $conn->prepare("select*from harcamahareketleri");
                $cek->execute();
                ?>
                <div class="container mt-4">
                    <header>
                        <h1><?= $_SESSION["kadi"] ?></h1>
                        <h2>Harcama Hareketleri</h2>
                    </header>
                    <div class="wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th class="date">Harcama Tarihi</th>
                                    <th class="total">Harcama Tutarı</th>
                                    <th>Harcama Yapılan Hesap</th>
                                    <th>Harcama Kategori</th>
                                </tr>
                            </thead>
                            <tbody id="transData">
                                <?php
                                $sayi = 0;

                                while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {
                                    $sayi++;

                                    $anaHesapCek = $conn->prepare("select*from `hesap` where `id` = :id");
                                    $anaHesapCek->bindValue(":id", $row["harcamaYapilanHesap"], PDO::PARAM_INT);
                                    $anaHesapCek->execute();
                                    $anaHesapRow = $anaHesapCek->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <tr>
                                    <td class="date"><span class="fontawesome-calendar"><?= $row["harcamaTarihi"] ?></span></td>
                                    <td class="total"><span class="fontawesome-money"><?= $row["harcamaTutari"] ?> - <?= $anaHesapRow["parabirimi"]; ?></span></td>
                                    <td> <span class="fontawesome-map-marker"><?= $anaHesapRow["adi"] ?> - <?= $anaHesapRow["tur"] ?></span></td>
                                    <td><span class="fontawesome-wrench"><?= $row["harcamaKategori"]; ?></span></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
    <script>
        $(document).ready(function() {
            $("#transData").children("tr").children("td").click(function() {
                $(this.parentNode).toggleClass("active");
            });
        });
    </script>
</body>
<style>
    @import url(http://weloveiconfonts.com/api/?family=fontawesome);
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);

    *,
    *:after,
    *:before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: margin 200ms ease;
        -moz-transition: margin 200ms ease;
        -o-transition: margin 200ms ease;
        transition: margin 200ms ease;
        -webkit-transition: padding 200ms ease;
        -moz-transition: padding 200ms ease;
        -o-transition: padding 200ms ease;
        transition: padding 200ms ease;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: 'Open Sans', sans-serif;
        color: #444444;
        font-size: 16px;
    }

    .container {
        line-height: 1.5em;
        margin: auto;
        width: 95%;
        max-width: 1000px;
    }

    h1,
    h2 {
        float: left;
        font-weight: normal;
        font-size: 2em;
    }

    h2 {
        float: right;
        font-size: 1.5em;
    }

    header:before,
    header:after {
        content: " ";
        /* 1 */
        display: table;
        /* 2 */
    }

    header:after {
        clear: both;
    }

    header {
        *zoom: 1;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        background: #ffffff;
    }

    th {
        background: #3c7d37;
        color: #ffffff;
    }

    td,
    th {
        padding: 0.5em 1em;
        text-align: left;
        vertical-align: top;
    }

    #transData tr.active td {
        background: #ffff75;
    }

    tbody th {
        background: #2ea879;
    }

    tbody tr:nth-child(2n-1) {
        background: #f1fff1;
        -webkit-transition: all 100ms ease;
        -moz-transition: all 100ms ease;
        -o-transition: all 100ms ease;
        transition: all 100ms ease;
    }

    tbody tr:hover {
        background-color: #ffffbf;
        cursor: cell;
    }

    .date,
    .total {
        width: 15%;
    }

    .location {
        width: 25%;
        text-transform: capitalize;
    }

    .description {
        width: 45%;
    }

    .fontawesome-calendar:before,
    .fontawesome-wrench:before,
    .fontawesome-money:before,
    .fontawesome-map-marker:before {
        display: none;
    }

    @media screen and (max-width: 768px) {

        body {
            font-size: 18px;
        }

        thead {
            display: none;
        }

        tr {
            margin: 0.75em 0.25em;
            border-top: 3px solid #3c7d37;
            -webkit-box-shadow: 0px 1px 1px 0px #717171;
            -moz-box-shadow: 0px 1px 1px 0px #717171;
            box-shadow: 0px 1px 1px 0px #717171;
        }

        td,
        tr {
            display: block;
            position: relative;
        }

        tr:before {
            content: "";
            width: 35%;
            background: #f1fff1;
            height: 100%;
            position: absolute;
        }

        tbody tr:nth-child(2n-1) {
            background: transparent;
        }

        tbody tr:hover {
            background-color: #ffffbf;
            cursor: cell;
        }

        .date,
        .total,
        .location,
        .description {
            width: 100%;
        }

        .date:before,
        .total:before,
        .location:before,
        .description:before {
            font-weight: bold;
            display: block;
            left: 1em;
            position: absolute;
        }

        .date:before {
            content: "Date: ";
        }

        .total:before {
            content: "Total: ";
        }

        .location:before {
            content: "Location: ";
        }

        .description:before {
            content: "Description: ";
        }

        .fontawesome-calendar,
        .fontawesome-wrench,
        .fontawesome-money,
        .fontawesome-map-marker {
            display: block;
            padding-left: 36%;
            position: relative;
        }

    }

    @media screen and (max-width: 600px) {

        h1,
        h2 {
            float: none;
        }

        h2 {
            font-size: 1em;
            margin: 0;
        }

    }

    @media screen and (max-width: 430px) {

        tr:before {
            width: 15%;
        }

        .date:before,
        .total:before,
        .location:before,
        .description:before {
            display: none;
        }

        [class*="fontawesome-"]:before {
            font-family: 'FontAwesome', sans-serif;
        }

        .fontawesome-calendar:before,
        .fontawesome-wrench:before,
        .fontawesome-money:before,
        .fontawesome-map-marker:before {
            display: block;
            left: 0;
            position: absolute;
        }

        .fontawesome-calendar,
        .fontawesome-wrench,
        .fontawesome-money,
        .fontawesome-map-marker {
            padding-left: 16%;
        }


    }
</style>

</html>