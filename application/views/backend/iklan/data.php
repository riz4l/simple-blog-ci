	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<ol class="breadcrumb">
					  <li><a href="#">Dashboard</a></li>
					  <li class="active"><a href="<?php echo base_url()?>iklan">Iklan</a></li>
					</ol>
					<div class="col-md-2">
						<a href="<?php echo base_url()?>iklan/add" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
					</div>
					<div class="col-md-10">
						<form method="post" name="form1" action="<?php echo base_url()?>iklan/search" enctype="multipart/form-data">
						    <div class="input-group">
						      <input type="text" class="form-control" placeholder="Search" name="keyword">
						      <span class="input-group-btn">
						        <input type="submit" name="btn_search" value="Go" class="btn btn-default">
						      </span>
						    </div><!-- /input-group -->
						</form>
					</div><!-- /.col-lg-6 -->

		    		<div class="col-md-12">
					</br>
					<?php
						if($this->session->flashdata('delete_sukses')){
							echo '<div class="alert alert-success"><a class="close" data-dismiss="alert">&times;</a>Data berhasil dihapus </div>';
						}
					?>
		    			<div class="table-responsive">
		    				<table class="table">
		    					<thead>
		    						<tr>
		    							<th>No</th>
		    							<th>Image</th>
		    							<th>Iklan</th>
		    							<th>Date</th>
		    							<th>Position</th>
		    							<th>Status</th>
		    							<th width="10%">Action</th>
		    						</tr>
		    					</thead>
		    					<tbody>
		    						<?php 
		    						if($offset==""){$no = 0;}else{$no=$offset;};
		    						foreach($query as $row)
		    						{
		    							$no++;
		    							?>
		    						<tr>
		    							<td><?php echo $no;?></td>
		    							<td><img src="<?php echo base_url()?>upload/iklan/<?php echo $row->image;?>" width="50" height="50"></td>
		    							<td><?php echo $row->iklan_title; ?></td>
		    							<td><label class="label label-success"><?php echo $row->iklan_publish;?></label> - <label class="label label-danger"><?php echo $row->iklan_endpublish;?></label></td>
		    							<td><?php echo $row->posisi_iklan;?></td>
		    							<td>
		    							<?php 
		    								if($row->iklan_status=="1"){
		    								echo '<label class="label label-primary">Active</label>';
		    							}else{
		    								echo '<label class="label label-danger">Non Active</label>';
		    							}
		    							?>
		    							</td>
		    							<td>
		    								<a href="<?php echo base_url()?>iklan/edit/<?php echo $row->id_iklan; ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
		    								<a href="<?php echo base_url()?>iklan/delete/<?php echo $row->id_iklan;?>" onclick="return confirm('Apakah anda yakin ?');" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
		    							</td>
		    						</tr>
		    						<?php } ?>
		    					</tbody>
		    				</table>
						</div>
					<?php echo $this->pagination->create_links();?>
		    		</div>
		    		
		    	</div>
	    	</div>
	    </div>
	</body>
	