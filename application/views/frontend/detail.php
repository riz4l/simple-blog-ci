<div class="main">
			<div class="col-md-8">
				<div class="main-content-detail">
					<ol class="breadcrumb">
                      <li><a href="<?php echo base_url()?>">Home</a></li>
                      <li><a href="<?php echo base_url()?>post/category/<?php echo $id_kategori?>/<?php echo $kategori_slug?>"><?php echo $kategori; ?></a></li>
                      <li><?php echo $artikel_judul?></li>
                  	</ol>
                    <img class="img-responsive img-border img-full" src="<?php echo base_url()?>upload/artikel/<?php echo $artikel_image; ?>" alt="<?php echo $artikel_judul;?>" width="" height="">
                        <h1><?php echo $artikel_judul; ?>
                            <br>
                            <small><?php  $date = date("d-M-Y H:i:s", strtotime($artikel_publishdate)); echo $date;?></small>
                        </h1>
                        <p><?php echo $artikel_konten; ?></p>
                        <span>
                            <small>Posted by: <?php echo $nama; ?></small>
                        </span>
                        <div>
                        </br>
                        <span class='st_facebook' displayText='Facebook'></span>
                        <span class='st_twitter' displayText='Tweet'></span>
                        <span class='st_googleplus' displayText='Google +' style="position: relative;bottom: 4;"></span>
                          <!--   <span class='st_facebook_large' st_url="<?php echo base_url()?>post/detail/<?php echo $id_artikel;?>/<?php echo $artikel_slug;?>" displayText='Facebook'></span>
                            <span class='st_twitter_large' st_url="<?php echo base_url()?>post/detail/<?php echo $id_artikel;?>/<?php echo $artikel_slug;?>" displayText='Tweet'></span>
                            <span class='st_googleplus_large' st_url="<?php echo base_url()?>post/detail/<?php echo $id_artikel;?>/<?php echo $artikel_slug;?>" displayText='Google +'></span> -->
                        </div>
                        <hr>
                    <h4>Related Article</h4>
                    <?php 
                    	foreach($query as $row){
                    ?>
                    <div class="col-sm-6 col-md-4">
					    <div class="thumbnail">
					      <img src="<?php echo base_url()?>upload/artikel/<?php echo $row->artikel_image?>" alt="<?php echo $row->artikel_judul?>">
					      <div class="caption">
					        <h3><a href="<?php echo base_url()?>post/detail/<?php echo $row->id_artikel;?>/<?php echo $row->artikel_slug;?>"><?php echo $row->artikel_judul?></a></h3>
					      </div>
					    </div>
				  	</div>
					   <?php } ?>
					 <div class="fb-comments" data-href="http://acode.web.id/post/detail/<?php echo $row->id_artikel?>/<?php echo $row->artikel_slug?>" data-numposts="5"></div></br>
                </div>
			</div>
			<div class="col-md-4">
				<?php $this->load->view('frontend/sidebar')?>
			</div>
		</div>
</div>