<?php include('inc/_header.php');?>
<?php
    include('../lib/Format.php');
    include('../lib/Post.php');
    $pst = new Post();
    $fm  = new Format(); 
?>
<?php
    if (isset($_GET['delid'])) {
        $id = $_GET['delid'];
        
    	//For deleting from directory
    	/*$sql = "SELECT * FROM posts WHERE id = '$id'";
    	$getData = $db->select($sql);
    	if ($getData) {
	    	while ( $delImg = $getData->fetch_assoc()) {
	    		$delDir = $delImg['image'];
	    		unlink($delDir);
	    	}
	    } */

	    //For deleting from database
	    /*$sql = "DELETE FROM posts WHERE id = '$id'";
	    $delPost = $db->delete($sql);

	    if ($delPost) {
	    	echo "<span style='color:green;font-size:18px;'>Post deleted succefully.</span>";
	    } 
	    else {
	    	echo "<span style='color:red;font-size:18px;'>Post not deleted !!</span>";
	    }*/
	    
 	}
?>
<div class="page-body">
    <!-- LEFT SIDEBAR -->
    <?php include('inc/_sidebar.php');?>
    <!-- CONTENT -->
    <div class="content">
		<div class="content-header">
		    <!-- leftside content header -->
		    <div class="leftside-content-header">
		        <ul class="breadcrumbs">
		            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
		            <li><a href="javascript:avoid(0)">Post</a></li>
		            <li><a href="javascript:avoid(0)">Manage Post</a></li>
		        </ul>
		    </div>
		</div>
		<div class="row animated fadeInUp">
	        <div class="col-md-12">
	            <div class="panel b-primary bt-md">
	                <div class="panel-content">
	                    <div class="row">
	                        <div class="col-xs-6">
	                            <h4>Manage Post</h4>
	                        </div>
	                        <div class="col-xs-6 text-right">
	                            <a href="addpost.php" class="btn btn-primary">Add Post</a>
	                        </div>
	                    </div>
	                    <div class="table-responsive">
	                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
	                            <thead>
		                            <tr>
		                                <th width="2%">SL.</th>
		                                <th width="15%">Title</th>
		                                <th width="10%">Category</th>
		                                <th width="25%">Content</th>
		                                <th width="10%">Image</th>
		                                <th width="10%">Tags</th>
		                                <th width="8%">Author</th>
		                                <th width="10%">Date</th>
		                                <th width="10%">Action</th>
		                            </tr>
	                            </thead>
	                            <tbody>
	                            	<?php
										
	                            		$getPosts = $pst->show();

	                            		if ($getPosts) {
	                            			$i = 0;
	                            			while ( $result = $getPosts->fetch_assoc()) {
	                            				$i++;
	                            	?>
	                            	<tr>
	                            		<td><?php echo $i; ?></td>
	                            		<td><?php echo $fm->readMore($result['title'],40); ?></td>
	                            		<td><?php echo $result['name']; ?></td>
	                            		<td><?php echo $fm->readMore($result['content'],80); ?></td>
	                            		<td>
	                            			<img src="<?php echo $result['image']; ?>" width="90" height="40">
	                            		</td>
	                            		<td><?php echo $result['tags']; ?></td>
	                            		<td><?php echo $result['author']; ?></td>
	                            		<td><?php echo $fm->formatDate($result['date']); ?></td>
	                            		<td>
	                            			<a href="editpost.php?editid=<?php echo $result['id']; ?>">Edit</a> ||
	                            			<a onclick="return confirm('Are you sure to delete?');" href="?delid=<?php echo $result['id']; ?>">Delete</a>
	                            		</td>
	                            	</tr>
	                            	<?php	
	                            			}
	                            		}
	                            	?>	
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
<?php include('inc/_footer.php');?>  