	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Add Iklan</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>iklan">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			<?php
		    				if($this->session->flashdata('tambah_sukses')){
		    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil disimpan </div>';
		    				}elseif($this->session->flashdata('warning')){
		    					echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>Data harus diisi dengan benar</div>';
		    				}
		    				 echo validation_errors('<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>','</div>');
		    			?>
						<form name="form1" action="<?php echo base_url()?>iklan/add_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Nama Iklan</label>
								<input type="text" name="text_title" class="form-control">
								<input type="hidden" value="1" name="text_istrash" class="form-control">
							</div>
							<div class="form-group">
								<label>Posisi</label>
								<select name="text_posisi" class="form-control">
								<option value="0"></option>
								<?php foreach($posisi as $data_posisi){ ?>
								<option value="<?php echo $data_posisi->id_posisi; ?>"><?php echo $data_posisi->posisi_iklan; ?></option>
								<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label>Image</label>
								<input type="file" name="img_iklan">
							</div>
							<div class="form-group">
								<label>Url</label>
								<input type="text" name="text_url" class="form-control">
							</div>
							<div class="form-group">
								<label>Iklan Publish</label>
								<input type="text" name="text_publish" class="form-control" value="<?php echo date('Y-m-d')?>">
							</div>
							<div class="form-group">
								<label>Iklan End publish</label>
								<input type="text" name="text_endpublish" class="form-control" value="<?php echo date('Y-m-d')?>">  
							</div>
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" name="text_status">
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
	