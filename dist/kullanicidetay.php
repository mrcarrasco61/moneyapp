<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Kullanıcı Detay</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <style>
    body {
      margin-top: auto;
      background-color: #f1f1f1;
    }

    .border {
      border-bottom: 1px solid #F1F1F1;
      margin-bottom: 10px;
    }

    .main-secction {
      box-shadow: 10px 10px 10px;
    }

    .image-section {
      padding: 0px;
    }

    .image-section img {
      width: 100%;
      height: 250px;
      position: relative;
    }

    .user-image {
      position: absolute;
      margin-top: -50px;
    }

    .user-left-part {
      margin: 0px;
    }

    .user-image img {
      width: 100px;
      height: 100px;
    }

    .user-profil-part {
      padding-bottom: 30px;
      background-color: #FAFAFA;
    }

    .follow {
      margin-top: 70px;
    }

    .user-detail-row {
      margin: 0px;
    }

    .user-detail-section2 p {
      font-size: 12px;
      padding: 0px;
      margin: 0px;
    }

    .user-detail-section2 {
      margin-top: 10px;
    }

    .user-detail-section2 span {
      color: #7CBBC3;
      font-size: 20px;
    }

    .user-detail-section2 small {
      font-size: 12px;
      color: #D3A86A;
    }

    .profile-right-section {
      padding: 20px 0px 10px 15px;
      background-color: #FFFFFF;
    }

    .profile-right-section-row {
      margin: 0px;
    }

    .profile-header-section1 h1 {
      font-size: 25px;
      margin: 0px;
    }

    .profile-header-section1 h5 {
      color: #0062cc;
    }

    .req-btn {
      height: 30px;
      font-size: 12px;
    }

    .profile-tag {
      padding: 10px;
      border: 1px solid #F6F6F6;
    }

    .profile-tag p {
      font-size: 12px;
      color: black;
    }

    .profile-tag i {
      color: #ADADAD;
      font-size: 20px;
    }

    .image-right-part {
      background-color: #FCFCFC;
      margin: 0px;
      padding: 5px;
    }

    .img-main-rightPart {
      background-color: #FCFCFC;
      margin-top: auto;
    }

    .image-right-detail {
      padding: 0px;
    }

    .image-right-detail p {
      font-size: 12px;
    }

    .image-right-detail a:hover {
      text-decoration: none;
    }

    .image-right img {
      width: 100%;
    }

    .image-right-detail-section2 {
      margin: 0px;
    }

    .image-right-detail-section2 p {
      color: #38ACDF;
      margin: 0px;
    }

    .image-right-detail-section2 span {
      color: #7F7F7F;
    }

    .nav-link {
      font-size: 1.2em;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php require_once 'inc-nav.php' ?>
  <div id="layoutSidenav">
    <?php require_once 'inc-sidenav.php' ?>
    <div id="layoutSidenav_content" style="padding-left: 0px;">
      <main style="margin-top: 5%;">

        <div class="container main-section">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 image-section" style="max-width: 97.89%;">
              <img src="../resim/arkaplan.jpg">
            </div>
            <div class="row col-md-12">
              <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                <div class="row ">
                  <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                    <img src="../resim/arkaplan2.png" class="rounded-circle">
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 mt-3 user-detail-section1 text-center">
                    <a href="cikisyap.php" class="btn btn-warning btn-block mt-5">Cıkış Yap</a>
                  </div>
                  <div class="row user-detail-row">
                  </div>
                </div>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                <div class="row profile-right-section-row">
                  <div class="col-md-12 profile-header">
                    <div class="row">
                      <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                        <h1></h1>
                        <h5>Software</h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        <ul class="nav nav-tabs" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> İş Profili</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Loglar</a>
                          </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade show active" id="profile">
                            <div class="row mt-3">
                              <div class="col-md-2">
                                <label>ID</label>
                              </div>
                              <div class="col-md-6">
                                <p>6161616161</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                                <label>İsim</label>
                              </div>
                              <div class="col-md-6">
                                <p>Muhammet Ali Köse</p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                                <label>Email</label>
                              </div>
                              <div class="col-md-6">
                                <p>test@test.com</p>
                              </div>
                            </div>

                            <form role="form" action="kullaniciguncelle.php" method="POST" enctype="multipart/form-data">
                              <div class="row mt-3">
                                <div class="col-md-2">
                                  <label>Kullanıcı Adı</label>
                                </div>
                                <div class="col-md-2">
                                  <label id="kullaniciAdiAjax">eski adı görmek için butona tıklayın </label>
                                </div>
                                <div class="col-md-3">
                                  <input type="text" class="form-control" name="kullaniciAdi" placeholder="Kullanıcı Adı">
                                </div>
                                <div class="col-md-3">
                                  <button type="submit" class="btn btn-success">Kullanıcı Adı Güncelle</button>
                                  <input type="button" name="kullaniciAdiGoster" id="kullaniciAdiGoster" value="Kullanıcı Adı Göster" class="btn btn-success">
                                </div>
                              </div>
                            </form>

                            <form role="form" action="sifreguncelle.php" method="POST" enctype="multipart/form-data">
                              <div class="row mt-3">
                                <div class="col-md-2">
                                  <label>Şifre</label>
                                </div>
                                <div class="col-md-2">
                                  <label id="sifreAjax">sifreyi görmek için butona tıklayın</label>
                                </div>
                                <div class="col-md-3">
                                  <input class="form-control" type="text" name="sifre" placeholder="Şifre">
                                </div>
                                <div class="col-md-3">
                                  <button type="submit" class="btn btn-success">Şifre Güncelle</button>
                                  <input type="button" name="sifreGoster" id="sifreGoster" value="Şifre Göster" class="btn btn-success">
                                </div>
                              </div>
                            </form>
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="buzz">
                            <div class="row mt-3">
                              <?php
                              include_once 'database.php';
                              $logcek = $conn->prepare("select*from log");
                              $logcek->execute();

                              while ($row = $logcek->fetch(PDO::FETCH_ASSOC)) {

                              ?>
                                <div class="col-md-4">
                                  <label>Kullanıcı:&nbsp;<?=$row["kullanici"]?></label>
                                </div>
                                <div class="col-md-4">
                                  <label> İş:&nbsp;&nbsp;<b><?=$row["is"]?></b></label>
                                </div>
                                <div class="col-md-4">
                                  <label>Tarih:&nbsp;<?=$row["tarih"]?></label>
                                </div>

                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </main>
      <?php include_once 'inc-footer.php' ?>
    </div>
  </div>


  <script>
    $(document).ready(function() {
      $("#kullaniciAdiGoster").click(function() {
        var datastring;
        $.ajax({
          type: 'get',
          url: 'kullanicigetir.php',
          data: datastring,
          success: function(data) {

            $("#kullaniciAdiAjax").empty();
            $("#kullaniciAdiAjax").append(data.substring(0, data.length - 1));
          }
        })
      })
      $("#sifreGoster").click(function() {
        var datastring;
        $.ajax({
          type: 'get',
          url: 'sifregetir.php',
          data: datastring,
          success: function(data) {

            $("#sifreAjax").empty();
            $("#sifreAjax").append(data.substring(0, data.length - 1));
          }
        })
      })
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/datatables-demo.js"></script>
  <script>

  </script>
</body>

</html>