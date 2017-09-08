	    <div class="container">
	    	<div class="row">
	    		<div class="dashboard">
	    			<ol class="breadcrumb">
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">User Management</li>
					</ol>
					<div class="col-md-2">
						<a href="<?php echo base_url()?>usermanagement/add" class="btn btn-primary" style="width:100%;"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
					</div>
					<div class="col-md-10">
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
		    							<th>Username</th>
		    							<th>Nama</th>
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
		    							<td><?php echo $row->username; ?></td>
		    							<td><?php echo $row->nama;?></td>
		    							<td>
		    								<a href="<?php echo base_url()?>usermanagement/edit/<?php echo $row->id_users; ?>" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
		    								<a href="<?php echo base_url()?>usermanagement/delete/<?php echo $row->id_users;?>" onclick="return confirm('Apakah anda yakin ?');" title="Delete"><span class="glyphicon glyphicon-remove"></span></a>
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
	