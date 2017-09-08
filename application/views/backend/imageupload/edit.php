	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Edit Image Upload</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>img_upload">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			
						<form name="form1" action="<?php echo base_url()?>img_upload/edit_function" method="post" enctype="multipart/form-data">
						</br>
						<input type="hidden" name="text_idimage" value="<?php echo $id_artikel_image; ?>">
						<input type="hidden" name="text_istrash" value="<?php echo $image_is_trash; ?>">
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="file_image">
								<img src="<?php echo base_url()?>upload/img_upload/<?php echo $image; ?>" width="90" height="50">
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="text_status" class="form-control">
								<?php if($this->$image_status=="1"){?>
									<option value="1">Aktif</option>
								<?php }elseif($this->$image_status=="0"){?>
									<option value="0">Tidak Aktif</option>
								<?php } ?>
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
								</select>
							</div>
							<div class="form-group">
								<button name="button" class="btn btn-primary">Submit</button>
							</div>
						</form>
					<?php
		    				if($this->session->flashdata('edit_sukses')){
		    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil disimpan </div>';
		    				}elseif($this->session->flashdata('warning')){
		    					echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>Data harus diisi dengan benar</div>';
		    				}
		    				 echo validation_errors('<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>','</div>');
		    			?>
		    		</div>
		    		
		    	</div>
	    	</div>
	    </div>
	</body>
	