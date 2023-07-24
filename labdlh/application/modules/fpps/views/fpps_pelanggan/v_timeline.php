<form method='post' action='' name='form_jabatan' class='form-horizontal' id="form_jabatan" >
<div class="panel panel-default">
  <div class="panel-heading">Timeline Dokumen</div>
    <div class="panel-body ">
        <div class="col-md-12">
          <table width="100%">
            <tr>
              <td>No</td>
              <td>Waktu</td>
              <td>User</td>
              <td>Proses</td>
              <td>Keterangan</td>
            </tr>
            <?php 
            $no=0;
            foreach ($items as $item) {
              $no++;
              echo "<tr>";
                echo "<td>$no</td>";
                echo "<td>$item->date_create</td>";
                echo "<td>$item->first_name</td>";
                echo "<td>$item->proses</td>";
                echo "<td>$item->keterangan</td>";
              echo "</tr>";
            }
            ?>
          </table>
        </div>
    </div> 
</div>