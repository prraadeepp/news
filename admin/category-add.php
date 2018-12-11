<?php 
   include 'header.php';
?>
<body>
<?php 
   include 'navigator.php';
    
?>
<div class="container">
    <div class="row" >
        <div class="col-lg-8">
          <?php 
          $act='add';
          if(isset($_GET['id']) && isset($_GET['act'])){
            $id=sanitize($_GET['id']);
            $act='edit';
          if(($_GET['id'])!='' && ($_GET['act']!=""))
          { 
            if($_GET['act']==substr(md5("edit-".$id),07,17)){
            
            $data=getDataById(' categories ' , $id);
            if(!$data)
            {
             $_SESSION['error']="sorry, the data wasnot found";
            @header("location:categorylist.php"); 
            }
          }else {
            $_SESSION['error']="sorry, invalid url";
            @header("location:categorylist.php");
          }
          } }?>
        <h1 class="page-header text-success"><?php echo ucfirst($act);?> Category</h1>      
<form action="category.php" method="post" >
    <div class="form-group">
        <label class="text-info">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" required value="<?php echo(isset($data['title'])?$data['title']:""); ?>" >
    </div>
    <div class="form-group">
        <label class="text-danger">Description</label>
       <textarea rows="6" name="description" class="form-control" style="resize:null"><?php echo(isset($data['description'])?$data['description']:"");?></textarea>
    </div>
    <div class="form-group">
        <label class="text-warning">Summary</label>
       <textarea rows="6" name="summary" class="form-control" style="resize:null"><?php echo(isset($data['summary'])?$data['summary']:"");?></textarea>
    </div>
    <div class="form-group">
        <label class="text-info" >Status</label>
       <select class="form-control" name="photo" required >
        <option value="1" <?php echo((isset($data['status']) && ($data['status']==1))?'selected': ' ');?>>Active</option>
        <option value="0" <?php echo(isset($data['status']) && ($data['status']==0)?'selected':' ');?>>Inactive</option>
       </select> 
    </div>
    <div class="form-group">
        <input type="hidden" name="category_id" value="<?php echo(isset($data['id'])?$data['id']:"");?>">
        <input type="submit" name="submit" class="btn btn-success" class="form-control" >
    </div>

</form> 
</div>
<?php
include 'footer.php';   
?>