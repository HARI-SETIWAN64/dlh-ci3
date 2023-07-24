<!DOCTYPE html>
<?php //header("X-XSS-Protection: 0"); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $this->template->title->default("Site"); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>template/admin/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>template/admin/plugins/timepicker/bootstrap-timepicker.css">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/fontawesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/jquery-ui.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/admin.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/style.css">
  <script src="<?php echo base_url()?>template/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- <link href='<?php echo base_url();?>assets/fullcalendar.css' rel='stylesheet' /> -->
  <link rel="stylesheet" href="<?php echo base_url()?>template/admin/plugins/fullcalendar/fullcalendar.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
  <script src="<?php echo base_url();?>template/admin/plugins/fullcalendar/fullcalendar.js"></script>
  <!-- <script src="<?php echo base_url();?>template/admin/plugins/fullcalendar/moment.js"></script> -->
  <!-- <script src="<?php echo base_url();?>assets/fullcalendar.min.js"></script> -->
  <!-- <script src="<?php echo base_url();?>assets/jquery.min.js"></script> -->
  
  <link rel="icon" href="<?php echo base_url()?>images/blh.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <base href="<?php echo base_url()?>">  
  <script>
    var site='<?php echo site_url()?>';
  </script>
</head>
<body class="hold-transition skin-green fixed sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url()?>admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SIMPLING</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="<?php echo base_url()?>admin" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url()?>"><i class="glyphicon glyphicon-globe"></i> Frontend</a></li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <span class="hidden-xs">       
                  <?php 
                    // echo $this->session->userdata('email');
                  $users = $this->ion_auth->user()->row();
                  echo $users->first_name;
                    // print_r($this->ion_auth->user()->row());
                  ?>
                </span>
                &nbsp;&nbsp;<i class="fa fa-angle-down pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url('admin/change_password')?>" class="btn btn-default btn-flat">Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- =============================================== -->


    <?php $this->load->view('template/admin_side')?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content">

        <?php if (! empty($message)) { ?>
          <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php  echo $message; ?>
          </div>
        <?php } ?>
        <?php echo $this->template->content; ?>
        <div class="modal fade"  id="ajax-modal"  tabindex="-1" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">

                <div id="ajax-modalin"></div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.0.1
      </div>
      <strong>Copyright &copy; <?php echo date('Y',strtotime('NOW'));?> All rights
        reserved.
      </footer>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 2.2.0 -->
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()?>template/admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url()?>template/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>template/admin/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()?>template/admin/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()?>assets/js/jquery.bootpag.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/dist/js/demo.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.bootpag.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/plugins/jquery-expander/jquery.expander.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/plugins/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/jquery-ui.min.js"></script>
    <script src="<?php echo base_url()?>template/admin/app.js"></script>
    <!-- <script src="<?php echo base_url()?>template/admin/jquery-ui.js"></script> -->
    <script src="<?php echo base_url()?>template/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url()?>template/admin/plugins/timepicker/bootstrap-timepicker.js"></script>
    <script src="<?php echo base_url()?>template/admin/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url()?>template/admin/ajaxfileupload.js"></script>

  </body>
  </html>
