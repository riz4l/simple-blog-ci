	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Edit Iklan</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>iklan">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			<?php
		    				if($this->session->flashdata('update_sukses')){
		    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil disimpan </div>';
		    				}elseif($this->session->flashdata('warning')){
		    					echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>Data harus diisi dengan benar</div>';
		    				}
		    				 echo validation_errors('<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>','</div>');
		    			?>
						<form name="form1" action="<?php echo base_url()?>iklan/edit_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Nama Iklan</label>
								<input type="text" name="text_title" value="<?php echo $iklan_title; ?>" class="form-control">
								<input type="hidden" name="text_idiklan" value="<?php echo $this->uri->segment(3);?>">
								<input type="hidden" value="<?php echo $iklan_is_trash?>" name="text_istrash" class="form-control">
							</div>
							<div class="form-group">
								<label>Posisi</label>
								<select name="text_posisi" class="form-control">
								<option value="0"></option>
								<?php foreach($posisi as $data_posisi){ ?>
								<option <?php if($id_posisi==$data_posisi->id_posisi){?> selected="selected" <?php } ?> value="<?php echo $data_posisi->id_posisi; ?>"><?php echo $data_posisi->posisi_iklan; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="img_iklan">
								<img src="<?php echo base_url()?>upload/iklan/<?php echo $image; ?>" width="90" height="50">
							</div>
							<div class="form-group">
								<label>Url</label>
								<input type="text" name="text_url" value="<?php echo $url; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Iklan Publish</label>
								<input type="text" name="text_publish" class="form-control" value="<?php echo $iklan_publish; ?>">
							</div>
							<div class="form-group">
								<label>Iklan End publish</label>
								<input type="text" name="text_endpublish" class="form-control" value="<?php echo $iklan_endpublish; ?>">  
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="text_status">
									<?php if($iklan_status=="1"){?>
									<option value="1">Active</option>
									<?php }elseif($iklan_status=="0"){ ?>
									<option value="0">Non Active</option>
									<?php } ?>
									<option value="1">Active</option>
									<option value="0">Non Active</option>
								</select>
							</div>
							<div class="form-group">
								<button name="button" class="btn btn-primary">Submit</button>
							</div>
						</form>
				
		    		</div>
		    		
		    	</div>
	    	</div>
	    </div>
	</body>
	