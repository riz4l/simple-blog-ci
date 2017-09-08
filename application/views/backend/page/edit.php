	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<div class="col-md-3">
		    			<div class="bs-callout bs-callout-info">
						    <h4>Add Page</h4>
						    <ol class="breadcrumb">
						    	<li><a href="<?php echo base_url()?>dashboard">Dashboard</a></li>
						    	<li><a href="<?php echo base_url()?>Pagemanagement">Data</a></li>
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
						<form name="form1" action="<?php echo base_url()?>Pagemanagement/edit_function" method="post" enctype="multipart/form-data">
						</br>
							<div class="form-group">
								<label>Page Title</label>
								<input type="text" name="text_judul" value="<?php echo $page_judul; ?>" class="form-control">
								<input type="hidden" name="text_idpage" value="<?php echo $this->uri->segment(3);?>" class="form-control">
								<input type="hidden" value="1" name="text_istrash" value="<?php echo $page_is_trash; ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Page Content</label>
								<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
	                                <script type="text/javascript">
	                                    tinymce.init({
	                                      selector: '#content',
	                                      height: 300,
	                                      plugins: [
	                                        'advlist autolink lists link image charmap print preview anchor',
	                                        'searchreplace visualblocks code fullscreen',
	                                        'insertdatetime media table contextmenu paste code'
	                                      ],
	                                      toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	                                      content_css: [
	                                        '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
	                                        '//www.tinymce.com/css/codepen.min.css'
	                                      ]
	                                    });
	                                </script>
								<textarea name="text_konten" id="content" rows="5" cols="4" class="form-control"><?php echo $page_konten; ?></textarea>
							</div>
							<div class="form-group">
								<label>Keyword</label>
								<textarea name="text_keyword" class="form-control"  rows="3"><?php echo $page_keyword; ?></textarea>
							</div>
							<div class="form-group">
								<label>Description</label>
								<textarea name="text_description" class="form-control" rows="4"><?php echo $page_description; ?></textarea>
							</div>
							<div class="form-group">
								<label>Status</label>
								<select name="text_status" class="form-control">
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
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
	