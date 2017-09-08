			<div class="box-sidebar">
					<div class="ads">
						 <?php
                         $query = $this->Mdl_front->get_iklan_top(); 
                         $count_iklan = $this->Mdl_front->get_iklan_top_count();

                         if($count_iklan  > 0) {                    
                         foreach($query as $row){
                        ?>
                         <?php if($row->iklan_status=="1"){?>
                            <a href="<?php echo $row->url ?>"><img class="" src="<?php echo base_url()?>upload/iklan/<?php echo $row->image;?>" alt="<?php echo  $row->iklan_title?>"></a>
                        <?php 
                        }elseif($row->iklan_status=="0"){?>
                            <a href="<?php echo base_url() ?>"><img class="" src="<?php echo base_url()?>assets/front/img/ads.jpg" alt="<?php echo $row->iklan_title?>"></a>
                      <?php 
                        }
                        }
                      }else{
                      ?>
						 <a href="<?php echo base_url()?>"><img class="" width="300" height="250" src="<?php echo base_url()?>assets/front/img/ads.jpg" alt="<?php echo $row->iklan_title ?>"></a>
						 <?php } ?>
					</div>
					<div class="popular-post">
						<div class="page-header">
						  <h4>POPULAR POST</h4>
						</div>
						<?php 
		                    $query = $this->Mdl_front->get_artikel_populer();
		                    foreach($query as $row){
	                    ?>
						<div class="media">
						  <a class="pull-left" href="#">
						    <img class="media-object" src="<?php echo base_url()?>upload/artikel/<?php echo $row->artikel_image;?>" alt="<?php echo $row->artikel_judul;?>" style="width: 64px; height: 64px;">
						  </a>
						  	<div class="media-body">
						    	<h4 class="media-heading"><a href="<?php echo base_url()?>post/detail/<?php echo $row->id_artikel;?>/<?php echo $row->artikel_slug;?>"><?php echo $row->artikel_judul?> </a></h4>
							</div>
						</div>
						<?php } ?>						
					</div>
					<div class="ads">
						<?php
                         $query = $this->Mdl_front->get_iklan_bottom();
                         $count_iklan = $this->Mdl_front->get_iklan_bottom_count();
                          if($count_iklan  > 0) {  
                         foreach($query as $row){
                        ?>
                         <?php if($row->iklan_status=="1"){?>
                        <img class="" width="300" height="250" src="<?php echo base_url()?>upload/iklan/<?php echo $row->image;?>" alt="<?php echo  $row->iklan_title?>">
                       
                        <?php }elseif($row->iklan_status=="0"){?>
                        <img class="" width="300" height="250" src="<?php echo base_url()?>assets/front/img/ads.jpg" alt="">
                      <?php 
                        }

                        }
                      }else{
                      ?>
						<img class="" width="300" height="250" src="<?php echo base_url()?>assets/front/img/ads.jpg" alt="">
                      <?php }?>
					</div>
				</div>