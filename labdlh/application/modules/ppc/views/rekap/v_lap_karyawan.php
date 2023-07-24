<div class="table">
  <table class="table table-bordered table-striped">
    <tr>
      <td align="center" width="5%"><b>No</td>
      <td align="center" width="35%"><b>Karyawan</td>
      <td align="center" width="15%"><b>Belum Dikerjakan</b></td>
      <td align="center" width="15%"><b>Sedang Dikerjakan</b></td>
      <td align="center" width="15%"><b>Selesai Tepat Waktu</b></td>
      <td align="center" width="15%"><b>Selesai Terlambat</b></td>
    </tr>

    <?php
    $belum_dikerjakan=$sedang_dikerjakan=$tepat_waktu=$terlambat=0;
    $no=0;
    ?>
    <?php 
      foreach($items as $row) :
        $no++;
        if($row->belum_dikerjakan == 0){ $c_belum_dikerjakan = 'bgcolor="#f27e7e"'; } else { $c_belum_dikerjakan = ''; }
        if($row->sedang_dikerjakan == 0){ $c_sedang_dikerjakan = 'bgcolor="#f27e7e"'; } else { $c_sedang_dikerjakan = ''; }
        if($row->tepat_waktu == 0){ $c_tepat_waktu = 'bgcolor="#f27e7e"'; } else { $c_tepat_waktu = ''; }
        if($row->terlambat == 0){ $c_terlambat = 'bgcolor="#f27e7e"'; } else { $c_terlambat = ''; }
      ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->first_name; ?></td>
        <td align="center" <?php echo $c_belum_dikerjakan; ?>> <?php echo $row->belum_dikerjakan;?></td>
        <td align="center" <?php echo $c_sedang_dikerjakan; ?>> <?php echo $row->sedang_dikerjakan;?></td>
        <td align="center" <?php echo $c_tepat_waktu; ?>> <?php echo $row->tepat_waktu;?></td>
        <td align="center" <?php echo $c_terlambat; ?>> <?php echo $row->terlambat;?></td>
      </tr>
      <?php
      $belum_dikerjakan += $row->belum_dikerjakan;
      $sedang_dikerjakan += $row->sedang_dikerjakan;
      $tepat_waktu += $row->tepat_waktu;
      $terlambat += $row->terlambat;
      ?>
    <?php endforeach; ?>
    <tr>
      <td colspan="2"><b>Total </b></td>
      <td align="center"> <b><?php echo $belum_dikerjakan; ?></b></td>
      <td align="center"> <b><?php echo $sedang_dikerjakan; ?></b></td>
      <td align="center"> <b><?php echo $tepat_waktu;?></b></td>
      <td align="center"> <b><?php echo $terlambat;?></b></td>
    </tr>
    <?php $jumlahbel = $belum_dikerjakan+$sedang_dikerjakan;
          $jumlahsel = $tepat_waktu+$terlambat;
          $jumlah = $jumlahbel+$jumlahsel; 
    ?>
    <tr>
      <td colspan="2"><b>Total Keseleruhan</b></td>
      <td colspan="10" align="center"><font color="green"><b><?php echo $jumlah; ?></b></font></td>
    </tr>
  </table>
</div>
