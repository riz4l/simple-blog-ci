	    <div class="container">
	    	<div class="row">
	    		<div class="">
	    			<ol class="breadcrumb">
					  <li><a href="<?php echo base_url()?>posting">Posting</a></li>
					  <li><a href="<?php echo base_url()?>listpost">Data</a></li>
					  <li><a  data-toggle="modal" data-target="#myModal">Style Script</a></li>
					</ol>
	    			<?php
	    				if($this->session->flashdata('tambah_sukses')){
	    					echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Information! Data Berhasil disimpan </div>';
	    				}elseif($this->session->flashdata('warning')){
	    					echo '<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>Data harus diisi dengan benar</div>';
	    				}
	    				 echo validation_errors('<div class="alert alert-warning"><a class="close" data-dismiss="alert">&times;</a>','</div>');
		    		?>
		    		<div class="col-md-8">
		    			<div>
		    				<form name="form1" action="<?php echo base_url()?>posting/add_function" method="post" enctype="multipart/form-data">
			    				<div class="form-group">
								  <label></label>
								  <input type="text" placeholder="Title.." name="text_title" class="form-control">
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
	                            <textarea class="form-control" name="text_konten"  rows="5" cols="3" id="content" ></textarea>
							</div>
			    		</div>
			    		<div class="col-md-4">
			    			<div>
			    				<div class="form-group">
			    					<label>Image</label>
			    					<input type="file" name="img_artikel">
			    					<p class="help-block">617x296</p> 
			    				</div>
				    			<div class="form-group">
				    			   <label>Category</label>
								   <select name="text_kategori" class="form-control" placeholder="">
								   	<option value="0">select category</option>
								   	<?php foreach($kategori as $data_kategori){?>
								   	<option value="<?php echo $data_kategori->id_kategori;?>"><?php echo $data_kategori->kategori;?></option>
								   	<?php } ?>
								   </select>
								</div>
								<div class="form-group">
				    			   <label>Tags</label>
								  <select name="text_tags[]" data-placeholder="Select some Tags" class="form-control chosen-select" multiple tabindex="8">
								  	<?php foreach($tag as $data_tag){?>
								  	<option value="<?php echo $data_tag->id_artikel_tag?>"><?php echo $data_tag->tag_name; ?></option>
								  	<?php } ?>
								  </select>
								</div>
								<div class="form-group">
									<label>Keyword</label>
									<textarea name="text_keyword" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea name="text_description" class="form-control" rows="4"></textarea>
								</div>
								<div class="form-group">
									<label>Publish Date</label>
									<input type="text" name="text_date" class="form-control" value="<?php echo date('Y-m-d : H:i:s')?>"> 
									<input type="hidden" name="text_istrash" value="1">
									<input type="hidden" name="text_idusers" value="<?php echo $this->session->userdata('id_users')?>">
								</div>
								<div class="form-group">
									<label>Featured</label></br>
									<div class="radio-inline">
									  <label>
									    <input type="radio" name="text_featured" id="" value="1">
									    <label class="label label-success"> Yes </label>
									  </label>
									</div>
									<div class="radio-inline">
									  <label>
									    <input type="radio" name="text_featured" id="" value="0">
									    <label class="label label-danger"> No</label>
									  </label>
									</div>
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="radio">
									  <label>
									    <input type="radio" name="text_status" id="" value="1">
									    <label class="label label-success"> Active </label>
									  </label>
									</div>
									<div class="radio">
									  <label>
									    <input type="radio" name="text_status" id="" value="0">
									    <label class="label label-danger"> Non Active</label>
									  </label>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" value="SUBMIT" name="btn-add" class="btn btn-primary">
								</div>
							</div>
						</form>
		    		</div>
		    		<div class="col-md-12">
							

							<!-- Modal -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Style for posting script</h4>
						      </div>
						      <div class="modal-body">
							      	<div class="bs-callout bs-callout-danger">
								    	<pre class=" language-markup"><code class=" language-markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>pre</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>code</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>language-css<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>p { color: red }<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>code</span><span class="token punctuation">&gt;</span></span><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;/</span>pre</span><span class="token punctuation">&gt;</span></span></code></pre>
									</div>
						      </div>
						    </div>
						  </div>
						</div>
						<!-- end modal-->
					</div>
		    	</div>
	    	</div>
	    </div>
	</body>


	