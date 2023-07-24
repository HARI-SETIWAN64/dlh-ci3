<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
            <h3 class="box-title"></h3>
                <a href="<?php echo site_url('konten/admin/form')?>" class="btn btn-success btn-sm pull-right">TAMBAH DATA </a>
            </div>
        	<div class="box-body">
                <form class="form-horizontal" name="filter" id="filter">
                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
 <div class="col-md-12">
    <div class="box">
		<div class="box-body table-responsive" >
            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    	<th>TANGGAL</th>
                    	<th>JUDUL</th>
    					<th>KATEGORI</th>
                        <th>GAMBAR</th>
                        <th>PDF</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
            <tbody>
            </tbody>
        </table>
        </div>
	</div>
  </div>
</div>

<script type="text/javascript">
$(function () {

});

var table;
$(document).ready(function() {
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.


        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('konten/admin/ajax_list')?>",
            "type": "POST",
            "data": function ( data ) {
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
		{ width: 130, targets: 0 },
		{ width: 140, targets: 2 },
		{ width: 140, targets: 3 },
		{ width: 140, targets: 4 },
        ],

    });

    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload(null,false);  //just reload table
    });
    $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(null,false);  //just reload table
    });

});


function get_items(){
	table.ajax.reload(null,false);
}
</script>
