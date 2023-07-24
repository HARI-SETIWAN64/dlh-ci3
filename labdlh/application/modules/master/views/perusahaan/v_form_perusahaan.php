<div class="box box-default">
	<div class="box-header with-border">
		<div class="panel-heading"><strong>Data Perusahaan</strong></div>
	</div>

	<?php echo form_open_multipart('master/perusahaan/form', 'class="form-horizontal"');?>
	<div class="box-body">
		<div class="row">
			<div class="col-md-12">
				<div class="panel-body">
					<div class="col-md-12">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Wajib Retribusi</div> </label>
							<div class="col-sm-8">
								<?php echo form_dropdown('wajib_retribusi',array(""=>"", "0"=>"Tidak Wajib Retribusi", "1"=>"Wajib Retribusi"),isset($item->wajib_retribusi) ? $item->wajib_retribusi : '','class="form-control" id="wajib_retribusi" onchange="getwp()" ');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>NPWRD</div> </label>
							<div class="col-sm-8">
								<div class="input-group input-group-sm">
									<?php echo form_input('npwp', isset($item->npwp) ? $item->npwp : '','class="form-control"  id="npwp"');?>
									<div class="input-group-btn">
										<button type="button" class="btn btn-info btn-flat" onclick="ceknpwp()">CARI</button>
										<button type="button" class="btn btn-danger btn-flat" onclick="reset()">Reset</button>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>NIB</div> </label>
							<div class="col-sm-8">
								<div class="input-group input-group-sm">
									<?php echo form_input('nib', isset($item->nib) ? $item->nib : '','class="form-control"  id="nib"');?>
									<div class="input-group-btn">
										<button type="button" class="btn btn-info btn-flat" onclick="ceknib()">CARI</button>
										<button type="button" class="btn btn-danger btn-flat" onclick="reset()">Reset</button>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>IPAL</div> </label>
							<div class="col-sm-8">
								<?php echo form_dropdown('ipal',$ipal,isset($item->ipal) ? $item->ipal : '','class="form-control" id="ipal"');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>PERLIN</div> </label>
							<div class="col-sm-8">
								<?php echo form_dropdown('perlin',$perlin,isset($item->perlin) ? $item->perlin : '','class="form-control" id="perlin"');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Nama Perusahaan</div> </label>
							<div class="col-sm-8">
								<?php echo form_input('nama', isset($item->nama) ? $item->nama : '','class="form-control"  id="nama" required');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Telp Perusahaan</div> </label>
							<div class="col-sm-8">
								<?php echo form_input('telp', isset($item->telp) ? $item->telp : '','class="form-control"  id="telp"');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Customer Id</div> </label>
							<div class="col-sm-8">
								<?php echo form_input('customer_id', isset($item->customer_id) ? $item->customer_id : '','class="form-control"  id="customer_id"');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Kabupaten</div> </label>
							<div class="col-sm-8">
								<?php echo form_input('kab', isset($item->kab) ? $item->kab : '','class="form-control"  id="kab" required');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Kecamatan</div> </label>
							<div class="col-sm-8">
								<?php echo form_dropdown('no_kec',$kec,isset($item->no_kec) ? $item->no_kec : '','class="form-control" onchange="getkel()" id="no_kec"');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Kelurahan</div> </label>
							<div class="col-sm-8">
								<div id="kelurahan">
									<?php echo form_dropdown('no_kel',array(),isset($item->no_kel) ? $item->no_kel : '','class="form-control" id="no_kel"');      ?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Email</div> </label>
							<div class="col-sm-8">
								<?php echo form_input('email', isset($item->email) ? $item->email : '','class="form-control"  id="email"');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Jenis Usaha</div> </label>
							<div class="col-sm-8">
								<?php echo form_input('jenis_usaha', isset($item->jenis_usaha) ? $item->jenis_usaha : '','class="form-control"  id="jenis_usaha" required');?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"> <div>Alamat</div> </label>
							<div class="col-sm-8">
								<?php
								$data = array(
									'name'        => 'alamat',
									'id'          => 'alamat',
									'value'       => set_value('alamat'),
									'rows'        => '8',
									'cols'        => '20',
									'style'       => 'width:100%',
									'class'       => 'form-control'
								);

								echo form_textarea($data);
								?>
							</div>
						</div>
						<br /><br />
						<div class="form-group">
							<div align="center" id="simpan">
								<?php echo form_submit('submit', 'Simpan','class="btn btn-primary" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
							</div>
						</div>
					</div>
				</div>
				<div id="distance"> </div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<?php echo form_hidden('wajib_pajak_id', '', 'id="wajib_pajak_id"'); ?>
	<?php echo form_hidden($csrf); ?>
	<?php echo form_close();?> 
</div>

<script type="text/javascript">

	$(document).ready(function() {
		
	});

	function ceknpwp() {
		var npwp = $('input[name=npwp]').val();
        // alert(npwp);
        if(npwp=="") {
        	alert('NPWRD Tidak boleh kosong');
        } else {
        	// alert(npwp);
        	$.ajax({
        		url: 'https://layanan.banyuwangikab.go.id/rest/epad_lablh/get_npwp/'+npwp,
        		success: function (r) {
        			json = $.parseJSON(r);
        			if (json.result==0) {
        				alert('Data NPWRD tidak ditemukan silahkan masukkan data wajib retribusi di E-PAD');
        				$('input[name=npwp]').val("");
        			} else {
        				console.log(json.data);
                    	// alert(json.data.length);
                    	for (var i = 0; i < json.data.length; ++i) {
                    		var a = json.data[i];
                    		console.log(a);
                    		var alamat = a.alamat;
                    		var nm_pt = a.nama_pt;
                    		var kab = a.kab;
                    		var kec = a.kec;
                    		var kel = a.kel;
                    		var id_wajib_pajak = a.id_wajib_pajak;
                    		$('input[name=nama]').val(nm_pt);
                    		$('input[name=kab]').val(kab);
                    		$('input[name=alamat]').val(alamat);
                    		$('select[name=no_kec]').val(kec);
                    		$('select[name=no_kel]').val(kel);
                    		document.getElementById("alamat").value = alamat;
                    		$('input[name=wajib_pajak_id]').val(id_wajib_pajak);
                    		// document.getElementById("no_kel").value = no_kel;
                    		// $('input[name=npwp]').val(npwp);
                    		getkel(kel);

                    	}
                    }
                },
                type: "get",
                dataType: "html"
            });
        	return false;
        }

    }

    function ceknib() {
    	var nib = $('input[name=nib]').val();
        // alert(nib);
        if(nib=="") {
        	alert('NPWRD Tidak boleh kosong');
        } else {
        	// alert(nib);
        	$.ajax({
        		url: '<?= base_url()?>master/perusahaan/ceknib/'+nib, 
        		success: function (r) {
        			json = $.parseJSON(r);
        			if (json.result==0) {
        				alert('Data NIB dari perijinan Kab Banyuwangi tidak ditemukan');
        			} else {
        				// console.log(json.data);
                    	// alert(json.data.length);
                    	for (var i = 0; i < json.data.length; ++i) {
                    		var a = json.data[i];
                    		console.log(a);
                    		var alamat = a.almt_perusahaan;
                    		var nm_pt = a.nm_perusahaan;
                    		$('input[name=nama]').val(nm_pt);
                    		$('input[name=alamat]').val(alamat);
                    		document.getElementById("alamat").value = alamat;

                    	}
                    }
                },
                type: "get",
                dataType: "html"
            });
        	return false;
        }

    }

    function getkel(kel = ""){
    	kec = $("#no_kec").val();	
    	if(kel == ""){
    		kel = $("#no_kel").val();	
    	}
    	load('dropdown/kelurahan_no_load/'+kec+'/'+kel,'#kelurahan');
    }

    function getwp(){

    	wp = $("#wajib_retribusi").val();	
    		// alert(wp);
    	if(wp == "1"){
    		// alert(wp);
    		$('input[name=nama').prop( "readonly", true );
    		// $('input[name=nama_pt').prop( "readonly", true );
    	}
    }
</script>