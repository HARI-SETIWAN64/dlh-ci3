<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"><?php echo $this->template->title->default(""); ?></h3> 
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Email - Hp</th>
          <th>Instansi</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user):?>
          <tr>

            <td>
              <?php echo $user->first_name;?></br>
              <strong> <?php echo $user->nik;?></strong>
            </td>
            <td>
              <?php echo $user->email." - ";?>
              <strong> <?php echo $user->phone;?></strong>
            </td>
            <td>
              <?php echo $user->company ;?>
            </td>

            <td>
              <?php 

              if($user->active == "1"){$tampil = "Aktive"; $aktive_id='0'; $color="black";}
              else if($user->active == "0"){ $tampil = "NonAktive";  $aktive_id='1'; $color="red";}
              ?>
              <a href="javascript:void(0)" onclick="active('<?php echo $user->id?>', <?php echo $aktive_id; ?>)"><?php echo "<font color='$color'>$tampil </font>";?></i></a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#dataTables-example').DataTable({
      responsive: true
    });
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


  var url = "<?php echo base_url()?>";
  function active(id,tampil){
    $.ajax({
      url: url+'ujibanding/admin/tampil/'+id+'/'+tampil, 
      success: function(r){
        json = $.parseJSON(r);
        if (json.status == 'success') {
          location.reload(); 
       }else{
        alert('gagal...')
      }
    },
    type: "post", 
    dataType: "html"
  }); 
    return false;
  }
</script>
