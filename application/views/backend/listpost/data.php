	    <div class="container">
	    	<div class="row">
	    		<div class="">
		    		<div class="col-md-12">
			    		<div class="page-header">
							<h1><a href="<?php echo base_url()?>listpost">List<small> Artikel</a></small></h1>
						</div>
							<form method="post" name="form1" action="<?php echo base_url()?>listpost/search" enctype="multipart/form-data">
						    <div class="input-group">
						      <input type="text" class="form-control" placeholder="Search" name="keyword">
						      <span class="input-group-btn">
						        <input type="submit" name="btn_search" value="Go" class="btn btn-default">
						      </span>
						    </div><!-- /input-group -->
						</form>
						<?php
							if($this->session->flashdata('delete_sukses')){
	    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil dihapus </div>';
							}
						?>
						<?php foreach($query as $row){ ?>
						<div class="col-sm-6 col-md-4">
					        <div class="thumbnail list-box">
					        <?php if($row->artikel_status=="1"){?>
					          <div class="label-status-active">Active</div>
					          <?php }elseif($row->artikel_status=="0"){ ?>
					           <div class="label-status-notactive">Not Active</div>
					          <?php } ?>

					          <img data-src="holder.js/300x200" alt="300x200" src="<?php echo base_url()?>upload/artikel/<?php echo $row->artikel_image;?>" style="width: 300px; height: 200px;">
					          <div class="caption">
					            <h4 class="title-artikel"><a href="#" data-toggle="modal" data-target="#myModal<?php echo $row->id_artikel?>"><?php echo $row->artikel_judul; ?></a></h4>
					         
					            <div class="description">
					            <p><?php echo substr($row->artikel_konten,0,75); ?></p>
					            </div>
					            <p class=""><a href="<?php echo base_url()?>posting/edit/<?php echo $row->id_artikel; ?>" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
					            			<a href="<?php echo base_url()?>listpost/delete/<?php echo $row->id_artikel;?>" onclick="return confirm('Apakah anda yakin?');" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span> Delete</a>
					            	<b style="position:relative; left:120px;"><span class="glyphicon glyphicon-eye-open" style=""></span> <?php echo $row->artikel_count;?></b>
					            </p>
					          </div>
					        </div>
				      	</div>
						<!-- Modal -->
						<div class="modal fade" id="myModal<?php echo $row->id_artikel?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel"><?php echo $row->artikel_judul;?> </h4>
						      </div>
						      <div class="modal-body">
						      	<img src="<?php echo base_url()?>upload/artikel/<?php echo $row->artikel_image?>" width="570" height="300">
						        <?php echo $row->artikel_konten;?>
						      </div>
						      <div class="modal-footer">
						      	<div align="left">
							      	<span>Status : </span>
							      	<?php if($row->artikel_status=="1"){ ?>
							      	<label class="label label-success">Active</label>
							      	<?php }elseif($row->artikel_status=="0"){?>
							      	<label class="label label-danger">Not Active</label>
							      	<?php } ?>
						      	</div>
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
						<!-- end modal-->
				      <?php } ?>     
		    	</div>
		    		<?php echo $this->pagination->create_links()?>
		    		</div>	
	    	</div>
	    </div>
	</body>
	
