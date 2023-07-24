<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title><?php
    if(isset($title)){
      echo $title;
      $a_home = "active";
  }
?></title>
<!-- Favicon -->
<link rel="icon" href="<?php echo base_url()?>images/blh.png">
<!-- Core Stylesheet -->
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>template/mosh/style.css">
<link rel="stylesheet" href="<?php echo base_url()?>template/mosh/css/responsive.css">
<link rel="stylesheet" href="<?php echo base_url()?>template/mosh/css/zoom.css">
<!-- <link rel="stylesheet" href="<?php echo base_url()?>template/mosh/css/bootstrap4.min.css"> -->


</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="mosh-preloader"></div>
    </div>

    <?php
    $nama_aplikasi = "<div style='background-image: url(img/background-atas.jpg); height: 100px;'></div>";
    $class_header = 'class="header_area clearfix"';
    if (isset($title)) {
        if ($title<>"Home") {
            // echo "title =======================".$title;
            $nama_aplikasi = "";
            $class_header = 'class="header_area_2 clearfix"';
        }
    }
    // print_r($nama_aplikasi);die();
    ?>

    <!-- ***** Header Area Start ***** -->
    <header <?php echo $class_header; ?>>

        <!-- <div style="background-image: url('img/background-atas.jpg'); height: 100px;"></div> -->
        <?php echo $nama_aplikasi; ?>
        <div class="container-fluid h-100">
            <div class="row h-10">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <!-- <a class="navbar-brand" href="<?php echo base_url()?>"><img src="<?php echo base_url()?>images/logo_kecil.png" alt="logo"></a> -->

                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar" aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <li class="nav-item <?php echo $a_home; ?>"><a class="nav-link" href="<?php echo base_url()?>">Home</a></li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="profil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>
                                        <div class="dropdown-menu" aria-labelledby="profil">
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/visi-dan-misi'?>">Visi & Misi</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/kebijakan'?>">Kebijakan</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/struktur-organisasi-dan-personil'?>">Struktur Organisasi & Personil</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/tugas-poko-dan-fungsi'?>">Tugas Pokok & Fungsi</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/landasan-hukum'?>">Landasan Hukum</a>
                                            <!-- <div class="dropdown-divider"></div> -->
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Jenis Layanan</a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/pengujian'?>">Pengujian Air, Udara, Tanah</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/alur-pelayanan'?>">Ketentuan Pengiriman</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/parameter-pengujian'?>">Parameter Pengujian</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/pengambilan-contoh-uji'?>">Pengambilan Contoh Uji</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk Hukum</a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/perpres'?>">PP / Perpres</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/permen-lh'?>">Permen LH</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/pergub'?>">Pergub</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/perbup'?>">Perbup / Perda</a>
                                            <a class="dropdown-item" href="<?php echo base_url().'konten/konten_detail/permenkes'?>">Permenkes</a>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo base_url()?>konten/konten_detail/contact"><i class="glyphicon glyphicon-gift"></i> Contact</a>
                                    </li>
                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="moshDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
                                        <div class="dropdown-menu" aria-labelledby="moshDropdown">
                                            <a class="dropdown-item" href="<?php echo base_url()?>konten/search/berita">Berita</a>
                                            <a class="dropdown-item" href="<?php echo base_url()?>konten/search/artikel">Artikel</a>
                                            <a class="dropdown-item" href="<?php echo base_url()?>konten/search/info">Informasi</a>
                                        </div>
                                    </li> -->
                                    <?php if($this->ion_auth->in_group(array('admin','members','analis','manager_teknis','ka_lab','admin_pelayanan'))){?>
                                       <li class="nav-item"><a class="nav-link" href="<?php echo base_url()?>admin"><i class="glyphicon glyphicon-gift"></i> Admin Panel</a></li>
                                   <?php }?>
                               </ul>
                               <!-- Search Form Area Start -->
                               <div class="search-form-area animated">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                    <button type="submit" class="d-none"><img src="<?php echo base_url()?>img/mosh/core-img/search-icon.png" alt="Search"></button>
                                </form>
                            </div>
                            <!-- Search btn -->
                            <div class="search-button">
                                <a href="#" id="search-btn"><img src="<?php echo base_url()?>img/mosh/core-img/search-icon.png" alt="Search"></a>
                            </div>
                            <!-- Login/Register btn -->
                            <div class="login-register-btn">
                              <?php if (!$this->ion_auth->logged_in()){?>
                                  <a href="<?php echo base_url()?>auth/login">Login</a>
                                  <!-- <a href="<?php echo base_url()?>auth/register">/ Register</a> -->
                              <?php }else{?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="dd" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php 
                                            // echo $this->session->userdata('email');

                                            $users = $this->ion_auth->user()->row();
                                            echo $users->first_name;
                                        ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dd">
                                        <a class="dropdown-item" href="<?php echo base_url('auth/change_password')?>">Ubah Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url('auth/logout')?>">Logout</a>
                                    </div>
                                </li>
                            <?php }?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
