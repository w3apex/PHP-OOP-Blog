<?php include('inc/_header.php');?>
<?php
    if (!isset($_GET['delid']) || $_GET['delid']== NULL) {
        header("Location:catlist.php");
    } 
    else {
        $id = $_GET['delid'];
    }

    $sql = "DELETE FROM category WHERE id = '$id'";
    $del = $db->delete($sql);
    if ($del) {
        echo "<span style='color:green;font-size:18px;'>Category deleted succefully.</span>";
    } 
    else {
        echo "<span style='color:red;font-size:18px;'>Category not deleted !!</span>";
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
		            <li><a href="javascript:avoid(0)">Category</a></li>
		            <li><a href="javascript:avoid(0)">Manage Category</a></li>
		        </ul>
		    </div>
		</div>
		<div class="row animated fadeInUp">
	        <div class="col-sm-12 col-md-8 col-md-offset-2">
	            <div class="panel b-primary bt-md">
	                <div class="panel-content">
	                    <div class="row">
	                        <div class="col-xs-6">
	                            <h4>Manage Category</h4>
	                        </div>
	                        <div class="col-xs-6 text-right">
	                            <a href="addcat.php" class="btn btn-primary">Add Category</a>
	                        </div>
	                    </div>
	                    <div class="table-responsive">
	                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
	                            <thead>
		                            <tr>
		                                <th>SL.</th>
		                                <th>Category Name</th>
		                                <th>Action</th>
		                            </tr>
	                            </thead>
	                            <tbody>
	                            	<?php
	                            		$query = "SELECT * FROM category ORDER BY id";
	                            		$cats = $db->select($query);

	                            		if ($cats) {
	                            			$i = 0;
	                            			while ( $result = $cats->fetch_assoc()) {
	                            				$i++;
	                            	?>
	                            	<tr>
	                            		<td><?php echo $i; ?></td>
	                            		<td><?php echo $result['name']; ?></td>
	                            		<td>
	                            			<a href="editcat.php?editid=<?php echo $result['id']; ?>">Edit</a> ||
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