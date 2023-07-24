<section>
	<div class="form-horizontal">
		<div class="box box-default">
			<div class="box-header with-border">
				<div class="panel-heading"><strong>Instansi</strong></div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-body">
							<div class="col-md-8">
								<div class="form-group">
									<label for="no_telp" class="col-md-4 control-label">Jenis Penilaian :</label>
									<div class="col-md-8">
          								<?php echo form_input('keterangan', isset($item->keterangan) ? $item->keterangan : '','class="form-control"  id="keterangan"');?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="no_telp" class="col-md-4 control-label">Status :</label>
									<div class="col-md-8">
										<div class="form-control">
											<?php 
											if($item->aktif=="1"){echo "Aktif";}
											else{echo "Non Aktif";}
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="distance"> </div>
					<div class="clearfix"></div>
				</div>

			</div>
		</div>
		<div class="panel panel-info">
			<div class="box-header with-border">
				<div class="col-md-6" style="float: left;">
					<form class="form-horizontal" name="filter" id="filter">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-9">
										<?php 
										echo form_hidden('id',$id);
										?>
									</div>
								</div><!-- /.form-group -->
							</div><!-- col -->
						</div><!-- row -->
					</form>
				</div>
				<div class="pull-right">
        			<a href="javascript:void(0)" onclick="form_detail('<?php echo $id?>','0')" class="btn btn-xs btn-success"> <i class="fa fa-plus"></i></a>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
					<div id="content_items"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade"  id="ajax-modal"  tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <div id="ajax-modalin"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	$(function() {
		get_items();
	});

	var url = "<?php echo base_url()?>";
	var page = '1';
	function get_items(page){
		$("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
		var url = '<?php echo site_url() ?>';
		var datae = {'page' : page};
		$.post(url+'master/penilaian/detail_list', $(document.filter.elements).serialize() + '&' + $.param(datae),
			function(data) {
				$("#content_items").html(data);
			});
	}

	var url = "<?php echo base_url()?>";
	function form_detail(id,det_id)
	{
	 	$('#ajax-modal').modal('show');
	    $('.modal-title').text('Merubah Jabatan');
	    $.get(url+'master/penilaian/form_detail/'+id+'/'+det_id,{}, function(data) {
	        $("#ajax-modalin").html(data);
	    });
	}



	function hapus_detail(id) {
	  var answer = confirm("apakah anda yakin item ini dihapus?")
	  if (answer){delet_detail(id);}
	  else{}
	}

	function delet_detail(id){
	  	$.ajax({
	        url: site+'master/penilaian/hapus_detail/'+id, 
	        success: function(r){
		      	json = $.parseJSON(r);
		       	if (json.status == 'success') {
		           get_items();
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