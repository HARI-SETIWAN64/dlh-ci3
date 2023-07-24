<section>
    <div class="container">
        <div class="row">



<?php
$i = '0';
foreach($konten as $row):
$i++;
$tgl_up = date('d',strtotime($row->created));
$bln_up = $this->fungsi->bulan(date('m',strtotime($row->created)));
$thn_up = date('Y',strtotime($row->created));
?>


        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="media" style="margin:-10px;">
                        <div class="media-left">
                            <a href="<?php echo site_url()?>konten/detail/<?php echo $row->alias?>.html">
                            <?php if($row->images) { ?>
							<img src="<?php echo base_url()?>images/konten/thumb/<?= $row->images ?>" class="media-object" style="width:100px; height:80px;">
                            <?php } else { ?>
                            
                            <?php } ?>
                            </a>
                        </div>
                        <div class="media-body">
                            <i class="fa fa-calendar"></i> <small><?= $tgl_up ?> <?= $bln_up ?> <?= $thn_up ?></small><br/>
                            <a href="<?php echo site_url()?>konten/detail/<?php echo $row->alias?>.html" title="<?= $row->title ?>">
                            <div class="judulnyaa"><?= $row->title ?></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

        </div>


		<?php if ($i%2 == 0) { ?>
        </div>
        <div class="row">

        <?php }else{?>

        <?php }?>
    <?php endforeach ?>
        </div>



                     <?php echo $pagination; ?>
                </div>
                <!-- /PAGINATION -->
    </div>
</section>




   <script type="text/javascript">
    var site = "<?php echo site_url();?>";
    $(function(){
        $('#title').autocomplete({
          //  serviceUrl: site+'konten/get_data',
        });
    });
    </script>
