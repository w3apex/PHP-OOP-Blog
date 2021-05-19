<?php include('inc/_header.php');?>
<?php
    include('../lib/Slider.php');

    $slider = new Slider();
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $insertSlider = $slider->store($_POST, $_FILES);
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
                    <li><a href="javascript:avoid(0)">Slider</a></li>
                    <li><a href="javascript:avoid(0)">Add Slider</a></li>
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
                    if (isset($insertSlider)) {
                        echo $insertSlider;
                    }
                ?>
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Add New Slider</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a href="postlist.php" class="btn btn-primary">All Slider</a>
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
                                        <label for="sub_title" class="col-sm-2 control-label">Sub Title</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Sub Title">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="image" id="image">
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


