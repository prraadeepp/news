<?php include "include/header.php"; ?>
		<!---start-wrap---->
			<!---start-header---->
<?php include "include/top-nav.php"; ?>
		<!---start-content---->
		<div class="main-content">
			<div class="wrap">
			<?php include "include/left-nav.php"; ?>
			<div class="right-content">
				<?php include "include/right-nav.php"; ?>
				<div class="content-grids">
					<?php 
					$news = array();
					$news = getAllNews(" WHERE STATUS = 1 ");
					$news_image = array();
					foreach ($news as $key => $value) {
					$news_image = getNewsImage($value['id']);
					?>
					<div class="content-grid">
						<?php $actt = substr(("'".md5("news-reader-".$value['id']))."'", 9,12); ?>
						<a target="_blank" href="<?php echo "singlepage.php?id=".$value['id']."&act=".$actt;  ?>"><img src="<?php echo UPLOAD_NEWS_IMAGES_URL.$news_image[0]['image_name']; ?>" title="<?php echo $value['title']; ?>" />
						<h3 style="text-align:-webkit-match-parent; height:125px; font-size:1.185em; color: darkblue;"><?php echo $value['title'];?>
						</h3></a>
						
						<ul>
							<li><a href="#"><img src="<?php echo ASSETS_URL; ?>images/likes.png" title="image-name" /></a></li>
							<li><a href="#"><img src="<?php echo ASSETS_URL; ?>images/views.png" title="image-name" /></a></li>
							<li><a href="#"><img src="<?php echo ASSETS_URL; ?>images/link.png" title="image-name" /></a></li>
						</ul>
						<a target="_blank" class="button" href="<?php echo "singlepage.php?id=".$value['id']."&act=".$actt;  ?>">Read now</a>
					</div>
					<?php } ?>
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
		<?php include "include/footer.php"; ?>