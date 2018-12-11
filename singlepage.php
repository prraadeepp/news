<?php include "include/header.php"; ?>
		<!---start-wrap---->
<?php include "include/top-nav.php"; ?>
		<?php 
		//debugger($_GET,true);
		if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['act']) && !empty($_GET['act']))
		{
			$read_id=sanitize($_GET['id']);
			if($_GET['act'] != substr(("'".md5("news-reader-".$read_id)."'"),9,12))
			{
				$_SESSION['error'] = "Sorry! This is not a valid link of any news items.";
				@header("location:index.php");
				exit;
			} 
		}
		else
		{
			$_SESSION['error'] = "Sorry! You havenot selected any news to read!";
			@header("location:index.php");
			exit;
		}
		 ?>
		<div class="main-content">
			<div class="wrap">
			<div class="left-sidebar">
			</div>
			<div class="right-content">
				<?php 
				$display_news = getAllNews(" WHERE STATUS = 1 AND id=".$read_id);
				$display_images = getNewsImage($display_news[0]['id']);
				//debugger($display_images,true);
				//debugger($display_news,true);
				?>

				<div class="inner-page">
				<div class="title">
					<h3 style = "font-size: 3em;"><?php echo $display_news[0]['title']; ?></h3>
					<ul>
						<li><p>Added on <?php echo $display_news[0]["added_date"] ?></a> by <a href="#">Lorem</p></li>
						<li><a href="#"><img src="<?php echo IMAGES_URL."sub.png";?>" title="subscribe">Subscribe this author</a></li>
					</ul>
				</div>
				<div class="video-inner">
					<img src="<?php echo UPLOAD_NEWS_IMAGES_URL.$display_images[0]['image_name'];?>" width="100%" height="400px" ></img> 
				</div>
				<div class="clear"> </div>
				<div class="video-details">
					<ul>
						<li style="text-align: justify; text-align: justify; font-size: 1.25em;";><?php echo $display_news[0]['description']; ?></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<div class="tags">
					<ul>
						<li><h3>Tags:</h3></li>
						<li><a href="#">Games</a> ,</li>
						<li><a href="#">HD-Videos</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<div class="share-artical">
		  				<h3> Also share on</h3>
		  					<ul>
		  						<li><a href="#"><img src="<?php echo IMAGES_URL."facebook.png";?>" title="facebook">Facebook</a></li>
		  						<li><a href="#"><img src="<?php echo IMAGES_URL."twiter.png";?>" title="Twitter">Twitter</a></li>
		  						
		  						<li><a href="#"><img src="<?php echo IMAGES_URL."google+.png";?>" title="google+">Google+</a></li>
		  					</ul>
		  		</div>
		  		<div class="artical-commentbox">
		  						 	<h3>leave a comment</h3>
		  						 	<div class="table-form">
									<form>
										<input type="text" class="textbox" value="Name:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
										<input type="text" class="textbox" value="Email:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
										<input type="text" class="textbox" value="Phone:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}">
										<textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message:</textarea>	
									</form>
									<a href="#">submit comment</a>
								</div>
		  						 </div>
			</div>
			</div>
			<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
		<!---End-content---->
		<!---start-copy-right---->
		<?php include "include/footer.php"; ?>