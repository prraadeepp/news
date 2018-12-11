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
            
            $data=getDataById(' news ',$id);
            //debugger($data,true);
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
        <h1 class="page-header text-success"><?php echo ucfirst($act);?> News</h1>      
<form action="news.php" method="post" enctype="multipart/form-data" >
    <div class="form-group">
        <label class="text-info">Title</label>
        <input type="text" id="news_title" class="form-control" name="title" id="title" placeholder="Enter title" required value="<?php echo(isset($data['title'])?$data['title']:""); ?>" >
    </div>

    <?php 
      $data1=array();
      $data1 = getAllCategory();
     ?>
    <div class="form-group">
        <label class="text-info">Category name</label>
        <select class="form-control" id="categoryid" name="category_id">
          <option value="" selected disabled >--Select news Category--</option>
          <?php foreach ($data1 as $value) {
            # code...
          ?>
          <option value="<?php echo(isset($value['id'])?$value['id']:'') ?>" <?php echo(($act=="edit") && (($data['category_id'] == $value['id']))?'selected':' '); ?> name="<?php echo $value['id']  ?>"> <?php echo $value['title']; ?></option>
        
        <?php }  ?>
        </select>
    </div>
    <div class="form-group">
        <label class="text-danger">News Banner text</label>
       <textarea rows="6" id="banner_text" name="banner" class="form-control" style="resize:null"><?php echo(isset($data['banner'])?$data['banner']:"");?></textarea>
    </div>
    <div class="form-group">
        <label class="text-warning">News content</label>
       <textarea rows="6" id ="description" name="description" class="form-control" style="resize:null"><?php echo(isset($data['description'])?$data['description']:"");?></textarea>
    </div>
    <div class="form-group">
        <label class="text-info" >Status</label>
       <select class="form-control" name="status" required >
        <option value="1" <?php echo((isset($data['status']) && ($data['status']==1))?'selected': ' ');?>>Active</option>
        <option value="0" <?php echo(isset($data['status']) && ($data['status']==0)?'selected':' ');?>>Inactive</option>
       </select> 
    </div>
    <div class="form-group">
        <label class="text-info" >Is trending?</label>
       <select class="form-control" name="is_trending" required >
        <option value="1" <?php echo((isset($data['is_trending']) && ($data['is_trending']==1))?'selected': ' ');?>>Yes</option>
        <option value="0" <?php echo(isset($data['is_trending']) && ($data['is_trending']==0)?'selected':' ');?>>No</option>
       </select> 
    </div>
    <div class="form-group">
        <label class="text-info" >Is featured?</label>
       <select class="form-control" name="is_featured" required >
        <option value="1" <?php echo((isset($data['is_featured']) && ($data['is_featured']==1))?'selected': ' ');?>>Yes</option>
        <option value="0" <?php echo(isset($data['is_featured']) && ($data['is_featured']==0)?'selected':' ');?>>No</option>
       </select> 
    </div>
    <div class="form-group">
        <label class="text-success">Enter images</label>
        <input type= "file" name="images[]" multiple min="1" required class="form-control">

    </div>

    <div class="form-group">
        <input type="hidden" name="news_id" value="<?php echo(isset($data['id'])?$data['id']:"");?>">
        <input type="hidden" name="added_by" value="<?php echo(isset($data['added_by'])?$data['added_by']:"");?>">
        <input type="submit" name="submit" class="btn btn-success" class="form-control" >
    </div>

</form> 
</div>
<?php 
include "footer.php";
 ?>

<script type="text/javascript">
tinymce.init({
    selector: '#description',
    height:'300',
    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
  image_advtab: true,
});
</script>

