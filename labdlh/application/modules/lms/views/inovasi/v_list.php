<div class="table table-responsive"><!--table-responsive-->
  <table class="table table-bordered table-striped">
    <tr>
      <th width="25%">Nomor Dokumen</th>
      <th width="30%">Nama Dokumen</th>
      <th width="13%">Kategori</th>
      <?php if ($this->ion_auth->in_group(array('analis', 'admin'))) { ?>
        <th width="15%">Tanggal Unggah</th>
      <?php } ?>
      <th width="5%">File</th>
      <th width="7%">Status</th>
      <?php if ($this->ion_auth->in_group(array('analis', 'admin'))) { ?>
        <th width="5%">Aksi</th>
      <?php } ?>
    </tr>

    <?php $status = array('1' => 'Aktif', '0' => 'Non') ?>
    <?php foreach ($items as $row): ?>
      <tr>
        <td>
          <?php echo $row->nomor_dokumen; ?>
        </td>
        <td>
          <?php echo $row->nama_dokumen; ?>
        </td>
        <td>
          <?php echo $row->kategori; ?>
        </td>
        <?php if ($this->ion_auth->in_group(array('analis', 'admin'))) { ?>
          <td>
            <?php echo $row->date_create; ?>
          </td>
        <?php } ?>
        <td>
          <?php if ($row->file <> "") { ?>
            <a href="<?php echo base_url() . 'file/lms_ril/' . $row->file ?>" class="btn btn-xs btn-success"
              style="float:center" title="Unduh Dokumen">
              <i class="fa fa-download"></i></a>
          <?php } ?>
        </td>
        <td>
          <?php if ($this->ion_auth->in_group(array('analis', 'admin'))) { ?>
            <?php if ($row->status == "1") { ?>
              <a href="javascript:void(0)" onclick="status('<?php echo $row->id ?>', '0')"><?php echo $status[$row->status]; ?></a>
            <?php } else { ?>
              <a href="javascript:void(0)" onclick="status('<?php echo $row->id ?>', '1')"><?php echo $status[$row->status]; ?></a>
            <?php } ?>
          <?php } ?>
          <?php if ($this->ion_auth->in_group(array('pemohon', 'admin_pelayanan', 'manager_teknis', 'ka_lab', 'members'))) { ?>
            <?php echo $status[$row->status]; ?>
          <?php } ?>
        </td>
        <?php if ($this->ion_auth->in_group(array('analis', 'admin'))) { ?>
          <td>
            <a href="javascript:void(0)" onclick="hapus('<?php echo $row->id ?>')" class="btn btn-xs btn-danger"
              title="Hapus"> <i class="fa fa-trash-o"></i></a>
            <a href="lms/inovasi/form/<?php echo $row->id; ?>" class="btn btn-success btn-xs" title="Edit Dokumen"><i
                class="fa fa-pencil"></i></a>
          </td>
        <?php } ?>
      </tr>
    <?php endforeach; ?>
  </table>
</div>

<?php
$total_page = $total_items / 10;
if ($total_page < 1) {
  $total_page = '1';
}
?>
<br />
<span class="label label-info pull-left">Total
  <?php echo $total_items ?>
</span>
<span class="label label-info pull-right">Page
  <?php echo $page ?>
</span>
<div id="page-selection" align="center"></div>

<script>
  function status(id, status) {
    var answer = confirm("Apakah anda yakin ingin mengubah status?")
    if (answer) {
      $.ajax({
        url: site + 'lms/inovasi/status/' + id + '/' + status,
        success: function (r) {
          json = $.parseJSON(r);
          if (json.status == 'success') {
            get_items();
          } else {
            alert('gagal...')
          }
        },
        type: "post",
        dataType: "html"
      });
      return false;
    }
    else { }
  }

  $('#page-selection').bootpag({
    page: <?php echo $page ?>,
    total: <?php echo $total_page + 1 ?>,
    maxVisible: 5
  }).on("page", function (event, /* page number here */ num) {
    var n = num;

    //$("#content").html("Insert content"); // some ajax content loading...
    $(".page").html("Page " + num);
    get_items(n);
  });
</script>