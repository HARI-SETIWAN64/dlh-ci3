
<div class="box box-default">
	<form class="form-horizontal" name="filter" id="filter" action="<?php echo base_url(); ?>laporan/laporan_list" method="POST">
		<div class="box-header with-border">
			<div class="col-md-6" style="float: left;">
				<b> Laporan </b>
			</div>
			<div style="float: right;">
				<?php 
				$format = array(
					"html" => "HTML",
					"pdf" => "PDF"
				) 
				?>
				<div class="row">
					<div class="col-md-6"><?php echo form_dropdown('format', $format, '','class="form-control" id="format" onchange="get_format();" ');?></div>
					<div id="html" class="col-md-4">
						<a href="javascript:void(0)" onclick="get_items()" class="btn btn-success btn-sm" ><i class="fa fa-search"></i> Tampilkan</a>
					</div>
					<div id="pdf" class="col-md-4">
						<button type="submit" class="btn btn-success btn-sm" target="_blank">
							<i class="fa fa-search"></i> Tampilkan
						</button>
					</div>
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
									<label for="kode" class="col-md-4 control-label">Jenis Laporan :</label>
									<?php 
									$arr_lap = array(
										"perusahaan" => "[01] Data Perusahaan",
										"pendapatan_perbulan" => "[02] Pendapatan Perbulan",
										"belum_lunas" => "[03] Belum Lunas",
										"uji_perbulan" => "[04] Uji Perbulan",
										"grafik_uji_perbulan" => "[05] Garfik Uji Perbulan",
										"grafik_parameter" => "[06] Garfik Parameter"
									); 
									?>
									<div class="col-md-8"><?php echo form_dropdown('jns_lap', $arr_lap, '','class="form-control" id="jns_lap" onchange="get_laporan();"');?></div>
								</div>
								<div class="form-group">
									<label for="kode" class="col-md-4 control-label">Cari  :</label>
									<div class="col-md-8"><?php echo form_input('cari', '','class="form-control" id="cari"');?></div>
								</div>
							</div><!-- /.form-group -->
						</div><!-- col -->
						<div id="tanggal" class="col-md-6">
							<div class="form-group">
								<label for="kode" class="col-md-4 control-label">Taggal :</label>
								<?php 
								$thn = array('2021'=>'2021', '2022'=>'2022', '2023'=>'2023'); 
								$bln = array(''=>'','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06','07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12');
								?>
								<div id="tahun" class="col-md-3"><?php echo form_dropdown('tahun', $thn, date("Y"),'class="form-control" id="tahun"');?></div>
								<div id="bulan" class="col-md-2"><?php echo form_dropdown('bulan', $bln, date("m"),'class="form-control" id="bulan"');?></div>
							</div><!-- /.form-group -->
							<div class="form-group" id="div_sampel">
								<label for="kode" class="col-md-4 control-label">Sampel :</label>
								
								<div class="col-md-8"><?php echo form_dropdown('sampel', $sampel, '','class="form-control" id="sampel"');?></div>
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
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
		get_format();
		get_laporan();
	});

	var page = '1';
	function get_items(page){
		var format = $('select[name=format]').val();
		// alert(format);
		if(format == 'html'){
			$("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
			var url = '<?php echo site_url() ?>';
			var datae = {'page' : page};
			$.post(url+'laporan/laporan_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
				function(data) {
					$("#content_items").html(data);
				});
		}else{
			var url = '<?php echo site_url() ?>';
			var datae = {'page' : page};
			$.post(url+'laporan/laporan_list',$(document.filter.elements).serialize() + '&' + $.param(datae),
				function(data) {
				});
		}
	}



	function get_format(){

		var format = $('select[name=format]').val();
		if(format == 'html'){
			$('#html').show();
			$('#pdf').hide();
		}else if(format == 'pdf'){
			$('#html').hide();
			$('#pdf').show();
		}else{
			alert("Format kosong");
		}


	}

	function get_laporan(){

		var jns_lap = $('select[name=jns_lap]').val();
		if(jns_lap == 'perusahaan'){
			$('#tahun').hide();
			$('#bulan').hide();
			$('#div_sampel').hide();
		}else if(jns_lap == 'pendapatan_perbulan'){
			$('#tahun').show();
			$('#bulan').show();
			$('#div_sampel').hide();
		}else if(jns_lap == 'belum_lunas'){
			$('#tahun').show();
			$('#bulan').show();
			$('#div_sampel').hide();
		}else if(jns_lap == 'uji_perbulan'){
			$('#tahun').show();
			$('#bulan').hide();
			$('#div_sampel').show();
		}else if(jns_lap == 'grafik_uji_perbulan'){
			$('#tahun').show();
			$('#bulan').hide();
			$('#div_sampel').hide();
		}else if(jns_lap == 'grafik_parameter'){
			$('#tahun').show();
			$('#bulan').show();
			$('#div_sampel').hide();
		}else{
			alert("Format kosong");
		}


	}

</script>