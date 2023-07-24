<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="70%">Jenis Tugas</th>
      <th width="15%">Belum Dikerjakan</th>
      <th width="15%">Sedang Dikerjakan</th>
    </tr>

    <?php
    $belum_dikerjakan=$sedang_dikerjakan=0;
    ?>
    <?php foreach($items as $row) :
      if($row->belum_dikerjakan == 0){ $c_belum_dikerjakan = 'bgcolor="#f27e7e"'; } else { $c_belum_dikerjakan = ''; }
      if($row->sedang_dikerjakan == 0){ $c_sedang_dikerjakan = 'bgcolor="#f27e7e"'; } else { $c_sedang_dikerjakan = ''; }?>
      <tr>
        <td><?php echo $row->jenis_tugas; ?></td>
        <td align="center" <?php echo $c_belum_dikerjakan;?>><?php echo ($row->belum_dikerjakan);?></td>
        <td align="center" <?php echo $c_sedang_dikerjakan; ?>><?php echo ($row->sedang_dikerjakan);?></td>
      </tr>
      <?php
      $belum_dikerjakan += $row->belum_dikerjakan;
      $sedang_dikerjakan += $row->sedang_dikerjakan;
      ?>
    <?php endforeach; ?>
    <tr>
      <td><b>Total</b></td>
      <td align="center"> <b><?php echo ($belum_dikerjakan); ?></b></td>
      <td align="center"> <b><?php echo ($sedang_dikerjakan); ?></b></td>
    </tr>
    <?php $jumlah = $belum_dikerjakan+$sedang_dikerjakan; ?>
    <tr>
      <td><b>Total Keseluruhan</b></td>
      <td colspan="12" align="center"><font color="green"><b><?php echo ($jumlah); ?></b></font></td>
    </tr>
  </table>
</div>
