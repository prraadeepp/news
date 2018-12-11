<?php include "include/header.php"; ?>
		<!---start-wrap---->
			<!---start-header---->
<?php include "include/top-nav.php"; ?>
		<!---start-content---->
		<div class="main-content">
			<div class="wrap">
			<?php include "include/left-nav.php"; ?>
			<div class="right-content">
				<div class="content-grids">

					<p style = "font-size: 1.6em;">We are here to answer any questions you may have about your Mero news experiences. Reach out to us and we'll respond as soon as we can.</p>
					<p  style = "font-size: 1.6em;">
					Even if there is something you have always wanted to read and can't find it on Mero News, let us know and we promise we'll do our best to find it for you and send you there.</p>
					<h2>Please provide your following details</h2>

					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<form action="<?php echo ADMIN_URL.'contact.php';?>"method="post" >
    <div class="form-group">
        <label class="text-info">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
    </div>
    <div class="form-group">
        <label class="text-info">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
    </div>
    <div class="form-group">
        <label class="text-danger">Your message</label>
       <textarea rows="6" name="description" class="form-control" style="resize:null">
       </textarea></div>
    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" >
    </div>

</form> 


							</div>
						</div>
					</div>
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