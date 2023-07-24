<?php
$kategori = array('1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil' , '5' => 'Lms'); 
?>

<section class="blog-area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="mosh-blog-posts">
                        <div class="row">
                            <!-- Single Blog Start -->
                            <?php
                            // print_r($konten);
                            foreach ($data as $kontens) {?>
                                <div class="col-12">
                                    <div class="single-blog wow fadeInUp" data-wow-delay="1s">
                                        <div class="row">
                                            <!-- Post Thumb -->
                                            <div class="col-md-4">
                                                <div class="blog-post-thumb">
                                                    <img src="<?php echo base_url()?>images/konten/<?php echo $kontens->images;?>" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <!-- Post Meta -->
                                                <div class="post-meta">
                                                    <a href="<?php echo base_url().'konten/konten_detail_lms/'.$kontens->alias ?>"><font size="4" color="#000"><b><?php echo $kontens->title; ?></b></font></a>
                                                    <h6>By <a href="#">Admin,</a><a href="#"><?php echo $kontens->created;?>, </a><a href="#"><?php echo $kategori[$kontens->catid]; ?></a></h6>
                                                </div>
                                                <!-- Post Title -->
                                                <!-- Post Excerpt -->
                                                <p><?php echo substr($kontens->introtext, 0, 200);?><a href="<?php echo base_url().'konten/konten_detail_lms/'.$kontens->alias ?>"> Baca Selengkapnya</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Pagination Area Start -->
                    <div class="mosh-pagination-area">
                        <nav>
                            <?php echo $pagination; ?>
                            <!-- <ul class="pagination">
                                <li class="page-item active"><a class="page-link" href="#">1.</a></li>
                                <li class="page-item"><a class="page-link" href="#">2.</a></li>
                                <li class="page-item"><a class="page-link" href="#">3.</a></li>
                            </ul> -->
                        </nav>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="mosh-blog-sidebar">
                    <font size="5px" style="font-family: "calibri", Garamond, 'Comic Sans MS';">Pencarian</font>
                    <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px"></hr>
                    <div class="blog-post-search-widget mb-100">
                        <form action="<?php echo base_url()?>konten/search/">
                            <input type="search" name="search" id="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    <div class="latest-blog-posts mb-100">
                        <font size="5px" style="font-family: "calibri", Garamond, 'Comic Sans MS';">Post Terakhir</font>
                        <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px"></hr>
                        <!-- Single Latest Blog Post -->
                        <?php foreach ($lms_konten as $lms_kontens) { ?>
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <?php if($lms_kontens->images<>'') {?>
                                        <img src="<?php echo base_url()?>images/konten/<?php echo $lms_kontens->images;?>" alt="">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url()?>images/noimage.jpg" alt="">
                                    <?php } ?>
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="<?php echo base_url().'konten/konten_detail_lms/'.$lms_kontens->alias ?>"><font size="4" color="#000"><b><?php echo $lms_kontens->title; ?></b></font></a>
                                    <div class="post-meta">
                                        <h6>By <a href="#">Admin,</a><a href="#"><?php echo $lms_kontens->created;?>, </a><a href="#"><?php echo $kategori[$lms_kontens->catid]; ?></a></h6>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