</header>
<!-- ***** Header Area End ***** -->

<!-- ***** Welcome Area Start ***** -->
<?php
if(isset($slider)){
    echo $this->template->slider;
}else{
    if(isset($title)){
      echo "
      <div class='jumbotron'>
      <h1> <font face='Times'>".$title."</font></h1>
      </div>
      ";
  }else{
    echo "
    <div class='jumbotron'>
    <h1>Menu</h1>
    </div>
    ";
}
}
?>
<!-- ***** Welcome Area End ***** -->

<!-- content -->
<?php echo $this->template->content;?>

<!-- ***** Footer Area Start ***** -->
<div class="header-kata-mutiara">
    <marquee>
        <?php 
        $mutiara = $this->db->query("select * from kata_mutiara where aktif = '1'")->result();
        foreach ($mutiara as $item) {
            echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
            echo "<b>$item->kata_mutiara</b>";
        }
        ?>
    </marquee>
</div>
<footer class="footer-area clearfix">
    <!-- Fotter Bottom Area -->
    <div class="footer-bottom-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="footer-bottom-content h-100 d-md-flex justify-content-between align-items-center">
                        <div class="copyright-text">
                            <img src="<?php echo base_url().'img/bsre.png' ?>" width="100" height="50">
                        </div>
                        <div class="copyright-text">
                            <p> Copyright &copy; 2018 <span color="red">UPTD LAB Lingkungan</span></p>
                        </div>
                        <div class="footer-social-info">
                            <a href="https://www.instagram.com/dlh_banyuwangi/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://web.facebook.com/DLH-Banyuwangi-287947191622203/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/dlh_banyuwangi" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="http://dlh.banyuwangikab.go.id/" target="_blank"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        </div>
                        <div>
                         <!-- Histats.com  (div with counter) -->
                         <div id="histats_counter"></div>
                         <!-- Histats.com  START  (aync)-->
                         <script type="text/javascript">var _Hasync= _Hasync|| [];
                         _Hasync.push(['Histats.start', '1,4604862,4,408,270,55,00011111']);
                         // _Hasync.push(['Histats.start', '1,4604862,4,3,170,30,00011111']);
                         _Hasync.push(['Histats.fasi', '1']);
                         _Hasync.push(['Histats.track_hits', '']);
                         (function() {
                            var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                            hs.src = ('//s10.histats.com/js15_as.js');
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                        })();</script>
                        <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4604862&101" alt="counter" border="0"></a></noscript>
                        <!-- Histats.com  END  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- ***** Footer Area End ***** -->

<!-- jQuery-2.2.4 js -->
<script src="<?php echo base_url()?>template/mosh/js/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="<?php echo base_url()?>template/mosh/js/popper.min.js"></script>
<!-- Bootstrap js -->
<!-- <script src="<?php echo base_url()?>template/mosh/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url()?>template/mosh/js/bootstrap4.min.js"></script>
<!-- All Plugins js -->
<script src="<?php echo base_url()?>template/mosh/js/plugins.js"></script>
<!-- Active js -->
<script src="<?php echo base_url()?>template/mosh/js/active.js"></script>
<script src="<?php echo base_url()?>template/mosh/js/zoom.js"></script>
</body>

</html>
