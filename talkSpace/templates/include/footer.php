  </div>
      </div>  

        </div>
         <div class="col-md-4">
         <div class="block">
          <h3>Login Form</h3>
          <?php if(is_loggin()): ?>
            <div class="userData">
              Welcome, <?php echo getUser()['name']; ?>
            </div>
            <br>
            <form action="logout.php" method="post" role="form">
               <button type="submit" name="logout" class="btn btn-primary">LogOut</button>
              
            </form>
          <?php else : ?>
            <form method="post" action="login.php" role="form">
                <div class="form-group">
                  <label>Username</label>
                  <input type="username" class="form-control" name="username"  placeholder="username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
                <a href="register.php" class="btn btn-default">Create Acount</a>
            </form>
          <?php endif; ?>
            </div>
            <div class="block">
             <h3>Category</h3>
             <ul class="list-group">
                <a href="index.php" class="list-group-item <?php echo is_active(null); ?>">All Topics
                <span class="badge pull-right"><?php echo $totaltopic; ?></span></a>
                <?php foreach(getAllCategory() as $categories) : ?>
                  <a href="topics.php?category=<?php echo $categories->id;?>" 
                  class="list-group-item <?php echo is_active($categories->id); ?>"><?php echo $categories->cat_name; ?>
                <span class="badge pull-right"></span></a>
                
                <?php endforeach; ?>
              </ul>
            </div>
         </div>     
      </div>
    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.js"></script>
    </body>
</html>
