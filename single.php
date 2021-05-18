<?php include("inc/_header.php");?>
<?php
  if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    header("Location:index.php");
  }
  else {
    $id = $_GET['id'];
  }
?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li>Blog Single</li>
        </ol>
        <h2>Blog Single</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-8 entries">
            <?php
              $query = "SELECT * FROM posts WHERE id = '$id'";
              $post = $db->select($query);

              if ($post) {
                while ( $result = $post->fetch_assoc()) {
            ?>
            <article class="entry entry-single">
              <div class="entry-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="#"><?php echo $result['title'];?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="single.php"><?php echo $result['author'];?></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="single.php"><time datetime="2020-01-01"><?php echo $fm->formatDate($result['date']);?></time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="single.php">12 Comments</a></li>
                </ul>
              </div>

              <div class="entry-content">
                <?php echo $result['content'];?>
              </div>

              <div class="entry-footer clearfix">
                <div class="float-left">
                  <i class="icofont-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="icofont-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div>

                <div class="float-right share">
                  <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                  <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                  <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                </div>

              </div>
            </article><!-- End blog entry -->
          <?php   } } ?>
          </div><!-- End blog entries list -->

         <?php include("inc/_sidebar.php");?>
        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

<?php include("inc/_footer.php");?>