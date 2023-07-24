<div class="table">
  <table class="table table-bordered table-striped">
    <tr>
      <td align="center" width="5%"><b>No</td>
      <td align="center" width="35%"><b>Nama</td>
      <td align="center" width="5%"><b>01</b></td>
      <td align="center" width="5%"><b>02</b></td>
      <td align="center" width="5%"><b>03</b></td>
      <td align="center" width="5%"><b>04</b></td>
      <td align="center" width="5%"><b>05</b></td>
      <td align="center" width="5%"><b>06</b></td>
      <td align="center" width="5%"><b>07</b></td>
      <td align="center" width="5%"><b>08</b></td>
      <td align="center" width="5%"><b>09</b></td>
      <td align="center" width="5%"><b>10</b></td>
      <td align="center" width="5%"><b>11</b></td>
      <td align="center" width="5%"><b>12</b></td>
    </tr>

    <?php
    $januari=$februari=$maret=$april=$mei=$juni=$juli=$agustus=$sepetember=$oktober=$november=$desember=0;
    $no=0;
    ?>
    <?php 
      foreach($items as $row) :
        $no++;
        if($row->januari == 0){ $c_januari = 'bgcolor="#f27e7e"'; } else { $c_januari = ''; }
        if($row->februari == 0){ $c_februari = 'bgcolor="#f27e7e"'; } else { $c_februari = ''; }
        if($row->maret == 0){ $c_maret = 'bgcolor="#f27e7e"'; } else { $c_maret = ''; }
        if($row->april == 0){ $c_april = 'bgcolor="#f27e7e"'; } else { $c_april = ''; }
        if($row->mei == 0){ $c_mei = 'bgcolor="#f27e7e"'; } else { $c_mei = ''; }
        if($row->juni == 0){ $c_juni = 'bgcolor="#f27e7e"'; } else { $c_juni = ''; }
        if($row->juli == 0){ $c_juli = 'bgcolor="#f27e7e"'; } else { $c_juli = ''; }
        if($row->agustus == 0){ $c_agustus = 'bgcolor="#f27e7e"'; } else { $c_agustus = ''; }
        if($row->sepetember == 0){ $c_sepetember = 'bgcolor="#f27e7e"'; } else { $c_sepetember = ''; }
        if($row->oktober == 0){ $c_oktober = 'bgcolor="#f27e7e"'; } else { $c_oktober = ''; }
        if($row->november == 0){ $c_november = 'bgcolor="#f27e7e"'; } else { $c_november = ''; }
        if($row->desember == 0){ $c_desember = 'bgcolor="#f27e7e"'; } else { $c_desember = ''; }
      ?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $row->nama; ?></td>
        <td align="center" <?php echo $c_januari; ?>> <?php echo $row->januari;?></td>
        <td align="center" <?php echo $c_februari; ?>> <?php echo $row->februari;?></td>
        <td align="center" <?php echo $c_maret; ?>> <?php echo $row->maret;?></td>
        <td align="center" <?php echo $c_april; ?>> <?php echo $row->april;?></td>
        <td align="center" <?php echo $c_mei; ?>> <?php echo $row->mei;?></td>
        <td align="center" <?php echo $c_juni; ?>> <?php echo $row->juni?></td>
        <td align="center" <?php echo $c_juli; ?>> <?php echo $row->juli;?></td>
        <td align="center" <?php echo $c_agustus; ?>> <?php echo $row->agustus;?></td>
        <td align="center" <?php echo $c_sepetember; ?>> <?php echo $row->sepetember;?></td>
        <td align="center" <?php echo $c_oktober; ?>> <?php echo $row->oktober;?></td>
        <td align="center" <?php echo $c_november; ?>> <?php echo $row->november;?></td>
        <td align="center" <?php echo $c_desember; ?>> <?php echo $row->desember;?></td>
      </tr>
      <?php
      $januari += $row->januari;
      $februari += $row->februari;
      $maret += $row->maret;
      $april += $row->april;
      $mei += $row->mei;
      $juni += $row->juni;
      $juli += $row->juli;
      $agustus += $row->agustus;
      $sepetember += $row->sepetember;
      $oktober += $row->oktober;
      $november += $row->november;
      $desember += $row->desember;
      ?>
    <?php endforeach; ?>
    <tr>
      <td colspan="2"><b>Total / bulan</b></td>
      <td align="center"> <b><?php echo $januari; ?></b></td>
      <td align="center"> <b><?php echo $februari; ?></b></td>
      <td align="center"> <b><?php echo $maret;?></b></td>
      <td align="center"> <b><?php echo $april;?></b></td>
      <td align="center"> <b><?php echo $mei;?></b></td>
      <td align="center"> <b><?php echo $juni;?></b></td>
      <td align="center"> <b><?php echo $juli;?></b></td>
      <td align="center"> <b><?php echo $agustus; ?></b></td>
      <td align="center"> <b><?php echo $sepetember; ?></b></td>
      <td align="center"> <b><?php echo $oktober; ?></b></td>
      <td align="center"> <b><?php echo $november; ?></b></td>
      <td align="center"> <b><?php echo $desember; ?></b></td>
    </tr>
    <?php $jumlah = $januari+$februari+$maret+$april+$mei+$juni+$juli+$agustus+$sepetember+$oktober+$november+$desember; ?>
    <tr>
      <td colspan="2"><b>Total 1 Tahun</b></td>
      <td colspan="12"><font color="#f27e7e"><b><?php echo $jumlah; ?></b></font></td>
    </tr>
  </table>
</div>
