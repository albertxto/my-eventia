        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="listevent.php">Dashboard</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-left">
                <li><a href="../../index.php"><i class="fa fa-arrow-left fa-fw"></i> Back to website</a></li>
                <li><a href="../../about.php">About</a></li>
                <li><a href="../../contact.php">Contact</a></li>
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                 <li><a href="profile.php">Hello, <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?></a></li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
						<li>
                            <a href="listevent.php"><i class="fa fa-calendar fa-fw"></i> Events</a>
                        </li>
						<li>
						    <a href="eventAdd.php"><i class="fa fa-calendar-plus-o fa-fw"></i> Add Event</a>
						</li>
						<?php if($_SESSION["control"]=="Admin"){ ?>
						<li>
                            <a href="listuser.php"><i class="fa fa-group fa-fw"></i> Users</a>
                        </li>
						<?php } ?>
                        <li>
                            <a href="profile.php"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
						<li>
                            <a href="../../logout.php"><i class="fa fa-sign-out fa-fw"></i> Log Out</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>