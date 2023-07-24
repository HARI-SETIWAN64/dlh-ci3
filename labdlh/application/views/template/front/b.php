<?php  $tem = 'b';  ?>
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
<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/jQuery/jQuery-2.2.0.min.js"></script>
 	<script> var site='<?php echo base_url()?>'; </script>
</head>
<body class="hold-transition fixed skin-green-light layout-top-nav">
<div class="wrapper">
<?php echo $this->template->header_top ; ?>
  <!-- Full Width Column -->
<div class="content-wrapper">
<?php if(isset($top)){?>
<?php $this->load->view($top);?>
<?php }?>
	<?php if (! empty($message)) { ?>
    <!--alert-->
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning alert-dismissable" style="margin-top:10px;">
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
      <div class="pull-right hidden-xs">

      </div>
      <strong>Copyright &copy; 2018 <a href="http://emskab.banyuwangikab.go.id">E-Monitoring Kegiatan SKPD Kabupaten Banyuwangi</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->


  <div class="modal fade bs-example-modal-lg"  id="ajax-modal"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					&nbsp;
				</div>
      </div>
      <div class="modal-body">
        <div id="ajax-modalin"></div>
      </div>
      <div class="modal-footer">
       <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Close
				</button>
      </div>
    </div>
  </div>
</div><!-- /.modal -->


<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>


<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/fastclick/fastclick.js"></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/dist/js/app.min.js"></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/dist/js/demo.js"></script></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/app.js"></script></script>
<script src="<?php echo base_url()?>assets/js/jquery.bootpag.min.js"></script>
<script src="<?php echo base_url()?>template/<?php  echo $tem; ?>/plugins/jquery-expander/jquery.expander.min.js"></script>



</body>
</html>
