	    <div class="container">
	    	<div class="row">
	    		<div class="">
	    			<ol class="breadcrumb">
					  <li><a href="<?php echo base_url()?>posting">Posting</a></li>
					  <li><a href="<?php echo base_url()?>listpost">Data</a></li>
					</ol>
	    			<?php
	    				if($this->session->flashdata('update_sukses')){
	    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil disimpan </div>';
	    				}elseif($this->session->flashdata('warning')){
	    					echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>Data harus diisi dengan benar</div>';
	    				}
	    				 echo validation_errors('<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>','</div>');
		    		?>
		    		<div class="col-md-8">
		    			<div>
		    				<form name="form1" action="<?php echo base_url()?>posting/edit_function" method="post" enctype="multipart/form-data">
			    				<div class="form-group">
								  <label></label>
								  <input type="text" placeholder="Title.." name="text_title" value="<?php echo $artikel_judul; ?>" class="form-control">
								</div>
							    <script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce_4.5.0/tinymce.min.js"></script>
	                                <script type="text/javascript">
	                                     tinymce.init({
										  selector: '#content',
										  height: 560,
										  theme: 'modern',
										  convert_urls: false,
										  codesample_languages: [
										        {text: 'HTML/XML', value: 'markup'},
										        {text: 'JavaScript', value: 'javascript'},
										        {text: 'CSS', value: 'css'},
										        {text: 'PHP', value: 'php'},
										        {text: 'Ruby', value: 'ruby'},
										        {text: 'Python', value: 'python'},
										        {text: 'Java', value: 'java'},
										        {text: 'C', value: 'c'},
										        {text: 'C#', value: 'csharp'},
										        {text: 'C++', value: 'cpp'}
										    ],
										  plugins: [
										    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
										    'searchreplace wordcount visualblocks visualchars code fullscreen',
										    'insertdatetime media nonbreaking save table contextmenu directionality',
										    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
										  ],
										  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
										  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
										  image_advtab: true,
										  templates: [
										    { title: 'Test template 1', content: 'Test 1' },
										    { title: 'Test template 2', content: 'Test 2' }
										  ],
										  content_css: [
										    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
										    '//www.tinymce.com/css/codepen.min.css'
										  ]
										 });
	                                </script>
	                            <textarea class="" name="text_konten" value=""  rows="5" cols="3" id="content" ><?php echo $artikel_konten; ?></textarea>
							</div>
			    		</div>
			    		<div class="col-md-4">
			    			<div>
			    				<div class="form-group">
			    					<label>Image</label>
			    					<input type="file" name="img_artikel"> 
			    					<img src="<?php echo base_url()?>upload/artikel/<?php echo $artikel_image; ?>" width="90" height="50">
			    					<p class="help-block">617x296</p> 
			    				</div>
				    			<div class="form-group">
				    			   <label>Category</label>
								   <select name="text_kategori" class="form-control" placeholder="">
								   	<option value="0">select category</option>
								   	<?php foreach($kategori as $data_kategori){?>
								   	<option <?php if($id_kategori==$data_kategori->id_kategori){?> selected="selected" <?php } ?> value=<?php echo $data_kategori->id_kategori;?>><?php echo $data_kategori->kategori;?></option>
								   	<?php } ?>
								   </select>
								</div>
								<div class="form-group">
				    			   <label>Tags</label>
								   <select  name="text_tags[]" data-placeholder="Select some Tags" class="form-control chosen-select" multiple tabindex="8">
								   	<?php 
								   		$query = $this->db->get_where('tb_tags',array('id_artikel'=>$id_artikel))->result();

								   		$artikel_tag = array();

								   		foreach($query as $row){
								   			$artikel_tag[] = $row->id_artikel_tags;
								   		}

								   		$tags = $this->Mdl_posting->get_tag();
								   		foreach($tags as $row_tags){

								   			if(!empty($artikel_tag)){
								   				$option_tag =  in_array($row_tags->id_artikel_tag,$artikel_tag)?'selected="selected"':'';
								   			}else{
								   				$option_tag = "";
								   			}
								   		

								   	?>
								   	<option <?php echo $option_tag;?> value="<?php echo $row_tags->id_artikel_tag?>"><?php echo $row_tags->tag_name;?></option>
								   	<?php } ?>
								   </select>
								</div>
								<div class="form-group">
									<label>Keyword</label>
									<textarea name="text_keyword" class="form-control"><?php echo $artikel_keyword; ?></textarea>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea name="text_description" class="form-control" rows="4"><?php echo $artikel_description; ?></textarea>
								</div>
								<div class="form-group">
									<label>Publish Date</label>
									<input type="text" name="text_date" class="form-control" value="<?php echo $artikel_publishdate; ?>"> 
									<input type="hidden" name="text_istrash" value="<?php echo $artikel_is_trash?>">
									<input type="hidden" name="text_idartikel" value="<?php echo $this->uri->segment(3);?>">
									<input type="hidden" name="text_idusers" value="<?php echo $this->session->userdata('id_users')?>">
								</div>
								<div class="form-group">
									<label>Featured</label></br>
									<div class="radio-inline">
									  <label>
									    <input <?php if($artikel_is_featured=="1"){?> checked <?php }?> type="radio" name="text_featured" id="" value="1">
									    <label class="label label-success"> Yes </label>
									  </label>
									</div>
									<div class="radio-inline">
									  <label>
									    <input  <?php if($artikel_is_featured=="0"){?> checked <?php }?> type="radio" name="text_featured" id="" value="0">
									    <label class="label label-danger"> No</label>
									  </label>
									</div>
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="radio">
									  <label>
									    <input type="radio" <?php if($artikel_status=="1"){?> checked <?php } ?> name="text_status" id="" value="1">
									    <label class="label label-success">Active</label>
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="text_status" id="" value="0" <?php if($artikel_status=="0"){?> checked <?php } ?>>
									    <label class="label label-danger"> Non Active</label>
									  </label>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" value="SUBMIT" class="btn btn-primary">
								</div>
							</div>
						</form>
		    		</div>
		    	</div>
	    	</div>
	    </div>
	</body>
	