<html>
	<header>
		<title>Login CMS Blog</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
	</header>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="login-form">
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title">Login CMS Blog</h3>
						  </div>
						  <div class="panel-body">
						    <form name="form1" action="<?php echo base_url()?>panel/login" method="post">
						    	<div class="form-group">
						    		<label>Username</label>
						    		<input type="text" name="username" class="form-control" placeholder="Username">
						    		<p class="help-block"><?php echo form_error('username')?></p>
						    	</div>
						    	<div class="form-group">
						    		<label>Password</label>
						    		<input type="password" name="password" class="form-control" placeholder="Password">
						    		<p class="help-block"><?php echo form_error('password')?></p>
						    	</div>
						    	<div class="form-group">
						    		<button name="btnlogin" class="btn btn-default">Login</button> 
						    	</div>
						    </form>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<footer>
		<script type="text/javascript" href="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" href="<?php echo base_url()?>assets/js/jquery.js"></script>
	</footer>

</html>