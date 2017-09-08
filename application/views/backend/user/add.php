	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Add User</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>usermanagement">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			
						<form name="form1" action="<?php echo base_url()?>usermanagement/add_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="text_nama" class="form-control">
								<input type="hidden" value="1" name="text_istrash" class="form-control">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="text_username" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="text_password" class="form-control">
							</div>
							<div class="form-group">
								<button name="button" class="btn btn-primary">Submit</button>
							</div>
						</form>
					<?php
		    				if($this->session->flashdata('tambah_sukses')){
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
	