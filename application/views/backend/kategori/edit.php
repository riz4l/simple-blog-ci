	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Add Category</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>kategori">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			
						<form name="form1" action="<?php echo base_url()?>kategori/edit_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Category</label>
								<input type="text" name="text_kategori" value="<?php echo $kategori?>" class="form-control">
								<input type="hidden" value="<?php echo $kategori_is_trash;?>" name="text_istrash" class="form-control">
								<input type="hidden" value="<?php echo $id_kategori;?>" name="text_idkategori" class="form-control">
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="text_status" class="form-control">
								<?php if($kategori_status=="1"){?>
								<option value="1">Aktif</option>
								<?php }elseif($kategori_status=="0"){?>
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
	