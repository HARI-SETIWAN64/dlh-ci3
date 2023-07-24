
<section class="section-padding">
<div class="container">
<div class="row" style="margin-top:50px;">
  <div class="col-md-6 col-md-offset-3">
    <div class="panel panel-info">
      <div class="panel-heading"><center>
  	  <!-- <img src="<?php echo base_url();?>images/logob_ems.png" class="img-responsive" style="width:100%; background-position:center;" /> -->
      </center>
  	  </div>
      <div class="panel-body">
        <?php echo form_open('auth/login'.($this->input->get('continue') ? '/?continue='.urlencode($this->input->get('continue')) : ''), 'class="form-horizontal"');?>
        <div class="form-group">
          <label for="identity" class="col-md-4 control-label">
              email :
          </label>
          <div class="col-md-8">
              <?php echo form_input($identity);?> <?php echo form_error('identity') ; ?>
          </div>

        </div>
        <div class="form-group">
          <label for="password" class="col-md-4 control-label">
              Password :
          </label>
          <div class="col-md-8">
                 <?php echo form_input($password);?> <?php echo form_error('password') ; ?>
          </div>
        </div>
        <div class="form-group">
          <label for="remember" class="col-md-4 control-label">

          </label>
          <div class="col-md-4">
               <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-success btn-block"');?>
          </div>
        </div>
        <?php echo form_close();?>
      </div>
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->
</section>
