
<div class="box box-default">
	<form class="form-horizontal" name="filter" id="filter" action="<?php echo base_url(); ?>rekap/rekap_list" method="POST">
		<div class="box-header with-border">
			<div class="col-md-6" style="float: left;">
				<b> Rekap </b>
			</div>
			<div style="float: right;">
				<!-- <?php 
				$format = array(
					"html" => "HTML",
					"pdf" => "PDF"
				) 
				?> -->
				<div class="row">
					<!-- <div class="col-md-6"><?php echo form_dropdown('format', $format, '','class="form-control" id="format" onchange="get_format();" ');?></div> -->
					<div id="html" class="col-md-4">
						<a href="javascript:void(0)" onclick="get_items()" class="btn btn-success btn-sm" ><i class="fa fa-search"></i> Tampilkan</a>
					</div>
					<!-- <div id="pdf" class="col-md-4">
						<button type="submit" class="btn btn-success btn-sm" target="_blank">
							<i class="fa fa-search"></i> Tampilkan
						</button>
					</div> -->
				</div>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="form-group">
									<label for="kode" class="col-md-4 control-label">Jenis Rekap :</label>
									<?php 
									$arr_lap = array(
										"project_selesai" => "[01] Project Selesai",
										"belum_selesai" => "[02] Belum Selesai",
										"total" => "[03] Total",
										"karyawan" => "[04] Karyawan",
									); 
									?>
									<div class="col-md-8"><?php echo form_dropdown('jns_lap', $arr_lap, '','class="form-control" id="jns_lap" onchange="get_laporan();"');?></div>
								</div>
								<!-- <div class="form-group" id="div_cari">
									<label for="kode" class="col-md-4 control-label">Cari  :</label>
									<div class="col-md-8"><?php echo form_input('cari', '','class="form-control" id="cari"');?></div>
								</div> -->
							</div><!-- /.form-group -->
						</div><!-- col -->
						<div id="tanggal" class="col-md-6" style="float: right;">
						<div class="form-group" id="div_jenis_tugas">
								<label for="kode" class="col-md-4 control-label">Jenis Tugas :</label>
								
								<div class="col-md-8"><?php echo form_dropdown('jenis_tugas', $jenis_tugas, '','class="form-control" id="jenis_tugas"');?></div>
							</div><!-- /.form-group -->
						</div><!-- col -->
					</div><!-- row -->
				</div>
			</div>
		</div>
	</div>
</form>

<div class="box box-default">
	<div class="box-header with-border">
		<div id="content_items"></div>
	</div>
</div>

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
	$("#cari").keyup(function(event){

		if(event.keyCode === 13 || event.key === 'Enter'){
			get_items();
		}
	});

	$('#filter').bind("keypress", function(e) {
		if (e.keyCode == 13) {
			e.preventDefault();
			return false;
		}
	});


	$(function() {
		get_items();
		// get_format();
		get_laporan();
	});

	var page = '1';
	function get_items(page){
		// var format = $('select[name=format]').val();
		// alert(format);
		// if(format == 'html'){
			$("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
			var url = '<?php echo site_url() ?>';
			var datae = {'page' : page};
			$.post(url+'ppc/rekap/rekap_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
				function(data) {
					$("#content_items").html(data);
				});
		// }else{
		// 	var url = '<?php echo site_url() ?>';
		// 	var datae = {'page' : page};
		// 	$.post(url+'ppc/rekap/rekap_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
		// 		function(data) {
		// 		});
		// }
	}



	// function get_format(){

	// 	var format = $('select[name=format]').val();
	// 	if(format == 'html'){
	// 		$('#html').show();
	// 		$('#pdf').hide();
	// 	}else if(format == 'pdf'){
	// 		$('#html').hide();
	// 		$('#pdf').show();
	// 	}else{
	// 		alert("Format kosong");
	// 	}


	// }

	function get_laporan(){

		var jns_lap = $('select[name=jns_lap]').val();
		if(jns_lap == 'project_selesai'){
			// $('#tahun').show();
			// $('#div_cari').show();
			$('#div_jenis_tugas').show();
		}else if(jns_lap == 'belum_selesai'){
			// $('#tahun').show();
			// $('#div_cari').show();
			$('#div_jenis_tugas').show();
		}else if(jns_lap == 'total'){
			// $('#tahun').show();
			// $('#div_cari').hide();
			$('#div_jenis_tugas').show();
		}else if(jns_lap == 'karyawan'){
			// $('#tahun').show();
			// $('#div_cari').hide();
			$('#div_jenis_tugas').hide();
		}else 
		{
			alert("Format kosong");
		}

	}

</script>