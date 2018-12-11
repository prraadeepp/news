<?php include "include/header.php"; ?>
		<!---start-wrap---->
			<!---start-header---->
<?php include "include/top-nav.php"; ?>
		<!---start-content---->
		<div class="main-content">
			<div class="wrap">
			<?php include "include/left-nav.php"; ?>
			<?php 
			if(isset($_GET['act']) && isset($_GET['id']))
			{
				$cat_id = sanitize($_GET['id']);
				if($_GET['act'] != substr(("'".md5("news-category-".$cat_id)."'"),5,15))
				{
					$_SESSION['error'] = "Sorry! This is not a valid URL";
					@header("location:index.php");
					exit;
				}
				else
				{
					$for_today = getCategoryTitle($cat_id);
					$today = $for_today[0]['title'];
				}
			}
			else if(isset($_GET['acttrending']) && $_GET['acttrending']!="")
			{	
				$cat_id = "";
				if($_GET['acttrending'] != substr(md5("trending_news"),5,10))
				{
					$_SESSION['error'] = "Sorry! This is not a valid URL";
					@header("location:index.php");
					exit;
				}
				else
				{
					$today = "Trending";
				}
			}
			else if(isset($_GET['actfeatured']) && $_GET['actfeatured']!="")
			{	
				$cat_id = "";
				if($_GET['actfeatured'] != substr(md5("featured_news"),5,10))
				{
					$_SESSION['error'] = "Sorry! This is not a valid URL";
					@header("location:index.php");
					exit;
				}
				else
				{
					$today = "Featured";
				}
			}
			else
			{
				$_SESSION['error'] = "Sorry! The category you requested is not found";
				@header("location:index.php");
				exit;
			}
			?>
			<div class="right-content">
				<?php include "include/right-nav.php"; ?>
				<div class="content-grids">
					<?php 
					//debugger($_GET,true);
					$news = array();
					if($cat_id!="")
					{
						$news = getNewsByCatId($cat_id);
						$catcat = "in this category";
					}
					else 
					{
						if ($today= "featured")
						{
							$news = getFeaturedNews();
							$catcat = "Featured";
						}
						if ($today= "Trending")
						{
							$news = getTrendingNews();
							$catcat = "trending";
						}
					}
					//debugger($news,true);
					if(!$news)
					{
						$no_news = 1;
					}
					else
					{
						$no_news = 0;
					}
					if($no_news)
					{
							?><h5 style="color: red;font-size: 2em;"><?php  echo "Sorry! There are no any news currently ".$catcat.". Please visit later!";?></h5>



					<?php
					exit;
					}
					//debugger($news,true);
					$news_image = array();
					foreach ($news as $key => $value) 
					{
						$i=1;
					$news_image = getNewsImage($value['id']);
					?>
					<div class="content-grid">
						<?php $actt = substr(("'".md5("news-reader-".$value['id']))."'", 9,12); ?>
						<a target="_blank" href="<?php echo "singlepage.php?id=".$value['id']."&act=".$actt; ?>"><img src="<?php echo UPLOAD_NEWS_IMAGES_URL.$news_image[0]['image_name']; ?>" title="<?php echo $value['title']; ?>" />
						<h3 style="text-align:-webkit-match-parent; height:125px; font-size:1.185em; color: darkblue;"><?php echo $value['title'];?>
						</h3></a>
						
						<ul>
							<li><a href="#"><img src="<?php echo ASSETS_URL; ?>images/likes.png" title="like" /></a></li>
							<li><a href="#"><img src="<?php echo ASSETS_URL; ?>images/views.png" title="views" /></a></li>
							<li><a href="#"><img src="<?php echo ASSETS_URL; ?>images/link.png" title="link" /></a></li>
						</ul>
						<a class="button" target="_blank" href="<?php echo "singlepage.php?id=".$value['id']."&act=".$actt;  ?>" >Read now</a>
					</div>
					<?php
					if($i%3 == 0)
					{?>
				<?php

					}
					$i++;
					} ?>
					<!---start-pagenation------>
					<div class="clear"> </div>
					<!---End-pagenation---h-->
				</div>
			</div>
			<div class="clear"> </div>
			</div>
		</div>
		<div class="clear"> </div>
		<!---End-content---->
		<?php  include "include/footer.php"; 
	//}?>