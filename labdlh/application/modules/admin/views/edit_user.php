<div class="row">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">Edit Pengguna</div>
      <div class="panel-body">
        <?php echo form_open(uri_string(),'class="form-horizontal"');?>
        <div class="form-group">
          <label for="username" class="col-md-3 control-label">
            Nama Pengguna:
          </label>
          <div class="col-md-4">
            <?php echo form_input($username);?>
          </div>
          <?php echo form_error('username') ; ?>
        </div>

        <div class="form-group">
          <label for="no_telp" class="col-md-3 control-label">Nama Lengkap * :</label>
          <div class="col-md-4">
            <?php echo form_input($first_name);?>
          </div>
          <?php echo form_error('first_name') ; ?>
        </div>


      <!--   <div class="form-group">
          <label for="ktp" class="col-md-3 control-label">
            Nomor KTP (NIK):
          </label>
          <div class="col-md-4">
            <?php echo form_input($nik);?>
          </div>
          <?php echo form_error('nik') ; ?>
        </div> -->

        <div class="form-group">
          <label for="no_telp" class="col-md-3 control-label">Nama Perusahaan * :</label>
          <div class="col-md-4">
            <?php echo form_dropdown('perusahaan_id',$perusahaan,$user->perusahaan_id,'class="form-control" id="perusahaan_id" ');?>
          </div>
          <?php echo form_error('perusahaan_id') ; ?>
        </div>
        <div class="form-group">
          <label for="no_telp" class="col-md-3 control-label">Email * :</label>
          <div class="col-md-4">
            <?php echo form_input($email);?>
          </div>
          <?php echo form_error('email') ; ?>
        </div>


        <div class="form-group">
          <label for="no_telp" class="col-md-3 control-label">No Telp * :</label>
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
          <label for="password" class="col-md-3 control-label">
            Kecamatan
          </label>
          <div class="col-md-4">
            <?php echo form_dropdown('no_kec',$kec,$user->no_kec,'class="form-control" onchange="getkel()" id="no_kec" ');?>
          </div>
          <?php echo form_error('no_kec') ; ?>
        </div>
        <div class="form-group">
          <label for="password" class="col-md-3 control-label">
            Desa / Kelurahan
          </label>
          <div class="col-md-4">
            <div id="kelurahan">
              <?php 
              // if($user->no_kel){
              // echo "=====";
              // print_r($user->no_kec);die();
              if(!empty($user->no_kec)){$kel = $this->base_model->get_kel_list($user->no_kec);}
              else{$kel = array();}	   
                echo form_dropdown('no_kel',$kel,$user->no_kel,'class="form-control"');
              // }else{
              //   echo form_dropdown('no_kel',array(),'','class="form-control"');   
              // }	   
              ?>
            </div>
          </div>
          <?php echo form_error('no_kel') ; ?>
        </div>
          <div class="form-group">
            <label for="no_telp" class="col-md-3 control-label">Alamat * :</label>
            <div class="col-md-4">
              <?php 
              $data = array(
                'name'        => 'alamat',
                'id'          => 'alamat',
                'value'       => isset($user->alamat) ? $user->alamat : '',
                'rows'        => '5',
                'cols'        => '10',
                'style'       => 'width:100%',
                'class'       => 'form-control'
              );
              echo form_textarea($data);
              ?>
              <?php echo form_error('alamat') ; ?>
            </div>
          </div>
        <div class="form-group">
          <label for="" class="col-md-3 control-label">
          </label>
          <div class="col-md-4">
            <?php if ($this->ion_auth->in_group(array('admin', 'admin_pelayanan'))): ?>
              <h3><?php echo lang('edit_user_groups_heading');?></h3>
              <ul>
                <?php foreach ($groups as $group):?>
                  <?php if($group['name']<>"admin"){ ?>
                  <li>
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
                      <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
                    </label>
                  </li>
                <?php } ?>
                <?php endforeach?>
              </ul>
            <?php endif ?>
          </div>
        </div>

        <?php echo form_hidden('id', $user->id);?>
        <?php //echo form_hidden($csrf); ?>
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
</div>




<script type="application/javascript">
  $(function() {
    // getkel();
  });

  function getkel(){
    kec = $("#no_kec").val();	
    load('dropdown/kelurahan/'+kec,'#kelurahan');
  }


</script>




