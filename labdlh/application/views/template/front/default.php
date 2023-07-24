
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $this->template->title->default(''); ?></title>
  <link rel="stylesheet" href="<?php echo base_url()?>template/login/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>template/login/css/reset.css">
</head>
<body style="background-image: url(<?php echo base_url();?>template/login/gogreen.png);  background-repeat: no-repeat;   background-size: cover; background-size: 50%; background-attachment: fixed;
  background-position: center; ">
  <div class="container">
   <?php if (! empty($message)) { ?>    
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
<script src="<?php echo base_url()?>template/login/js/index.js"></script>
</body>
</html>
