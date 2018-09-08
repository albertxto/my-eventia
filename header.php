	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="img/my-eventia-logo.png" alt="Logo My Eventia" style="width:auto; height:50px;" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
					<li <?php if(isset($active)){ if($active==1) echo "class='active'"; } ?>><a href="about.php">About</a></li>
                    <li <?php if(isset($active)){ if($active==2) echo "class='active'"; } ?>><a href="contact.php">Contact</a></li>
				<?php if(!isset($_SESSION["email"])){ ?>
                    <li <?php if(isset($active)){ if($active==3) echo "class='active'"; } ?>><a href="register.php">Sign Up</a></li>
					<li <?php if(isset($active)){ if($active==4) echo "class='active'"; } ?>><a href="login.php">Log In</a></li>
				<?php }else{ ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li <?php if(isset($active)){ if($active==5) echo "class='active'"; } ?>><a href="admin/pages/profile.php">Edit Profile</a></li>
							<li role="separator" class="divider"></li>
							<li <?php if(isset($active)){ if($active==6) echo "class='active'"; } ?>><a href="admin/pages/eventAdd.php">Add Event</a></li>
							<li <?php if(isset($active)){ if($active==7) echo "class='active'"; } ?>><a href="admin/pages/listevent.php">My Events</a></li>
						</ul>
					</li>
					<li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
				<?php } ?>
				</ul>
				<form class="navbar-form navbar-right" action="index.php" method="get">
					<div class="input-group">
						<input class="form-control" type="search" name="search" placeholder="Event Search" value="<?php if(isset($_GET["search"])) echo $_GET["search"]; ?>" />
						<?php if(isset($_GET["sort"])){ ?><input type="hidden" name="sort" value="<?php echo $_GET["sort"]; ?>" /><?php } ?>
						<span class="input-group-btn"><input class="btn btn-primary" type="submit" value="Search" /></span>
					</div>
				</form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <!--<li data-target="#myCarousel" data-slide-to="2"></li>-->
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('img/upcoming.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Upcoming Events</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('img/signup.jpg');"></div>
                <div class="carousel-caption">
                    <h2>Sign Up Now</h2>
                </div>
            </div>
            <!--<div class="item">
                <div class="fill" style="background-image:url('img/business+logodesign.png');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>-->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>