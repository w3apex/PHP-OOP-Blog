<?php include("inc/_header.php");?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Login</li>
        </ol>
        <h2>Login</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-8  offset-md-2 entries">
            <div class="register-form">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
                        $userlogin = $usr->userLogin($_POST); //$_POST['username']
                    }
                ?>
                <?php
                    if (isset($userlogin)) {
                        echo $userlogin;
                    }
                ?>
                <form action="" method="POST">
                    <div class="form-group">
                      <label for="username">Username</label> 
                        <input type="text" class="form-control" name="username" id="username" placeholder="User name">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
            </div>
          </div><!-- End blog entries list -->
        </div>
      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

<?php include("inc/_footer.php");?>