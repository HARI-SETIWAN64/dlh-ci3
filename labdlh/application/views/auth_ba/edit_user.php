<div class="container">  
<div class="row">
<div class="col-md-12">
<div class="panel panel-info">
  <div class="panel-heading">Edit Pengguna</div>
  <div class="panel-body">



<?php echo form_open(uri_string(),'class="form-horizontal"');?>
  <div class="form-group">
    <label for="username" class="col-md-3 control-label">
		Nama Pengguna (username):
    </label>
    <div class="col-md-4">
       	   <?php echo form_input($username);?>
    </div>
    <?php echo form_error('username') ; ?>
  </div>
  
  <div class="form-group">
    <label for="first_name" class="col-md-3 control-label">
		<?php //echo lang('create_user_fname_label', 'first_name');?>
        Nama Lengkap:
    </label>
    <div class="col-md-4">
       	   <?php echo form_input($first_name);?>
    </div>
    <?php echo form_error('first_name') ; ?>
  </div>


  <div class="form-group">
    <label for="ktp" class="col-md-3 control-label">
		 Nomor KTP (NIK):
    </label>
    <div class="col-md-4">
       	         <?php echo form_input($nik);?>
    </div>
     <?php echo form_error('nik') ; ?>
  </div>


  <div class="form-group">
    <label for="email" class="col-md-3 control-label">
		  <?php echo lang('create_user_email_label', 'email');?>
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($email);?>
    </div>
      <?php echo form_error('email') ; ?>
  </div>
  
  
  <div class="form-group">
    <label for="phone" class="col-md-3 control-label">
		  <?php echo lang('create_user_phone_label', 'phone');?>
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($phone);?>
    </div>
       <?php echo form_error('phone') ; ?>
  </div>
  
  

  <div class="form-group">
    <label for="password" class="col-md-3 control-label">
		   <?php echo lang('create_user_password_label', 'password');?> 
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($password);?>
    </div>
     <?php echo form_error('password') ; ?>
  </div>
  
  <div class="form-group">
    <label for="password" class="col-md-3 control-label">
		    <?php echo lang('create_user_password_confirm_label', 'password_confirm');?>
    </label>
    <div class="col-md-4">
       	    <?php echo form_input($password_confirm);?>
    </div>
     <?php echo form_error('password_confirm') ; ?>
  </div>
  


  <div class="form-group">
    <label for="" class="col-md-3 control-label">
		 
    </label>
    <div class="col-md-4">


      <?php if ($this->ion_auth->is_admin()): ?>

          <h3><?php echo lang('edit_user_groups_heading');?></h3>
          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>




    </div>
  </div>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>


  <div class="form-group">
    <label for="" class="col-md-3 control-label">
		 
    </label>
    <div class="col-md-4">
<?php echo form_submit('submit', 'Simpan','class="btn btn-info"');?>
    </div>
  </div>

<?php echo form_close();?>

</div>
</div>


</div>
</div></div>









