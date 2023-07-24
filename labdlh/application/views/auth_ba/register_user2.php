<section class="dark-bg section-padding">
<div class="container"> 
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading"></div>
        <div class="panel-body">
          <?php echo form_open('auth/register' , 'class="form-horizontal"');?>
          
          <div class="form-group row">
            <label for="first_name" class="col-md-3 control-label">
        		<?php //echo lang('create_user_fname_label', 'first_name');?>
                Nama Lengkap:
            </label>
            <div class="col-md-4">
               	   <?php echo form_input($first_name);?>
            </div>
            <?php echo form_error('first_name') ; ?>
          </div>

          <div class="form-group row">
            <label for="ktp" class="col-md-3 control-label">
        		 Nomor KTP (NIK):
            </label>
            <div class="col-md-4">
               <?php echo form_input($nik);?>
            </div>
             <?php echo form_error('nik') ; ?>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-3 control-label">
        		  <?php echo lang('create_user_email_label', 'email');?>
            </label>
            <div class="col-md-4">
              <?php echo form_input($email);?>
            </div>
              <?php echo form_error('email') ; ?>
          </div>

          <div class="form-group row">
            <label for="phone" class="col-md-3 control-label">
        		  <?php echo lang('create_user_phone_label', 'phone');?>
            </label>
            <div class="col-md-4">
              <?php echo form_input($phone);?>
            </div>
              <?php echo form_error('phone') ; ?>
          </div>


          <div class="form-group row">
            <label for="password" class="col-md-3 control-label">
        		   <?php echo lang('create_user_password_label', 'password');?> 
            </label>
            <div class="col-md-4">
              <?php echo form_input($password);?>
            </div>
             <?php echo form_error('password') ; ?>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-3 control-label">
        		  <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
            </label>
            <div class="col-md-4">
               <?php echo form_input($password_confirm);?>
            </div>
             <?php echo form_error('password_confirm') ; ?>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-md-3 control-label">
            </label>
            <div class="col-md-4">
              <?php echo form_submit('submit', lang('create_user_submit_btn'),'class="btn btn-info"');?>
            </div>
          </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</div><!-- /.container -->
</section>