<?php  include 'include/header.php'; ?>


<ul class="topics">
	<li class="topic">
		<div class="row">
			<div class="col-md-2 topic-img">
				<img src="images/avatar/<?php echo $topic->avatar;?>" alt="">
				<ul>
					<li><strong><?php echo $topic->name;?></strong></li>
					<li><?php echo userPostCount($topic->user_id);?> Post</li>
					<li><a href="topics.php?user=<?php echo $topic->user_id; ?>">Profile</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div>
					<div class="topic-info">
						<p><?php echo $topic->body;?></p>
					</div>
				</div>
			</div>
		</div>
	</li>


	<?php foreach ($replies as $reply) : ?>
		<!--<p>imad</p>-->
	<li class="topic">
		<div class="row">
			<div class="col-md-2 topic-img">
				<img src="images/avatar/<?php echo $reply->avatar;?>" alt="">
				<ul>
					<li><strong><?php echo $reply->name;?></strong></li>
					<li><?php echo userPostCount($reply->user_id);?> Post</li>
					<li><a href="topics.php?user=<?php echo $reply->user_id; ?>">Profile</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<div>
					<div class="topic-info">
						<p><?php echo $reply->body;?></p>
					</div>
				</div>
			</div>
		</div>
	</li>
	<?php  endforeach; ?>
</ul>	

	<h2>Reply To This Topic</h2>
	<?php if(is_loggin()) : ?>
	<form role="form" action="topic.php?id=<?php echo $topic->id; ?>" method="post">
          <div class="form-group">
              <textarea name="body" class="form-control"></textarea>
           </div> 
           <input type="submit" name="reply" value="Reply" class="btn btn-success">
     </form>
 <?php else : ?>
 	<p>Please Login To Reply</p>
<?php  endif; ?>



  <?php include "include/footer.php";