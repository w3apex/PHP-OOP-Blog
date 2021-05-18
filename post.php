<?php include("inc/_header.php");?>

<?php
  if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
    header("Location:index.php");
  }
  else {
    $id = $_GET['catId'];
  }
?>

<main id="main">
  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-8 entries">
          <?php
            //Query with post
            //$query = "SELECT * FROM posts";
            $query = "SELECT * FROM posts WHERE cat = '$id'";
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