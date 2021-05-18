<?php //include("config/config.php");?>
<?php //include("lib/Database.php");?>
<?php //include("lib/Format.php");?>
<?php
  //$db = new Database();
  //$fm = new Format();
?>

<?php include("inc/_header.php");?>
<?php include("inc/_slider.php");?>

<main id="main">
  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8 entries">
          <?php
            $limit = 3;

            if (isset($_GET['page'])) {
              $page_number = $_GET['page'];
            }
            else {
              $page_number = 1;
            }
            $offset = ($page_number - 1) * $limit;

            //Query with post
            //$query = "SELECT * FROM posts";
            $query = "SELECT * FROM posts LIMIT $offset, $limit";
            $post = $db->select($query);

            if ($post) {
              while ($result = $post->fetch_assoc()) {
          ?>
          <article class="entry">
            <div class="entry-img">
              <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="single.php"><?php echo $result['title'];?></a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="single.php"><?php echo $result['author'];?></a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> 
                  <a href="single.php">
                    <time datetime="2020-01-01"><?php echo $fm->formatDate($result['date']);?></time>
                  </a>
                </li>
                <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="#">12 Comments</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <?php echo $fm->readMore($result['content']);?>
              <div class="read-more">
                <a href="single.php?id=<?php echo $result['id'];?>">Read More</a>
              </div>
            </div>
          </article><!-- End blog entry -->
          <?php } ?>
          
          <!-- Pagination Start -->
          <?php
            $sql = "SELECT * FROM posts";
            $result = $db->select($sql);

            if (mysqli_num_rows($result)) {
                $total_records = mysqli_num_rows($result);
                $total_pages = ceil($total_records / $limit);

                echo '<div class="blog-pagination">';
                  echo '<ul class="justify-content-center">';
                  // For Prev Page
                    if ($page_number > 1) {
                      echo '<li><a href="index.php?page='.($page_number - 1).'"><i class="icofont-rounded-left"></i></a></li>';
                    }

                    for ($i=1; $i<=$total_pages; $i++) {
                      //For active page
                      if ($page_number == $i) {
                        $active = "active";
                      }
                      else {
                        $active = "";
                      }

                      echo '<li class='.$active.'><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                    }
                    // For Next Page
                    if ($total_pages > $page_number) {
                      echo '<li><a href="index.php?page='.($page_number + 1).'"><i class="icofont-rounded-right"></i></a></li>';
                    }

                  echo '</ul>';
                echo '</div>';
            }
          ?>
          <!-- Pagination End -->
          <?php 
            } else {
              echo "Post nai............!!";
            }
          ?>

          
            <!-- <ul class="justify-content-center">
              <li class="disabled"><i class="icofont-rounded-left"></i></li>
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
            </ul> -->
 
        </div><!-- End blog entries list -->
        <?php include("inc/_sidebar.php");?>
      </div>
    </div>
  </section><!-- End Blog Section -->
</main><!-- End #main -->
<?php include("inc/_footer.php");?>