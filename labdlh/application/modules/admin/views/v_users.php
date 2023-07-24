<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<div class="box">
  <div class="box-header">
    <h3 class="box-title"><?php echo $this->template->title->default(""); ?></h3>
    
    
    <!-- <a href="<?php echo base_url();?>admin/create_user" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp; TAMBAH PENGGUNA</a> -->
    <a href="<?php echo base_url();?>admin/create_user" class="btn btn-primary btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i>&nbsp; TAMBAH PENGGUNA</a>
    
    
    
    
  </div>
  <!-- /.box-header -->
  <div class="box-body">

    <table id="example1" class="table table-bordered table-striped">
     <thead>
       <tr>
        <th>Nama / Nik</th>
        <th>Email - Hp</th>
        <th>Groups</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
     <?php foreach ($users as $user):?>
      <tr>
        
       <td><?php echo $user->first_name;?></br>
         <strong> <?php echo $user->nik;?></strong></td>
         <td><?php echo $user->email;?> - 
           <strong> <?php echo $user->phone;?></strong>
         </td>
         <td>
          <?php foreach ($user->groups as $group):?>
           <?php echo $group->description ;?>
         <?php endforeach?>
       </td>
       
       <td><center><?php echo ($user->active) ? anchor("admin/deactivate/".$user->id, 'Active') : anchor("admin/activate/". $user->id, 'Inactive');?></center></td>         
       
       <td><center><?php echo anchor("admin/edit_user/".$user->id, 'Edit','class="btn btn-info btn-small"') ;?></center></td>
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
</script>
