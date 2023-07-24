<div class="row">
<div class="col-md-12">
<div class="panel panel-info">
  <div class="panel-heading"><?php echo lang('change_password_heading');?></div>
  <div class="panel-body">
    <?php echo $this->session->flashdata('feedback'); ?>

<?php echo form_open('admin/change_password' , 'class="form-horizontal"');?>

  <div class="form-group">
    <label for="old_password" class="col-md-4 control-label">
		  <?php echo lang('change_password_old_password_label', 'old_password');?> 
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($old_password);?>
    </div>
     <?php echo form_error('old') ; ?>
  </div>



  <div class="form-group">
    <label for="new_password" class="col-md-4 control-label">
		 <?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?>
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($new_password);?>
    </div>
     <?php echo form_error('new') ; ?>
  </div>



  <div class="form-group">
    <label for="new_password_confirm" class="col-md-4 control-label">
		    <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?>
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($new_password_confirm);?>
    </div>
    <?php echo form_error('new_confirm') ; ?>
  </div>


  <div class="form-group">
    <label for="" class="col-md-4 control-label">

    </label>
    <div class="col-md-4">
      <?php echo form_input($user_id);?>
      <?php echo form_submit('submit', lang('change_password_submit_btn'),'class="btn btn-info"');?>
    </div>
  </div>






<?php echo form_close();?>


</div>
</div>


</div>
</div>
