<?php
$kategori = array('1'=>'Berita','2'=>'Artikel','3'=>'Info','4'=>'Profil','5'=>'Lms'); 
?>

<section class="blog-area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="contact-form-area">
                    <h4>Form Pengaduan</h4>
                    <?php echo form_open_multipart('konten/konten/pengaduan_simpan', 'class="form-horizontal"');?>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- <?php echo form_input('nama', '','class="form-control" id="nama" placeholder="nama"');?><?php echo form_error('nama') ; ?> -->
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama">
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- <?php echo form_input('telp', '','class="form-control"  id="telp" placeholder="telp"');?><?php echo form_error('telp') ; ?> -->
                                <input type="telp" name="telp" class="form-control" id="telp" placeholder="telp">
                            </div>
                            <div class="col-12">
                                <!-- <?php echo form_input('email', '','class="form-control"  id="email" placeholder="email"');?><?php echo form_error('email') ; ?> -->
                                <input type="email" name="email" class="form-control" id="email" placeholder="email">
                            </div>
                            <div class="col-12">
                                <textarea name="isi" class="form-control" id="isi" cols="30" rows="10" placeholder="isi"></textarea>
                            </div>

                            <?php echo form_submit('submit', 'Simpan','class="btn mosh-btn mt-20" onclick="return confirm(\'Apakah anda sudah yakin ?\');"');?>
                        </div>
                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_close();?> 
                </div>
                <div id="distance"> </div>
                <div class="clearfix"></div>
                <div class="mosh-blog-posts" style="padding-top: 20px;">
                    <div class="row">
                        <!-- Single Blog Start -->
                        <?php
                            // print_r($konten);
                        foreach ($data as $pengaduan) {?>
                            <div class="col-12">
                                <div class="single-blog wow fadeInUp" data-wow-delay="1s">
                                    <div class="row">
                                        <!-- Post Thumb -->
                                        <div class="col-md-2">

                                            <div class="latest-blog-post-thumb">
                                                <img src="<?php echo base_url()?>images/pesan.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <!-- Post Meta -->
                                            <div class="post-meta">
                                                <font size="4" color="#000"><b><?php echo $pengaduan->nama; ?></b></font>
                                                <h6>By <a href="#"><?php echo $pengaduan->nama;?>,</a><a href="#"><?php echo $pengaduan->tgl_create;?></a></h6>
                                            </div>
                                            <p><?php echo $pengaduan->isi;?></p>
                                            <?php if($pengaduan->tanggapan <> "" or $pengaduan->tanggapan <> NULL){ ?>
                                                <a class= aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Tanggapan</a>
                                            <?php } ?>
                                            <div class="col-12">
                                                <div class="accordions mb-100" id="accordion" role="tablist" aria-multiselectable="true">
                                                    <!-- single accordian area start -->
                                                    <div class="panel single-accordion">
                                                        <div id="collapseOne" class="accordion-content collapse">
                                                            <?php echo "<p>".$pengaduan->tanggapan."</p>"; ?>
                                                        </div>
                                                    </div>
                                                    <!-- single accordian area start -->
                                                </div>
                                            </div>
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
                        <!-- <font size="5px" style="font-family: "calibri", Garamond, 'Comic Sans MS';">Pencarian</font> -->
                        <!-- <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px"></hr> -->
                        <div class="blog-post-search-widget mb-100">
                           <!--  <form action="<?php echo base_url()?>konten/search/">
                                <input type="search" name="search" id="Search">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form> -->
                        </div>
                        <div class="blog-post-categories mb-100">
                            <font size="5px" style="font-family: "calibri", Garamond, 'Comic Sans MS';">Kategori</font>
                            <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px"></hr>
                            <ul>
                                <li><a href="<?php echo base_url()?>konten/search/berita">BERITA</a></li>
                                <li><a href="<?php echo base_url()?>konten/search/artikel"">ARTIKEL</a></li>
                                <li><a href="<?php echo base_url()?>konten/search/info"">INFO</a></li>
                                <li><a href="<?php echo base_url()?>konten/pengaduan"">PENGADUAN</a></li>
                                <li><a href=" <?php echo base_url() ?>konten/search_lms/lms">LMS</a></li>
                            </ul>
                        </div>

                        <div class="latest-blog-posts mb-100">
                            <font size="5px" style="font-family: "calibri", Garamond, 'Comic Sans MS';">Post Terakhir</font>
                            <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px"></hr>
                            <!-- Single Latest Blog Post -->
                            <?php foreach ($last_konten as $last_kontens) { ?>
                                <div class="single-latest-blog-post d-flex">
                                    <div class="latest-blog-post-thumb">
                                        <?php if($last_kontens->images<>'') {?>
                                            <img src="<?php echo base_url()?>images/konten/<?php echo $last_kontens->images;?>" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url()?>images/noimage.jpg" alt="">
                                        <?php } ?>
                                    </div>
                                    <div class="latest-blog-post-content">
                                        <a href="<?php echo base_url().'konten/konten_detail/'.$last_kontens->alias ?>"><font size="4" color="#000"><b><?php echo $last_kontens->title; ?></b></font></a>
                                        <div class="post-meta">
                                            <h6>By <a href="#">Admin,</a><a href="#"><?php echo $last_kontens->created;?>, </a><a href="#"><?php echo $kategori[$last_kontens->catid]; ?></a></h6>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
