			<div class="header">
				<div class="wrap">
				<!---start-logo---->
				<div class="logo">
					<h1><a href="index.php" style="font-size:40px;">Mero News</a></h1>
				</div>
				<!---End-logo---->
				<!---start-top-menu-search---->
				<div class="top-menu">
					<div class="top-nav">
						<ul>
							<li><a style="font-weight:bold; color:blue;" href="<?php echo SITE_URL; ?>">Home</a></li>
							<li><a style="font-weight:bold; color:blue;" href="<?php echo SITE_URL.'categories.php?acttrending='.substr(md5("trending_news"),5,10); ?>">Trending News</a></li>
							<li><a style="font-weight:bold; color:blue;" href="<?php echo SITE_URL.'categories.php?actfeatured='.substr(md5("featured_news"),5,10); ?>">Featured News</a></li>
							<li><a style="font-weight:bold; color:blue;" href="contact.php">Contact us</a></li>
						</ul>
					</div>
					<div class="clear"> </div>
				</div>
				<div class="clear"> </div>
				<!---End-top-menu-search---->
			</div>
			<!---End-header---->
		</div>
		<div class="clear"> </div>