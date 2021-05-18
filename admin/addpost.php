<?php include('inc/_header.php');?>
<?php
    include('../lib/Category.php');
    include('../lib/Post.php');

    $cat = new Category();
    $pst = new Post();
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insertPost = $pst->store($_POST, $_FILES);
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
                    <li><a href="javascript:avoid(0)">Post</a></li>
                    <li><a href="javascript:avoid(0)">Add Post</a></li>
                </ul>

            </div>
        </div>

        <div class="row animated fadeInUp">
            <!-- For messaging -->
        	<div class="row">
             <div class="col-md-8 col-md-offset-2">
                
             </div>   
            </div>
            <!-- For messaging./ -->
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <?php
                    if (isset($insertPost)) {
                        echo $insertPost;
                    }
                ?>
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Add New Post</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="postlist.php" class="btn btn-primary">All Post</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Post Title">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cat" class="col-sm-2 control-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="cat" id="cat">
                                                <option>Select Category</option>
                                                <?php
                                                    $getCats = $cat->show();

                                                    if ($getCats) {
                                                        while ( $catResult = $getCats->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $catResult['id'];?>"><?php echo $catResult['name'];?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">Content</label>
                                        <div class="col-sm-10">
                                            <textarea name="content" id="content" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tags" class="col-sm-2 control-label">Tags</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tags" id="tags" placeholder="Tags">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="author" class="col-sm-2 control-label">Author</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="author" id="author" placeholder=" Author">
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


