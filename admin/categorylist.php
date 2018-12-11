<?php
include 'header.php';
if(!(isset($_SESSION['success'])) && $_SESSION['success']=="")
{
$_SESSION['error']="you need to log in first";
        header("location:login.php");
        exit;
}
else {  ?> 

<body>           
 <div id="wrapper">
<?php
include 'navigator.php';

?></div>
        <div id="page-wrapper">

            <div class="container-fluid">
                        <?php
                        if(isset($_SESSION['success']) && $_SESSION['success']!=""){?>
                        <div class="alert alert-success">
                        <?php
                            echo $_SESSION['success'];
                            ?></div>
                           <?php }
                           $_SESSION['success']="";
                            if(isset($_SESSION['error']) && $_SESSION['error']!=""){?>
                            <div class="alert alert-danger">
                        <?php
                                echo $_SESSION['error'];?></div>
                                <?php }$_SESSION['error']="";?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                          List category <small></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th>S.N.</th>
                                <th>Title</th>
                                <th>Summary</th>
                                <th style="width: 30%">Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $data=getAllCategory();
                                if($data)
                                {
                                    foreach ($data as $category) 
                                    { ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $category['title']?></td>
                                    <td><?php echo $category['summary']?></td>
                                    <td><?php echo $category['description']?></td>
                                    <td><?php echo status($category['status'])?></td>
                                    <td><a href="#" class="btn btn-info" ><i class="fa fa-w fa-eye"></i></a>
                                        <?php $edit_url= "category-add.php?id=".$category['id']."&act=".substr(md5("edit-".$category['id']),07,17);?>
                                        <a href="<?php echo $edit_url; ?>" class="btn btn-success" ><i class="fa fa-w fa-pencil"></i></a>
                                        <?php $url= "category.php?id=".$category['id']."&act=".substr(md5("delete-".$category['id']),07,17);?>
                                        <a href="<?php echo $url;?>" onclick="return confirm('Are you sure you want to delete this category?');" class="btn btn-danger"><i class="fa fa-w fa-trash"></i></a>
                                    </td>
                                </tr>
                                    <?php 
                                    $i++; 
                                }
                                }?>

                            </tbody>    

                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php 
include 'footer.php';}?>