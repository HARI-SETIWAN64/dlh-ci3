<section class="welcome_area clearfix" id="home" style="background-image: url(img/bg-img/welcome-bg.png)">
    <div class="hero-slides owl-carousel">
        <!-- Single Hero Slides -->
        <?php 
        $slide = $this->db->query("SELECT * FROM konten where title like 'Slider-%' and catid='4'")->result();
        foreach ($slide as $sliders) {?>
            <div class="single-hero-slide d-flex align-items-end justify-content-center">
                <div class="hero-slide-content text-center">
                    <img class="slide-img" src="<?php echo base_url().'images/konten/'.$sliders->images ?>" alt="">
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<section class="mosh-more-services-area d-sm-flex clearfix">
    <div class="single-more-service-area" onclick="window.location='<?php echo base_url(); ?>konten/konten_detail/pelayanan-uji';">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".1s">
            <img src="<?php echo base_url()?>images/pelayanan.png" alt="" data-toggle="modal" data-target="#PelayananUjiModal">
            <h5>PELAYANAN UJI</h5>
            <!-- <p>Memberikan pelayanan yang terbaik</p> -->
        </div>
    </div>
    <div class="single-more-service-area" onclick="window.location='<?php echo base_url(); ?>konten/konten_detail/pelayanan-simpling';">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".4s">
            <img src="<?php echo base_url()?>images/lingkungan.png" alt="">
            <h5>PELAYANAN SAMPLING</h5>
            <!-- <p>Selalu memantau perkembangan lingkungan dan melakukan pemulihan lingkungan</p> -->
        </div>
    </div>
    <div class="single-more-service-area" onclick="window.location='<?php echo base_url(); ?>konten/search/info';">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".7s">
            <img src="<?php echo base_url()?>images/informasi.png" alt="">
            <h5>INFORMASI</h5>
            <!-- <p>Memberikan informasi seputar lingkungan hidup</p> -->
        </div>
    </div>
    <div class="single-more-service-area" onclick="window.location='<?php echo base_url(); ?>konten/galery';">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay="1s">
            <img src="<?php echo base_url()?>images/pelayanan.png" alt="">
            <h5>GALERY</h5>
            <p></p>
        </div>
    </div>
    <div class="single-more-service-area" onclick="window.location='<?php echo base_url(); ?>konten/search_lms/lms';">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay="1s">
            <img src="<?php echo base_url() ?>images/lms.png" alt="">
            <h5>Learning Management System</h5>
            <p></p>
        </div>
    </div>
</section>

<!-- <div id="PelayananUjiModal" class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                Header
            </div>

            <div class="modal-body">
                <table width="100%">
                    <tr>
                        <td> ==============</td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer modal-footer--mine">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->


<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#modal').on('click', function() {
    //         $('#myModal').modal('show');
    //     });
    // })
</script>