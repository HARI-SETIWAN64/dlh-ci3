<?php
$kategori = array('1' => 'Berita', '2' => 'Artikel', '3' => 'Info', '4' => 'Profil', '5' => 'Lms');
// print_r($news);
?>

<section class="blog-area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="mosh-blog-posts">
                    <div class="row">
                        <div class="col-12">
                            <div class="blog-post-thumb" align="center">
                                <font size="4" color="#000"><b>
                                        <?php echo $news->title; ?>
                                    </b></font>
                                </br></br>
                            </div>
                            <div class="blog-post-thumb" align="center">
                                <?php if ($news->images <> "") { ?>
                                    <img src="<?php echo base_url() ?>images/konten/<?php echo $news->images; ?>" alt=""
                                        style="max-height: 900px; max-width: 100%" data-action="zoom">
                                <?php } ?>
                            </div>
                            </br></br>
                            <div class="post-meta" align="center">
                                <h6>By <a href="#">Admin,</a><a href="#">
                                        <?php echo $news->created; ?>,
                                    </a><a href="#">
                                        <?php echo $kategori[$news->catid]; ?>
                                    </a></h6>
                            </div>
                            <div class="isi">
                                <?php echo $news->introtext; ?>
                                <br>
                                <?php if ($news->pdf <> "") { ?>
                                    <embed align="center" src="<?php echo base_url() ?>pdf/<?php echo $news->pdf; ?>"
                                        width="100%" height="500px" type='application/pdf'>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mosh-blog-sidebar">
                    <!-- <font size="5px" style="font-family: "calibri", Garamond, 'Comic Sans MS';">Pencarian</font>
                    <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px"></hr>
                    <div class="blog-post-search-widget mb-100">
                        <form action="<?php echo base_url() ?>konten/search/">
                            <input type="search" name="search" id="Search">
                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </form>
                    </div> -->
                    <div class="blog-post-categories mb-100">
                        <font size="5px" style="font-family: " calibri", Garamond, 'Comic Sans MS' ;">Kategori</font>
                        <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px">
                        </hr>
                        <ul>
                            <li><a href="<?php echo base_url() ?>konten/search/berita">BERITA</a></li>
                            <li><a href="<?php echo base_url() ?>konten/search/artikel"">ARTIKEL</a></li>
                            <li><a href=" <?php echo base_url() ?>konten/search/info"">INFO</a></li>
                            <li><a href="<?php echo base_url() ?>konten/pengaduan"">PENGADUAN</a></li>
                            <li><a href=" <?php echo base_url() ?>konten/search_lms/lms">LMS</a></li>
                        </ul>
                    </div>

                    <div class="latest-blog-posts mb-100">
                        <font size="5px" style="font-family: " calibri", Garamond, 'Comic Sans MS' ;">Post Terakhir
                        </font>
                        <hr style="height:3px;border:none;color:#333;background-color:#333; margin-top: 0px">
                        </hr>
                        <!-- Single Latest Blog Post -->
                        <?php foreach ($last_konten as $last_kontens) { ?>
                            <div class="single-latest-blog-post d-flex">
                                <div class="latest-blog-post-thumb">
                                    <?php if ($last_kontens->images <> '') { ?>
                                        <img src="<?php echo base_url() ?>images/konten/<?php echo $last_kontens->images; ?>"
                                            alt="">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() ?>images/noimage.jpg" alt="">
                                    <?php } ?>
                                </div>
                                <div class="latest-blog-post-content">
                                    <a href="<?php echo base_url() . 'konten/konten_detail/' . $last_kontens->alias ?>">
                                        <font size="2" color="#000"><b>
                                                <?php echo $last_kontens->title; ?>
                                            </b></font>
                                    </a>
                                    <div class="post-meta">
                                        <h6>By <a href="#">Admin,</a><a href="#">
                                                <?php echo $last_kontens->created; ?>,
                                            </a><a href="#">
                                                <?php echo $kategori[$last_kontens->catid]; ?>
                                            </a></h6>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>