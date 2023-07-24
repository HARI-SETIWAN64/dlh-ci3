<?php  $tem = 'ok';  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->template->title->default(''); ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url()?>template/<?php  echo $tem; ?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/<?php  echo $tem; ?>/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/<?php  echo $tem; ?>/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/<?php  echo $tem; ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/<?php  echo $tem; ?>/dist/css/skins/_all-skins.min.css">
  <link href="<?php echo base_url()?>template/<?php  echo $tem; ?>/css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo base_url();?>images/logo_kab.png"/>
  <link href="<?php echo base_url()?>assets/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/owl-carousel/owl.theme.css" rel="stylesheet">

  <link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet">

  <!-- jQuery 2.2.0 -->
  <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <script> var site='<?php echo base_url()?>'; </script>
  <style type="text/css">
  .navbar-toggler-icon {
    display: inline-block;
    width: 1.5em;
    height: 1.5em;
    vertical-align: middle;
    content: "";
}
</style>
</head>


<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="<?php if(isset($menu)){echo ismenu($menu,'home');}?>">
                                <a href="<?php echo base_url()?>">Beranda</a>
                            </li>
                        </ul>
                    </div>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php if ($this->ion_auth->is_admin()){?>
                                <li><a href="<?php echo base_url()?>admin"><i class="glyphicon glyphicon-gift"></i> Admin Panel</a></li>

                            <?php }else if($this->ion_auth->in_group(array('members','analis','manager_teknis','ka_lab','Admin Pelayanan'))){?>

                                <li><a href="<?php echo base_url()?>admin"><i class="glyphicon glyphicon-gift"></i> Admin Panel</a></li>
                            <?php }?>



                            <?php if (!$this->ion_auth->logged_in()){?>
                                <li><a href="<?php echo base_url()?>auth/login"><i class="glyphicon glyphicon-user"></i> Login</a></li>
                            <?php }else{?>
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <!-- The user image in the navbar-->
                                        <i class="glyphicon glyphicon-user"></i>
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs"><?php echo $this->session->userdata('email')?> <i class="caret"></i></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="<?php echo base_url('auth/change_password')?>" class="btn btn-default btn-flat">Password</a>
                                            </div>


                                            <div class="pull-right">
                                                <a href="<?php echo base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>

        <?php if(isset($top)){?>
            <div class="tops" style="margin-top:15px; margin-bottom:15px;">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
        <?php }?>


        <!-- Full Width Column -->
        <div class="content-wrapper">
            <?php if (! empty($message)) { ?>
                <!--alert-->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php  echo $message; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container -->
                <!--alert/-->

            <?php } ?>
            <?php echo $this->template->content; ?>





        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="container">
                <div class="pull-right hidden-xs"></div>
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->


    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>


    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/fastclick/fastclick.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/dist/js/app.min.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/dist/js/demo.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/app.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.bootpag.min.js"></script>
    <script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/jquery-expander/jquery.expander.min.js"></script>
    <script src="<?php echo base_url()?>assets/owl-carousel/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
          $("#owl-demo").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 8,
          itemsDesktop : [1199,3],
          itemsDesktopSmall : [979,3]
      });
      });
  </script>


</body>
</html>
