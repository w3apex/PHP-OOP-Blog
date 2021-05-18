<?php include('inc/_header.php');?>
<?php 
    include("../lib/File.php"); 
    $fileObj = new File();
?>

<?php
    if (!isset($_GET['editid']) || $_GET['editid'] == NULL) {
        header("Location:postlist.php"); //redirect
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
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Edit Post</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="postlist.php" class="btn btn-primary">All Post</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $query = "SELECT * FROM posts WHERE id = '$id'";
                                    $post = $db->select($query);

                                    if ($post) {
                                        $result = $post->fetch_assoc();
                                ?>
                                <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="title" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" id="title" value="<?php echo $result['title'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="cat" class="col-sm-2 control-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="cat" id="cat">
                                                <option>Select Category</option>
                                                <?php
                                                    $sql = "SELECT * FROM category";
                                                    $cats = $db->select($sql);

                                                    if ($cats) {
                                                        while ( $catsResult = $cats->fetch_assoc()) {
                                                ?>
                                                <option <?php echo ($result['cat'] == $catsResult['id']) ? "selected" : 0;?> value="<?php echo $catsResult['id']; ?>"><?php echo $catsResult['name'];?></option>
                                                <?php } } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10">
                                            <img src="<?php echo $result['image'];?>" width="80" height="40">
                                            <input type="file" class="form-control" name="image" id="image">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content" class="col-sm-2 control-label">Content</label>
                                        <div class="col-sm-10">
                                            <textarea name="content" id="content" class="form-control">
                                                <?php echo $result['content'];?>
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="tag" class="col-sm-2 control-label">Tags</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tag" id="tag" value="<?php echo $result['tag'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="author" class="col-sm-2 control-label">Author</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="author" id="author" value="<?php echo $result['author'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary" name="catSubmit">Update</button>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                            <?php
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                                    if (!empty($_POST['cat']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tag']) && !empty($_POST['author'])) {
                                        
                                        $cat     = $_POST['cat'];
                                        $title   = $_POST['title'];
                                        $content = $_POST['content'];
                                        $tag     = $_POST['tag'];
                                        $author  = $_POST['author'];

                                        if (!empty($_FILES['image']['name'])) {
                                            $image = $fileObj->uploadFile($_FILES['image']);
                                            if ($image == true) {
                                                $file_tmp = $_FILES['image']['tmp_name'];
                                                $file_path = "uploads/";
                                                $upload_img = $file_path.$image;

                                                
                                                unlink($result['image']);

                                                move_uploaded_file($file_tmp, $upload_img);
                                                $query = "UPDATE posts SET
                                                        cat     = '$cat',
                                                        title   = '$title',
                                                        image   = '$upload_img',
                                                        content = '$content',
                                                        tag     = '$tag',
                                                        author  = '$author' WHERE id = '$id'";         
                                                $updatePost = $db->insert($query);

                                                if ($updatePost) {
                                                    echo "<span style='color:green;font-size:18px;'>Post updated succefully.</span>";
                                                } 
                                                else {
                                                    echo "<span style='color:red;font-size:18px;'>Post not updated !!</span>";
                                                }
                                            }
                                        } 
                                        else {
                                            $query = "UPDATE posts SET
                                                    cat     = '$cat',
                                                    title   = '$title',
                                                    content = '$content',
                                                    tag     = '$tag',
                                                    author  = '$author' WHERE id = '$id'";         
                                            $updatePost = $db->insert($query);

                                            if ($updatePost) {
                                                echo "<span style='color:green;font-size:18px;'>Post updated succefully.</span>";
                                            } 
                                            else {
                                                echo "<span style='color:red;font-size:18px;'>Post not updated !!</span>";
                                            }
                                        }   
                                    }
                                    else {
                                        echo "<span style='color:red;font-size:18px;'>Field must not be empty !!</span>";
                                    } 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('inc/_footer.php');?>  


