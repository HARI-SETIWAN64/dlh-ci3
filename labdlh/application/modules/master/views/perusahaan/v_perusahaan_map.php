<?php $st = array('' => '', '1' => 'Negeri', '2' => 'Swasta') ?>

<div class="box box-default">  
    <div class="box-header with-border">
        <h3 class="box-title">MAP PERUSAHAAN</h3>
        <div class="box-body">  
            <div class="table-responsive no-padding">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>NAMA</th>
                        <th>ALAMAT</th>
                        <th>TELP</th>
                        <th>EMAIL</th>
                    </tr>
                    <tr>
                        <td><?php echo $item->nama; ?></td>
                        <td><?php echo $item->alamat; ?> </td>
                        <td><?php echo $item->telp; ?></td>
                        <td><?php echo $item->email; ?></td>
                    </tr>   
                </table>
            </div>
            <?php echo form_open('pendaftaran/map/map_simpan_manual/'. $item->id, 'id="form" class="form-horizontal" '); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Latitude</label>      
                        <div class="col-sm-8">       
                            <?php echo form_input('lat', !empty($item->lat) ? $item->lat : '', 'id="lat" class="form-control input-sm"') ?>        
                        </div>     
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Longitude</label>      
                        <div class="col-sm-8">       
                            <?php echo form_input('lng', !empty($item->lng) ? $item->lng : '', 'id="lng" class="form-control input-sm"') ?>        
                        </div>     
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-12">
                        <table>
                            <tr>
                                <td width="35%"><b>1. Tambah Titik</b></td>
                                <td width="5%">:</td>
                                <td width="60%">Klik kanan pada lokasi yang sesuai</td>
                            </tr>
                            <tr>
                                <td><b>2. Ubah Titik</b></td>
                                <td>:</td>
                                <td>Geser icon pada peta</td>
                            </tr>
                            <tr>
                                <td><b>3. Hapus Titik</b></td>
                                <td>:</td>
                                <td>Klik kanan icon pada peta</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-4 control-label"></label>      
                <div class="col-sm-8">       
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>     
            </div>

        </form>
        <br/>
        <?php echo $map['js']; ?>
        <?php echo $map['html']; ?>
    </div>
</div>
</div>



<script type="text/javascript">
    function insertDatabase(newLat, newLng)
    {
        if (confirm("Yakin Akan Menambah Kordinat ????"))
        {
            $.ajax({url: site+'master/perusahaan/simpan_map/' + newLat + '/' + newLng + '/' + '<?php echo $kodeid ?>',
                success: function(r){
                  json = $.parseJSON(r);
                  if (json.status == 'success'){
                   alert(json.message);
                   window.location = '<?php echo base_url() ?>master/perusahaan/map/<?php echo $kodeid ?>';
               }else{
                alert(json.message);
                window.location = '<?php echo base_url() ?>master/perusahaan/map/<?php echo $kodeid ?>';
            }
        },
        type: "post", 
        dataType: "html"
    }); 
            return false;

        }
        return false;
    }

    function updateDatabase(newLat, newLng, idmap)
    {
        if (confirm("Anda Yakin Akan Merubah Posisi?"))
        {
            $.ajax({url: site+'master/perusahaan/simpan_map/' + newLat + '/' + newLng + '/' + idmap,
                success: function(r){
                  json = $.parseJSON(r);
                  if (json.status == 'success') {
                   alert(json.message);
                   window.location = '<?php echo base_url() ?>master/perusahaan/map/<?php echo $kodeid ?>';
               }else{
                alert(json.message);
                window.location = '<?php echo base_url() ?>master/perusahaan/map/<?php echo $kodeid ?>';
            }
        },
        type: "post", 
        dataType: "html"
    }); 
            return false;

        }
        return false;
    }



    function deleteDatabase(idmap)
    {
        if (confirm("Anda Yakin Akan Menghapus?"))
        {
            $.ajax({url: site+'master/perusahaan/delete_map/'+idmap,
                success: function(r){
                  json = $.parseJSON(r);
                  if (json.status == 'success') {
                   alert(json.message);
                   window.location = '<?php echo base_url() ?>master/perusahaan/map/<?php echo $kodeid ?>';
               }else{
                alert(json.message);
                window.location = '<?php echo base_url() ?>master/perusahaan/map/<?php echo $kodeid ?>';
            }
        },
        type: "post", 
        dataType: "html"
    }); 
            return false;

        }
        return false;
    }
</script>

