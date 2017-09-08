<div class="main">
			<div class="col-md-8">
                  <div style="position:relative;top:10px;"><b>Search Result <?php echo $_POST['keyword']; echo '..'?></b></div></br>
				<?php 
                if($search_count > 0){
                foreach($query as $row){
                ?>
				<div class="main-content">
                    <img class="img-responsive img-border img-full" src="<?php echo base_url()?>upload/artikel/<?php echo $row->artikel_image; ?>" alt="<?php echo $row->artikel_judul?>" alt="" width="" height="">
                        <h2><a href="<?php echo base_url()?>post/detail/<?php echo $row->id_artikel;?>/<?php echo $row->artikel_slug;?>"><?php echo $row->artikel_judul; ?></a>
                            <br>
                            <small><?php  $date = date("d-M-Y H:i:s", strtotime($row->artikel_publishdate)); echo $date;?></small>
                        </h2>
                        <p><?php echo substr($row->artikel_konten,0,152); echo '..';?></p>
                        <a href="<?php echo base_url()?>post/detail/<?php echo $row->id_artikel;?>/<?php echo $row->artikel_slug;?>" class="btn btn-default btn-sm">Read More</a>
                        <hr>
                </div>
                <?php }}else{ ?>
                    <h4>Sorry no article about <?php echo $_POST['keyword']; echo '..'?></h4>
                <?php }?>
                    <div class="text-center">
                        <?php echo $this->pagination->create_links();?>
                    </div>                
			</div>
			<div class="col-md-4">
				<?php $this->load->view('frontend/sidebar');?>
			</div>
		</div>
	</div>