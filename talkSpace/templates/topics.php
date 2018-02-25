<?php  include 'include/header.php'; ?>

          <ul id="topics">
        <?php if($topics) { ?>
        
           <?php foreach($topics as $topic) { 

            ?>

                  <li class="topic">
                    <div class="row">
                      <div class="col-md-2">
                        <img src="images/avatar/<?php echo $topic->avatar; ?>" alt="">
                      </div>
                      <div class="col-md-10">
                        <div>
                           <h2><a href="topics.php?id=<?php echo $topic->id; ?>"><?php echo $topic->title; ?></a></h2>
                           <div class="topic-info">
                              <a href="topics.php?category=<?php echo urlFormat($topic->category_id); ?>"><?php echo $topic->cat_name; ?></a> >> 
                              <a href="topics.php?user=<?php echo urlFormat($topic->user_id); ?>"><?php echo $topic->name; ?></a> >> <?php echo formatDate($topic->time_add); ?>
                              <span class="badge pull-right"><?php echo replyCount($topic->id); ?></span>
                           </div>
                        </div>
                      </div>
                    </div>
                       </li>           <hr>
           <?php } ?>
            </ul>
         <?php }else { ?>
          <p>No Topic To Show</p>
        <?php } ?>  
               
             <h3>Form Statistics</h3>
               <ul>
                 <li>Total Number Of Users :<strong><?php echo $totalUser; ?></strong></li>
                 <li>Total Number Of Topics :<strong><?php echo $totaltopic; ?></strong></li>
                 <li>Total Number Of Categories :<strong><?php echo $totalCategory; ?></strong></li>
               </ul>
           
   <?php include "include/footer.php"; 
   ?>