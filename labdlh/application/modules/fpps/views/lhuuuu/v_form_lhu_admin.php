<section>
	<?php echo form_open_multipart('lhu/lhu_admin/form'.$item->nomor, 'class="form-horizontal"');?>
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>UMUM</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="u_nomor_sample" class="col-md-4 control-label">Nomor Sampel * :</label>
								<div class="col-md-8"><?php echo form_input('u_nomor_sample', isset($item->u_nomor_sample) ? $item->u_nomor_sample : '','class="form-control" id="u_nomor_sample"');?><?php echo form_error('u_nomor_sample') ; ?></div>
							</div>
							<div class="form-group">
								<label for="u_customer_sample_id" class="col-md-4 control-label">Customer ID :</label>
								<div class="col-md-8"><?php echo form_input('u_customer_sample_id', isset($item->u_customer_sample_id) ? $item->u_customer_sample_id : '','class="form-control"  id="u_customer_sample_id"');?><?php echo form_error('u_customer_sample_id') ; ?></div>
							</div>
							<div class="form-group">
								<label for="u_nama_pelanggan" class="col-md-4 control-label">Nama Pelanggan * :</label>
								<div class="col-md-8"><?php echo form_input('u_nama_pelanggan', isset($item->u_nama_pelanggan) ? $item->u_nama_pelanggan : '','class="form-control" id="u_nama_pelanggan"');?><?php echo form_error('u_nama_pelanggan') ; ?></div>
							</div>
							<div class="form-group">
								<label for="u_jenis_industri" class="col-md-4 control-label">Jenis Industri * :</label>
								<div class="col-md-8"><?php echo form_input('u_jenis_industri', isset($item->u_jenis_industri) ? $item->u_jenis_industri : '','class="form-control"  id="u_jenis_industri"');?><?php echo form_error('u_jenis_industri') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="u_alamat" class="col-md-4 control-label">Alamat * :</label>
								<div class="col-md-8">
								<?php
									$data = array(
								        'name'        => 'u_alamat',
								        'id'          => 'u_alamat',
								        'value'       => isset($item->u_alamat) ? $item->u_alamat : '',
								        'rows'        => '3',
								        'cols'        => '5',
								        'style'       => 'width:100%',
								        'class'       => 'form-control'
								    );

								    echo form_textarea($data); 
								?>
								<?php echo form_error('u_alamat') ; ?>
								</div>
							</div>
							<div class="form-group">
								<label for="u_jenis_contoh_uji" class="col-md-4 control-label">Jenis Contoh Uji * :</label>
								<div class="col-md-8"><?php echo form_input('u_jenis_contoh_uji', isset($item->u_jenis_contoh_uji) ? $item->u_jenis_contoh_uji : '','class="form-control" id="u_jenis_contoh_uji"');?><?php echo form_error('u_jenis_contoh_uji') ; ?></div>
							</div>
							<div class="form-group">
								<label for="u_rentang_pengujian" class="col-md-4 control-label">Rentang Pengujian * :</label>
								<div class="col-md-8"><?php echo form_input('u_rentang_pengujian', isset($item->u_rentang_pengujian) ? $item->u_rentang_pengujian : '','class="form-control" id="u_rentang_pengujian"');?><?php echo form_error('u_rentang_pengujian') ; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div>
	</div>
	<div class="box box-default">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>DATA PENGIRIMAN CONTOH UJI</strong></div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel-body">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama" class="col-md-4 control-label">Nama Instansi * :</label>
								<div class="col-md-8"><?php echo form_input('nama', isset($item->nama) ? $item->nama : '','class="form-control" id="nama"');?><?php echo form_error('nama') ; ?></div>
							</div>
							<div class="form-group">
								<label for="alamat" class="col-md-4 control-label">Alamat * :</label>
								<div class="col-md-8">
								<?php
									$data = array(
								        'name'        => 'alamat',
								        'id'          => 'alamat',
								        'value'       => isset($item->alamat) ? $item->alamat : '',
								        'rows'        => '5',
								        'cols'        => '10',
								        'style'       => 'width:100%',
								        'class'       => 'form-control'
								    );

								    echo form_textarea($data); 
								?>
								<?php echo form_error('alamat') ; ?>
								</div>
							</div>
							<div class="form-group">
								<label for="petugas_pengambil" class="col-md-4 control-label">Petugas Pengambilan * :</label>
								<div class="col-md-8"><?php echo form_input('petugas_pengambil', isset($item->petugas_pengambil) ? $item->petugas_pengambil : '','class="form-control" id="petugas_pengambil"');?><?php echo form_error('petugas_pengambil') ; ?></div>
							</div>
							<div class="form-group">
								<label for="tanggal_pengambilan" class="col-md-4 control-label">Tgl Pengambilan * :</label>
								<div class="col-md-8"><?php echo form_input('tanggal_pengambilan', isset($item->tanggal_pengambilan) ? $item->tanggal_pengambilan : '','class="form-control" id="tanggal_pengambilan"');?><?php echo form_error('tanggal_pengambilan') ; ?></div>
							</div>
							<div class="form-group">
								<label for="tanggal_penerimaan" class="col-md-4 control-label">Tgl Penerimaan * :</label>
								<div class="col-md-8"><?php echo form_input('tanggal_penerimaan', isset($item->tanggal_penerimaan) ? $item->tanggal_penerimaan : '','class="form-control" id="tanggal_penerimaan"');?><?php echo form_error('tanggal_penerimaan') ; ?></div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="lokasi" class="col-md-4 control-label">Lokasi Pengambilan * :</label>
								<div class="col-md-8"><?php echo form_input('lokasi', isset($item->lokasi) ? $item->lokasi : '','class="form-control" id="lokasi"');?><?php echo form_error('lokasi') ; ?></div>
							</div>
							<div class="form-group">
								<label for="metode_pengambilan" class="col-md-4 control-label">Metode Pngambilan * :</label>
								<div class="col-md-8"><?php echo form_input('metode_pengambilan', isset($item->metode_pengambilan) ? $item->metode_pengambilan : '','class="form-control" id="metode_pengambilan"');?><?php echo form_error('metode_pengambilan') ; ?></div>
							</div>
							<div class="form-group">
								<label for="debit_air_limbah" class="col-md-4 control-label">Debit Air Limbah * :</label>
								<div class="col-md-8"><?php echo form_input('debit_air_limbah',isset($item->debit_air_limbah) ? $item->debit_air_limbah : '','class="form-control"  id="debit_air_limbah"');?><?php echo form_error('debit_air_limbah') ; ?></div>
							</div>
							<div class="form-group">
								<label for="total_produksi" class="col-md-4 control-label">Total Produksi * :</label>
								<div class="col-md-8"><?php echo form_input('total_produksi',isset($item->total_produksi) ? $item->total_produksi : '','class="form-control"  id="total_produksi"');?><?php echo form_error('total_produksi') ; ?></div>
							</div>
							<div class="form-group">
								<label for="kesimpulan" class="col-md-4 control-label">Kesimpulan * :</label>
								<div class="col-md-8">
								<?php
									$data = array(
								        'name'        => 'kesimpulan',
								        'id'          => 'kesimpulan',
								        'value'       => isset($item->kesimpulan) ? $item->kesimpulan : '',
								        'rows'        => '5',
								        'cols'        => '10',
								        'style'       => 'width:100%',
								        'class'       => 'form-control'
								    );

								    echo form_textarea($data); 
								?>
								<?php echo form_error('kesimpulan') ; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="box-header with-border">
			<div class="panel-heading"><strong>Hasil Pengujian</strong></div>
		</div>
		<div class="panel-body">
          <div class="row">
            <div class="col-md-12">
				<div id="content_items"></div>
			</div>
          </div>
        </div>
  	</div>
	<br />
	<div class="form-group">
		<div align="center" id="simpan">
			<?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
		</div>
		<?php echo form_hidden($csrf); ?>
		<?php echo form_close();?> 
	</div>
</section>

<?php 
$u_nomor_sampel = !empty($item->parameter_id) ? $item->u_nomor_sampel : '';
 echo form_hidden('u_nomor_sampel',$u_nomor_sampel)
?>

<script type="text/javascript">

var url = "<?php echo base_url()?>";
function ubah(id)
{
 	$('#ajax-modal').modal('show');
    $('.modal-title').text('Merubah Parameter');
    $.get(url+'lhu/lhu_admin/ubah_lhus_parameter/'+id,{}, function(data) {
        $("#ajax-modalin").html(data);
    });
}

$(function() {
	get_items();
});

var page = '1';
function get_items(page){
    $("#content_items").html('<i class="fa fa-refresh fa-spin"></i>');
	var url = '<?php echo site_url() ?>';
	var like = {'nama' : '<?php echo $item->nomor; ?>'};
	var datae = {'page' : page};
	$.post(url+'lhu/lhu_admin/lhus_parameter_list', $.param(like) + '&' + $.param(datae),
	function(data) {
		$("#content_items").html(data);
	});
}

</script>