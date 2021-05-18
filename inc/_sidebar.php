<div class="col-lg-4">
  <div class="sidebar">
    <h3 class="sidebar-title">Search</h3>
    <div class="sidebar-item search-form">
      <form action="">
        <input type="text">
        <button type="submit"><i class="icofont-search"></i></button>
      </form>
    </div><!-- End sidebar search formn-->

    <h3 class="sidebar-title">Categories</h3>
    <div class="sidebar-item categories">
      <ul>
        <?php
          $query = "SELECT * FROM category";
          $cat = $db->select($query);

          if ($cat) {
              while ($result = $cat->fetch_assoc()) {
        ?>
        <li><a href="post.php?catId=<?php echo $result['id'];?>"><?php echo $result['name'];?> <span>(25)</span></a></li>
        <?php 
              }
            } 
            else {
              echo "Category nai............!!";
            }
          ?>
      </ul>
    </div><!-- End sidebar categories-->

    <h3 class="sidebar-title">Recent Posts</h3>
    <div class="sidebar-item recent-posts">
      <?php
          $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
          $post = $db->select($query);

            if ($post) {
              while ($result = $post->fetch_assoc()) {
          ?>
      <div class="post-item clearfix">
        <img src="assets/img/blog/blog-recent-1.jpg" alt="">
        <h4><a href="single.php?id=<?php echo $result['id'];?>"><?php echo $fm->readMore($result['title'],20);?></a></h4>
        <time datetime="2020-01-01"><?php echo $fm->formatDate($result['date']);?></time>
      </div>
    <?php }?>
    <?php 
      } else {
        echo "Post nai";
      }
    ?>
    </div><!-- End sidebar recent posts-->

    <h3 class="sidebar-title">Tags</h3>
    <div class="sidebar-item tags">
      <ul>
        <li><a href="#">App</a></li>
        <li><a href="#">IT</a></li>
        <li><a href="#">Business</a></li>
        <li><a href="#">Mac</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Office</a></li>
        <li><a href="#">Creative</a></li>
        <li><a href="#">Studio</a></li>
        <li><a href="#">Smart</a></li>
        <li><a href="#">Tips</a></li>
        <li><a href="#">Marketing</a></li>
      </ul>
    </div><!-- End sidebar tags-->
  </div><!-- End sidebar -->
</div><!-- End blog sidebar -->