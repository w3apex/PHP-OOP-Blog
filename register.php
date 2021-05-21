<?php include("inc/_header.php");?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Register</li>
        </ol>
        <h2>Register</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-8  offset-md-2 entries">
            <div class="register-form">
              <form action="" method="post">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" placeholder="First Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Last Name">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                  <label for="username">Username</label> 
                    <input type="text" class="form-control" id="username" placeholder="User name">
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="birthDate">Date of Birth</label>
                    <input type="date" name="birthDate" class="form-control" id="birthDate"/>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" name="gender" id="gender">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                  <label for="address">Address</label> 
                    <input type="text" class="form-control" id="address" placeholder="Address">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" placeholder="City">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" id="country" placeholder="Country">
                  </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
              </form>
            </div>
          </div><!-- End blog entries list -->
        </div>
      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

<?php include("inc/_footer.php");?>