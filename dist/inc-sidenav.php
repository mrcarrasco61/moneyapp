<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Genel Bakış</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Anasayfa
                    </a>
            
                    <div class="sb-sidenav-menu-heading">Hesap İşlemleri</div>
                    <a class="nav-link" href="hesaplar.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Hesapları Görüntüle
                    </a>
                    
                    <a class="nav-link" href="hesapekle.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Hesap Ekle
                    </a>

                    <a class="nav-link" href="hesaphareketleri.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                        Hesap Hareketleri
                    </a>

                    <div class="sb-sidenav-menu-heading">Kategori ve Harcama İşlemleri</div>
                    <a class="nav-link" href="kategoriler.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Kategoriler
                    </a>
                    
                    <a class="nav-link" href="harcamahareketleri.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Harcama Hareketleri
                    </a>

                    <div class="sb-sidenav-menu-heading">Kullanıcı</div>
                    <a class="nav-link" href="kullanicidetay.php">
                        <div class="sb-nav-link-icon"><i class="fas  fa-user"></i></div>
                        Kullanıcı Ayarları
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $_SESSION['kadi']; ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">


    </div>
</div>