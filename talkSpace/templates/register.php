	<?php  include 'include/header.php'; ?>
	<form action="register.php" method="post" enctype="multipart/form-data">

		<div class="form-group">
			<label>Name:</label>
			<input type="text"  name="name" class="form-control" placeholder="Name">
		</div>
		<div class="form-group">
			<label>Email:</label>
			<input type="email"  name="email" class="form-control" placeholder="email">
		</div>
		<div class="form-group">
			<label>Username:</label>
			<input type="text"  name="username" class="form-control" placeholder="Username">
		</div>
		<div class="form-group">
			<label>Password:</label>
			<input type="password"  name="password" class="form-control" placeholder="password">
		</div>
		<div class="form-group">
			<label>Confirm Password:</label>
			<input type="password"  name="password2" class="form-control" placeholder="confirm password">
		</div>
		
		<div class="form-group">
			<label>Avatar:</label>
			<input type="file"  name="avatar" class="form-control" >
		</div>
		<div class="form-group">
			<label>About Me:</label>
			<textarea  name="about" class="form-control" placeholder="text"></textarea> 
		</div>


		<button type="submit" name="register" class="btn btn-primary">Register</button>

	</form>
	<?php  include 'include/footer.php'; ?>