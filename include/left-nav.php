<div class="left-sidebar">
				<div class="sidebar-boxs">
					<div class="type-videos">
						<?php 
						$category = array();
						$category = getAllCategory(" WHERE STATUS = 1 "," ORDER BY title DESC");
						//debugger($category,true);
						?>

						<h3 style="font-weight:bold; color: unset;">News Category</h3>
						<ul>
							<?php foreach ($category as $key => $value) {
								//debugger($value,true);
								# code...
							
							$act = substr("'".md5("news-category-".$value['id'])."'",5,15); ?>
							<li><a style="color: black; font-weight: bold;" href="<?php echo "categories.php?id=".$value['id']."&act=".$act ;?>"><?php echo $value['title']; ?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>