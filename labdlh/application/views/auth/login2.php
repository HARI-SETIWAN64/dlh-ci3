<div class="wrap">
  <?php echo form_open('auth/login'.($this->input->get('continue') ? '/?continue='.urlencode($this->input->get('continue')) : ''), 'class="form-horizontal"');?>
  <div class="avatar">
    <img src="<?php echo base_url();?>images/blh.png" class="img-responsive" style="max-height: 200px;" />
  </div>
  <!-- <input type="text" placeholder="username" required> -->
  <?php echo form_input($identity);?> <?php echo form_error('identity') ; ?>
  <div class="bar">
    <i></i>
  </div>
  <!-- <input type="password" placeholder="password" required> -->
  <?php echo form_input($password);?> <?php echo form_error('password') ; ?>
  <!-- <a href="" class="forgot_link">forgot ?</a> -->
  <br />
  <br />
  <button type="submit">Sign in</button>
  <?php echo form_close();?>
</div>