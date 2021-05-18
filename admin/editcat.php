<?php include('inc/_header.php');?>
<?php
    if (!isset($_GET['editid']) || $_GET['editid']== NULL) {
        header("Location:catlist.php");
    } 
    else {
        $id = $_GET['editid'];
    }
?>
<div class="page-body">
    <!-- LEFT SIDEBAR -->
    <?php include('inc/_sidebar.php');?>
    <!-- CONTENT -->
    <div class="content">
        <!-- content HEADER -->
        <div class="content-header">
            <!-- leftside content header -->
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                    <li><a href="javascript:avoid(0)">Category</a></li>
                    <li><a href="javascript:avoid(0)">Edit Category</a></li>
                </ul>

            </div>
        </div>

        <div class="row animated fadeInUp">
            <!-- For messaging -->
        	<div class="row">
             <div class="col-md-8 col-md-offset-2">
                 <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];

                        $query = "UPDATE category SET name = '$name' WHERE id = '$id'";

                        $catInsert = $db->update($query);

                        if ($catInsert) {
                            echo "<span style='color:green;font-size:18px;'>Category updated succefully.</span>";
                        } 
                        else {
                            echo "<span style='color:red;font-size:18px;'>Category not updated !!</span>";
                        }
                    }
                ?>
             </div>   
            </div>
            <!-- For messaging./ -->
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <div class="panel b-primary bt-md">
                    <div class="panel-content">

                        <div class="row">
                            
                            <div class="col-xs-6">
                                <h4>Edit Category</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="catlist.php" class="btn btn-primary">All Categories</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $query = "SELECT * FROM category WHERE id = '$id'";
                                    $cats = $db->select($query);

                                    if ($cats) {
                                        $result = $cats->fetch_assoc();
                                ?>
                                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['name'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary" name="catSubmit">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('inc/_footer.php');?>  


