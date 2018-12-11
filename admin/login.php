<?php
    include 'header.php';

?>
<?php
if((isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']==1)||(isset($_SESSION['user_id'])&&$_SESSION['user_id']!=''))

{
$_SESSION['success']="welcome to system".$_SESSION['name'];
header('location:index.php');
exit;
}
?>

<body>
   
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <?php
                    
                    include 'sessioncall.php';
                    ?>
                    <form method="post" name="login" action="login-process.php">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" id="username" required />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" id="password" required />
						</div>
                                                <div class="form-group">
							
                                                    <input type="checkbox" name="remember" id="remember"/><label>Remember me</label>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="btn btn-primary"/>
						</div>
                	</form>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
    include 'footer.php';
?>