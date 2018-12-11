 <div id="wrapper">
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Meronews</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Mero News <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo ADMIN_URL?>logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>

                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?php echo ADMIN_URL?>index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        <a href="http://www.facebook.com"><i class="fa fa-fw fa-dashboard"></i> Facebook</a>
                        <a href="http://www.youtube.com"><i class="fa fa-fw fa-dashboard"></i> Youtube</a>
                        <a href="category-add.php"><i class="fa fa-fw fa-plus"></i>Add Category</a>
                        <a href="categorylist.php"><i class="fa fa-fw fa-list"></i>List Category</a>
                        <a href="newslist.php"><i class="fa fa-fw fa-list"></i>List News</a>
                        <a href="news-add.php"><i class="fa fa-fw fa-plus"></i>Add News</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

