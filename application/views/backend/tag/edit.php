	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Update Tags</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>tags">Data</a></li>
						    </ol>
						</div>
		    		</div>

		    		<div class="col-md-9">
		    			
						<form name="form1" action="<?php echo base_url()?>tags/edit_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Tag Name</label>
								<input type="text" name="text_tagname" value="<?php echo $tag_name;?>" class="form-control">
								<input type="hidden"  name="text_istrash" value="<?php echo $tag_is_trash; ?>" class="form-control">
								<input type="hidden"  name="text_idtag" value="<?php echo $this->uri->segment(3);?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="text_status" class="form-control">
								<?php if($tag_status=="1"){?>
								<option value="1">Aktif</option>
								<?php }elseif($tag_status=="0"){ ?>
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
		    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil diUpdate</div>';
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
	