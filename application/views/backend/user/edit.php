	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Edit User</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>usermanagement">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			
						<form name="form1" action="<?php echo base_url()?>usermanagement/edit_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="text_nama" value="<?php echo $nama;?>" class="form-control">
								<p class="help-block"><?php echo form_error('text_nama')?></p>
								<input type="hidden" value="<?php echo $user_is_trash?>" name="text_istrash" class="form-control">
								<input type="hidden" value="<?php echo $this->uri->segment(3);?>" name="text_idusers" class="form-control">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="text_username" class="form-control" value="<?php echo $username;  ?>">
								<p class="help-block"><?php echo form_error('text_username')?></p>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="text_password" value="" class="form-control">
								<p class="help-block"><?php echo form_error('text_password')?></p>
							</div>
							<div class="form-group">
								<button name="button" class="btn btn-primary">Submit</button>
							</div>
						</form>
					<?php
		    				if($this->session->flashdata('update_sukses')){
		    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil diupdate </div>';
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
	