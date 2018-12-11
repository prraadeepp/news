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
                          List News <small></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-stripped">
                            <thead>
                                <th >S.N.</th>
                                <th >Title</th>
                                <th >News Category</th>
                                <th >Banner</th>
                                <th style="width: 20%" >Description</th>
                                <th >Status</th>
                                <th >Image</th>
                                <th style="width: 15%" >Action</th>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $data=getAllNews();
                                //debugger($data,true);
                                if($data)
                                {
                                    foreach ($data as $value=>$news) 
                                    { ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $news['title']?></td>
                                    <?php $category_name = getCategoryTitle($news['category_id']);
                                    //debugger($category_name,true);
                                    $display_image = getNewsImage($news['id']);

                                    //debugger($display_image,true); ?>
                                    <td ><?php echo $category_name[0]['title'];?></td>
                                    <td ><?php echo $news['banner'];?></td>
                                    <td ><?php echo substr($news['description'],0,100);?></td>
                                    <td><?php echo status(($news['status']));?></td>
                                    <td style="background: url(<?php echo UPLOAD_NEWS_IMAGES_URL.$display_image[0]['image_name'];?>); background-size: cover; height:125px; width: 200px;"></td>
                                    <td><a href="#" class="btn btn-info" ><i class="fa fa-w fa-eye"></i></a>
                                        <?php $edit_url= "news-add.php?id=".$news['id']."&act=".substr(md5("edit-".$news['id']),07,17);?>
                                        <a href="<?php echo $edit_url; ?>" class="btn btn-success" ><i class="fa fa-w fa-pencil"></i></a>
                                        <?php $url= "news.php?id=".$news['id']."&act=".substr(md5("delete-".$news['id']),07,17);?>
                                        <a href="<?php echo $url;?>" onclick="return confirm('Are you sure you want to delete this news?');" class="btn btn-danger"><i class="fa fa-w fa-trash"></i></a>
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