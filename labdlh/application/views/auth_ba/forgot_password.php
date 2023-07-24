<section class="section-padding">
<div class="container">  
<div class="row">
<div class="col-md-12">
<div class="panel panel-info">
  <div class="panel-heading"><?php echo lang('forgot_password_heading');?></div>
  <div class="panel-body">


<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/forgot_password' , 'class="form-horizontal"');?>


  <div class="form-group">
    <label for="email" class="col-md-4 control-label">
		 <?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?>
    </label>
    <div class="col-md-4">
       	       	<?php echo form_input($email);?>
    </div>
  </div>



  <div class="form-group">
    <label for="" class="col-md-4 control-label">
		 
    </label>
    <div class="col-md-4">

<?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class="btn btn-info"');?>
    </div>
  </div>


<?php echo form_close();?>

</div>
</div>


</div>
</div>

</div>
</section>