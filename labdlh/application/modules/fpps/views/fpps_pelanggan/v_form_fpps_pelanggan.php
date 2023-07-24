<section>
	<?php
	if(isset($item->nomor)){
		$nomor = "/".str_replace("/","_",$item->nomor);
	}else{
		$nomor = "";
	}
	echo form_open_multipart('fpps/fpps_pelanggan/form'.$nomor, 'class="form-horizontal"');
	?>
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>Data Pelanggan</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-12">
							<div class="form-group">
								<label for="id_pelanggan" class="col-md-2 control-label">Nama * :</label>
								<div class="col-md-10"><?php echo form_dropdown('id_pelanggan', $nama_pelanggan, isset($item->id_pelanggan) ? $item->id_pelanggan : '','class="form-control select2" id="id_pelanggan" onchange="get_data()"');?><?php echo form_error('id_pelanggan') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<!-- <div class="form-group">
								<label for="nama_pelanggan" class="col-md-4 control-label">Nama * :</label>
								<div class="col-md-8"><?php echo form_input('nama_pelanggan', isset($item->company) ? $item->company : $this->fungsi->comapany(),'class="form-control select2" id="nama_pelanggan" required');?><?php echo form_error('nama_pelanggan') ; ?></div>
							</div> -->
							<div class="form-group">
								<label for="no_telp" class="col-md-4 control-label">Telp * :</label>
								<div class="col-md-8"><?php echo form_input('no_telp', isset($item->no_telp) ? $item->no_telp : $this->fungsi->phone(),'class="form-control"  id="no_telp" required');?><?php echo form_error('no_telp') ; ?></div>
							</div>
							<div class="form-group">
								<label for="email" class="col-md-4 control-label">Email * :</label>
								<div class="col-md-8"><?php echo form_input('email', isset($item->email) ? $item->email : $this->fungsi->email(),'class="form-control" id="email"');?><?php echo form_error('email') ; ?></div>
							</div>
							<div class="form-group">
								<label for="jenis_industri" class="col-md-4 control-label">Jns Usaha * :</label>
								<div class="col-md-8"><?php echo form_input('jenis_industri', isset($item->jenis_industri) ? $item->jenis_industri : '','class="form-control" id="jenis_industri" required');?><?php echo form_error('jenis_industri') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="alamat" class="col-md-4 control-label">Alamat * :</label>
								<div class="col-md-8">
									<?php
									$data = array(
										'name'        => 'alamat',
										'id'          => 'alamat',
										'value'       => isset($item->alamat) ? $item->alamat : $this->fungsi->alamat(),
										'rows'        => '4',
										'cols'        => '5',
										'style'       => 'width:100%',
										'class'       => 'form-control'
									);

									echo form_textarea($data); 
									?>
									<?php echo form_error('alamat') ; ?>
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
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>SAMPEL</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="jenis_sampel" class="col-md-4 control-label">Jns Sampel * :</label>
								<div class="col-md-8"><?php echo form_dropdown('jenis_sampel', $jenis_sampel, isset($item->jenis_sampel) ? $item->jenis_sampel : '','class="form-control" id="jenis_sampel" required');?><?php echo form_error('jenis_sampel') ; ?></div>
							</div>
							<div class="form-group">
								<label for="jumlah_sampel" class="col-md-4 control-label">Jumlah Sampel * :</label>
								<div class="col-md-8"><?php echo form_input('jumlah_sampel', isset($item->jumlah_sampel) ? $item->jumlah_sampel : '','class="form-control" id="jumlah_sampel"');?><?php echo form_error('jumlah_sampel') ; ?></div>
							</div>
							<div class="form-group">
								<label for="volume_sampel" class="col-md-4 control-label">Volume Sampel * :</label>
								<div class="col-md-8"><?php echo form_input('volume_sampel', isset($item->volume_sampel) ? $item->volume_sampel : '','class="form-control" id="volume_sampel"');?><?php echo form_error('volume_sampel') ; ?></div>
							</div>
							<div class="form-group">
								<label for="petugas_pengambil" class="col-md-4 control-label">Pengambil Sampel * :</label>
								<div class="col-md-8"><?php echo form_dropdown('petugas_pengambil', $petugas_pengambil, isset($item->petugas_pengambil) ? $item->petugas_pengambil : '','class="form-control" id="petugas_pengambil"');?><?php echo form_error('petugas_pengambil') ; ?></div>
							</div>
							<div class="form-group">
								<label for="deskripsi_sampel" class="col-md-4 control-label">Lokasi Sampel * :</label>
								<div class="col-md-8">
									<?php
									$data = array(
										'name'        => 'deskripsi_sampel',
										'id'          => 'deskripsi_sampel',
										'value'       => isset($item->deskripsi_sampel) ? $item->deskripsi_sampel : '',
										'rows'        => '3',
										'cols'        => '10',
										'style'       => 'width:100%',
										'class'       => 'form-control '
									);
									echo form_textarea($data); 
									?>
									<?php echo form_error('deskripsi_sampel') ; ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="wadah_sampel" class="col-md-4 control-label">Wadah Sampel * :</label>
								<div class="col-md-8">
									<?php echo form_input('wadah_sampel', isset($item->wadah_sampel) ? $item->wadah_sampel : '','class="form-control" id="wadah_sampel"');?>
									<?php echo form_error('wadah_sampel') ; ?>		
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal_penerimaan" class="col-md-4 control-label">Tgl Penerimaan * :</label>
								<div class="col-md-3">
									<?php echo form_input('tanggal_penerimaan', isset($item->tanggal_penerimaan) ? $item->tanggal_penerimaan : '','class="form-control" id="tanggal_penerimaan"');?>
									<?php echo form_error('tanggal_penerimaan') ; ?>
								</div>	
								<label for="tanggal_penerimaan" class="col-md-1 control-label">Jam</label>
								<div class="col-md-4 bootstrap-timepicker">
									<?php echo form_input('jam_penerimaan', isset($item->jam_sampling) ? $item->jam_penerimaan : '','class="form-control timepicker" id="jam_penerimaan"');?>
									<?php echo form_error('jam_penerimaan') ; ?>
								</div>
							</div>
							<div class="form-group">
								<label for="tanggal_sampling" class="col-md-4 control-label">Tgl Sampling * :</label>
								<div class="col-md-3">
									<?php echo form_input('tanggal_sampling', isset($item->tanggal_sampling) ? $item->tanggal_sampling : '','class="form-control" id="tanggal_sampling"');?><?php echo form_error('tanggal_sampling') ; ?>
								</div>
								<label class="col-md-1 control-label">Jam</label>
								<div class="col-md-4 bootstrap-timepicker">
									<?php echo form_input('jam_sampling', isset($item->jam_sampling) ? $item->jam_sampling : '','class="form-control timepicker" id="jam_sampling"');?><?php echo form_error('jam_sampling') ; ?>
								</div>
							</div>

							<div class="form-group">
								<label for="pengukuran_lapangan" class="col-md-4 control-label">Pngkuran Lpangan * :</label>
								<div class="col-md-8">
									<?php
									$data = array(
										'name'        => 'pengukuran_lapangan',
										'id'          => 'pengukuran_lapangan',
										'value'       => isset($item->pengukuran_lapangan) ? $item->pengukuran_lapangan : '',
										'rows'        => '3',
										'cols'        => '10',
										'style'       => 'width:100%',
										'class'       => 'form-control '
									);
									echo form_textarea($data); 
									?>
									<?php echo form_error('pengukuran_lapangan') ; ?>
								</div>
							</div>
						</div>

						<!-- <div class="form-group">
							<label for="deskripsi_sampel" class="col-md-2 control-label">Ket Sampel * :</label>
							<div class="col-md-10">
								<textarea id="deskripsi_sampel" name="deskripsi_sampel"><?= set_value('deskripsi_sampel',isset($item->jam_sampling) ? $item->jam_sampling : '')?></textarea>
								<?php echo form_error('deskripsi_sampel') ; ?>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>Parameter dan Metode Yang Diuji </strong></div>
		</div>
		<div class="panel-body">
			<div class="row">
				<?php foreach ($parameter as $parameters) { ?>
					<div class="col-md-4">
						<div class="col-md-9">
							<?php 
							$cek = "";
							echo $parameters->parameter;
							if(isset($parameters->nomor)){
								if($parameters->nomor!=""){
									$cek = "checked";
								}
							}
							?>
						</div>
						<div class="col-md-3">
							<input type="checkbox" name="parameter[<?php echo $parameters->id ?>]" value="1" <?php echo $cek; ?>><br>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>ASPEK KAJI ULANG PERMINTAAN</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kemampuan_personil" class="col-md-6 control-label">Kemampuan personil :</label>
								<div class="col-md-6"><?php echo form_dropdown('kemampuan_personil', $kemampuan_personil, isset($item->kemampuan_personil) ? $item->kemampuan_personil : '','class="form-control" id="kemampuan_personil"');?><?php echo form_error('kemampuan_personil') ; ?></div>
							</div>
							<div class="form-group">
								<label for="kesesuaian_metode_uji" class="col-md-6 control-label">Kesesuaian metode uji :</label>
								<div class="col-md-6"><?php echo form_dropdown('kesesuaian_metode_uji', $kesesuaian_metode_uji, isset($item->kesesuaian_metode_uji) ? $item->kesesuaian_metode_uji : '','class="form-control" id="kesesuaian_metode_uji"');?><?php echo form_error('kesesuaian_metode_uji') ; ?></div>
							</div>
							<div class="form-group">
								<label for="tanggal_diambil" class="col-md-6 control-label">kondisi peralatan pengujian :</label>
								<div class="col-md-6"><?php echo form_dropdown('kondisi_peralatan', $kondisi_peralatan, isset($item->kondisi_peralatan) ? $item->kondisi_peralatan : '','class="form-control" id="kondisi_peralatan"');?><?php echo form_error('kondisi_peralatan') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="kelengkapan_bahan_kimia" class="col-md-6 control-label">Kelegkapan bahan kimia :</label>
								<div class="col-md-6"><?php echo form_dropdown('kelengkapan_bahan_kimia', $kelengkapan_bahan_kimia, isset($item->kelengkapan_bahan_kimia) ? $item->ketersedian_bahan_kimia : '','class="form-control" id="kelengkapan_bahan_kimia"');?><?php echo form_error('kelengkapan_bahan_kimia') ; ?></div>
							</div>
							<div class="form-group">
								<label for="kondisi_akomodasi" class="col-md-6 control-label">Kondisi akomodasi :</label>
								<div class="col-md-6"><?php echo form_dropdown('kondisi_akomodasi', $kondisi_akomodasi, isset($item->kondisi_akomodasi) ? $item->kondisi_akomodasi : '','class="form-control" id="kondisi_akomodasi"');?><?php echo form_error('kondisi_akomodasi') ; ?></div>
							</div>
							<div class="form-group">
								<label for="beban_pekerjaan" class="col-md-6 control-label">Beban pekerjaan :</label>
								<div class="col-md-6"><?php echo form_dropdown('beban_pekerjaan', $beban_pekerjaan, isset($item->beban_pekerjaan) ? $item->beban_pekerjaan : '','class="form-control" id="beban_pekerjaan"');?><?php echo form_error('beban_pekerjaan') ; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-info" style="display: none;">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>Lain - Lain </strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="diawetkan" class="col-md-4 control-label">Ksmpulan Kaji Ulang * :</label>
								<div class="col-md-8"><?php echo form_dropdown('kesimpulan_kaji_ulang', $kesimpulan_kaji_ulang,isset($item->kesimpulan_kaji_ulang) ? $item->kesimpulan_kaji_ulang : '','class="form-control"  id="kesimpulan_kaji_ulang"');?><?php echo form_error('kesimpulan_kaji_ulang') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="subkontrak" class="col-md-4 control-label">Disubkontrakkan * :</label>
								<div class="col-md-8"><?php echo form_dropdown('subkontrak', $subkontrak,isset($item->subkontrak) ? $item->subkontrak : '','class="form-control"  id="subkontrak"');?><?php echo form_error('subkontrak') ; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="tambahan" style="display:none">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="panel-body">
							<div class="col-md-6">
								<div class="form-group">
									<label for="terima_perusahaan" class="col-md-4 control-label">Diserahkan Oleh :</label>
								</div>
								<div class="form-group">
									<label for="serahkan_perusahaan" class="col-md-4 control-label">Perusahaan * :</label>
									<div class="col-md-8"><?php echo form_input('serahkan_perusahaan', isset($item->serahkan_perusahaan) ? $item->serahkan_perusahaan : '','class="form-control" id="serahkan_perusahaan"');?><?php echo form_error('serahkan_perusahaan') ; ?></div>
								</div>
								<div class="form-group">
									<label for="serahkan_nama" class="col-md-4 control-label">Nama * :</label>
									<div class="col-md-8"><?php echo form_input('serahkan_nama', isset($item->serahkan_nama) ? $item->serahkan_nama : '','class="form-control" id="serahkan_nama"');?><?php echo form_error('serahkan_nama') ; ?></div>
								</div>
								<div class="form-group">
									<label for="serahkan_tanggal" class="col-md-4 control-label">Tanggal * :</label>
									<div class="col-md-8"><?php echo form_input('serahkan_tanggal', isset($item->serahkan_tanggal) ? $item->serahkan_tanggal : '','class="form-control" id="serahkan_tanggal"');?><?php echo form_error('serahkan_tanggal') ; ?></div>
								</div>
								<div class="form-group">
									<label for="serahkan_jam" class="col-md-4 control-label">Jam * :</label>
									<div class="col-md-8 bootstrap-timepicker"><?php echo form_input('serahkan_jam', isset($item->serahkan_jam) ? $item->serahkan_jam : '','class="form-control timepicker" id="serahkan_jam"');?><?php echo form_error('serahkan_jam') ; ?>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="terima_perusahaan" class="col-md-4 control-label">Diterima Oleh :</label>
							</div>
							<div class="form-group">
								<label for="terima_perusahaan" class="col-md-4 control-label">Perusahaan * :</label>
								<div class="col-md-8"><?php echo form_input('terima_perusahaan',isset($item->terima_perusahaan) ? $item->terima_perusahaan : '','class="form-control"  id="terima_perusahaan"');?><?php echo form_error('terima_perusahaan') ; ?></div>
							</div>
							<div class="form-group">
								<label for="terima_nama" class="col-md-4 control-label">Nama * :</label>
								<div class="col-md-8"><?php echo form_input('terima_nama',isset($item->terima_nama) ? $item->terima_nama : '','class="form-control"  id="terima_nama"');?><?php echo form_error('terima_nama') ; ?></div>
							</div>
							<div class="form-group">
								<label for="terima_tanggal" class="col-md-4 control-label">Tanggal * :</label>
								<div class="col-md-8"><?php echo form_input('terima_tanggal',isset($item->terima_tanggal) ? $item->terima_tanggal : '','class="form-control"  id="terima_tanggal"');?><?php echo form_error('terima_tanggal') ; ?></div>
							</div>
							<div class="form-group">
								<label for="terima_jam" class="col-md-4 control-label">Jam * :</label>
								<div class="col-md-8 bootstrap-timepicker"><?php echo form_input('terima_jam',isset($item->terima_jam) ? $item->terima_jam : '','class="form-control timepicker"  id="terima_jam"');?><?php echo form_error('terima_jam') ; ?></div>
							</div>
						</div>
					</div>
				</div>
				<div id="distance"> </div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<br />
<div class="form-group">
	<div align="center" id="simpan">
		<?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
	</div>
	<?php echo form_hidden('nama_pelanggan',isset($item->nama_pelanggan) ? $item->nama_pelanggan : ''); ?>
	<?php echo form_hidden($csrf); ?>
	<?php echo form_close();?> 
</div>
</section>

<script type="text/javascript">

	$(function() {
		$('.select2').select2()
	});


	$(function() {
		// CKEDITOR.replace('deskripsi_sampel', 
		// {
		// 	removeButtons: 'Copy, Paste, Cut,PasteText,PasteFromWord,Undo,Redo, Cut, Link, style, Bold'
		// }
		// );
		$('#tambahan').hide(); 
		$('#subkontrak').change(function(){
			if($('#subkontrak').val() == '1') {
				$('#tambahan').show(); 
			} else {
				$('#tambahan').hide(); 
			} 
		});

		var currentDate = new Date();
		$('#tanggal_penerimaan').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true,
		});
		$("#tanggal_penerimaan").datepicker("setDate", currentDate);


		var currentDate = new Date();
		$('#tanggal_sampling').datepicker({
			format: "dd-mm-yyyy",
			autoclose: true,
		});
		$("#tanggal_sampling").datepicker("setDate", currentDate);

		$(".timepicker").timepicker({
			showInputs: false,
			minuteStep: true,
		});
	});

	$(document).ready(function(){
		$('#nama_pelanggan').autocomplete({
			source: "<?php echo site_url('fpps/fpps_pelanggan/get_autocomplete');?>",
			select: function (event, ui) {
				$('[name="nama_pelanggan"]').val(ui.item.label); 
				$('[name="alamat"]').val(ui.item.alamat); 
				$('[name="no_telp"]').val(ui.item.phone); 
				$('[name="company"]').val(ui.item.company); 
				$('[name="email"]').val(ui.item.email); 
				$('[name="jenis_industri"]').val(ui.item.jenis_industri); 
				$('[name="id_pelanggan"]').val(ui.item.id_pelanggan); 
			}
		});
	}); 



	function get_data() {
		var id_pelanggan = $('select[name=id_pelanggan]').val();
		$.ajax({
			url: "<?php echo site_url();?>"+'fpps/fpps_pelanggan/get_data/'+id_pelanggan,
			success: function (r) {
				json = $.parseJSON(r);
				if (json.status == 'sukses') {
					$('[name="nama_pelanggan"]').val(json.nama_pelanggan); 
					$('[name="alamat"]').val(json.alamat); 
					$('[name="no_telp"]').val(json.telp); 
					$('[name="company"]').val(json.nama); 
					$('[name="email"]').val(json.email); 
					$('[name="jenis_industri"]').val(json.jenis_usaha); 
					$('[name="id_pelanggan"]').val(json.id); 
				}else{
					// document.getElementById("satuan_pekerjaan").value = "0";
					alert("Data tidak ditemukan");
					$('[name="nama_pelanggan"]').val(""); 
				}
			},
			type: "post",
			dataType: "html"
		});
	}

</script>