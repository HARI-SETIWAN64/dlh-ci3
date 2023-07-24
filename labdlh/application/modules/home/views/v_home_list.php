<div class="col-12 col-md-8">
    <div class="mosh-blog-posts">
        <div class="row">
            <?php foreach ($items as $kontens) {?>
                <div class="col-12">
                    <div class="single-blog wow fadeInUp" data-wow-delay="1s">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="blog-post-thumb">
                                  <?php if($kontens->images<>'') {?>
                                      <img src="<?php echo base_url()?>images/konten/<?php echo $kontens->images;?>" alt="">
                              <?php } else { ?>
                                  <img src="<?php echo base_url()?>images/noimage.png" alt="">
                              <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="post-meta">
                                    <a href="<?php echo base_url().'konten/konten_detail/'.$kontens->alias ?>"><font size="4" color="#000"><b><?php echo $kontens->title; ?></b></font></a>
                                    <h6>By <a href="#">Admin,</a><a href="#"><?php echo $kontens->created;?>, </a><a href="#"><?php echo $kategori[$kontens->catid]; ?></a></h6>
                                </div>
                                <p><?php echo substr($kontens->introtext, 0, 200);?><a href="<?php echo base_url().'konten/konten_detail/'.$kontens->alias ?>"> Baca Selengkapnya</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
      $total_page = $total_items / 10;
      if ($total_page < 1){
      $total_page = '1';
    }
    ?>
    <!-- Pagination Area Start -->
    <div id="page-selection" align="center"></div>
</div>
<br/>

<script>
// init bootpag
$('#page-selection').bootpag({
page : <?php echo $page?>,
total: <?php echo $total_page+1 ?>,
maxVisible: 5
}).on("page", function(event, /* page number here */ num){
var n = num;

//$("#content").html("Insert content"); // some ajax content loading...
$(".page").html("Page " + num);
get_items(n);
});



</script>
