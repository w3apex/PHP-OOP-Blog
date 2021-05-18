<?php include('inc/_header.php');?>
<div class="page-body">
    <!-- LEFT SIDEBAR -->
    <!-- ========================================================= -->
    <?php include('inc/_sidebar.php');?>
    <!-- CONTENT -->
    <!-- ========================================================= -->
    <div class="content">
        <!-- content HEADER -->
        <!-- ========================================================= -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                </ul>
            </div>
        </div>

        <div class="row animated fadeInUp">

            <div class="col-md-12">
            	<?php
            		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            			$name = $_POST['name'];

            			$query = "INSERT INTO category(name) VALUES('$name')";
            			$catInsert = $db->insert($query);

            			if ($catInsert) {
            				echo "Category inserted succefully.";
            			} else {
            				echo "Category not inserted !!";
            			}
            			

            		}
            	?>
            	<!-- <div class="row header-title">
                    <div class="col-6">
                        <h4 class="">Add New Category</h4>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-success text-white pull-right" href="">All Category</a>
                    </div>
                </div> -->
                    <h4 class="section-subtitle">Add New Category</h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="POST" class="form-horizontal">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
<?php include('inc/_footer.php');?>  


