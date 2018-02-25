<?php  include 'include/header.php'; ?>

<form method="post" action="create.php" role="form">
	
	<div class="form-group">
		<label>Topic Title:</label>
		<input type="text"  name="title" class="form-control" placeholder="title">
	</div>
	
	<div class="form-group">
		<label>Category:</label>
		<select name="category" class="form-control">
		<?php foreach(getAllCategory() as $categories) : ?>
			<option value="<?php echo $categories->id; ?>"><?php echo $categories->cat_name; ?></option>
		<?php endforeach; ?>
		</select>
	</div>
	
	<div class="form-group">
		<label>Topic Body:</label>
		<textarea  type="text"  name="body" class="form-control" placeholder="text"></textarea> 
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Register</button>
	
</form>





<?php  include 'include/footer.php'; ?>