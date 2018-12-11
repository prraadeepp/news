<div class="right-content-heading">
					<div class="right-content-heading-left">
						<h3 style="font-weight:bold; color: green;" ><?php echo $today." News"; ?></h3>
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
					</div>
					<div class="right-content-heading-right">
						<div class="social-icons">
			                <ul>
			                    <li><a class="facebook" href="http://www.fb.com" target="_blank"> </a>
			                    </li>
			                    <li><a class="twitter" href="http://www.twitter.com" target="_blank"></a>
			                    </li>
			                    <li><a class="googleplus" href="http://www.google.com" target="_blank"> </a>
			                    </li>
			                </ul>
					</div>
					</div>
					<div class="clear"> </div>
				</div>