<div class="main">
			<div class="col-md-8">
				<div class="main-content">
                     <ol class="breadcrumb">
                      <li><a href="<?php echo base_url();?>">Home</a></li>
                      <li><a href="<?php echo base_url()?>page/show/<?php echo $this->uri->segment(3);?>"><?php echo $query[0]->page_judul;?></a></li>
                    </ol>
                    <div class="page-header">
                          <h4><?php echo $query[0]->page_judul?></h4>
                    </div>
                   <p><?php echo $query[0]->page_konten?></p>
                </div>            
			</div>
			<div class="col-md-4">
				<?php $this->load->view('frontend/sidebar');?>
			</div>
		</div>
	</div>