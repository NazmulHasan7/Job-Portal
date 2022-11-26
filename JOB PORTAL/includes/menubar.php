<nav id="menubar" class="navbar navbar-expand-lg sticky-top navbar-white bg-dark">
    <div class="container-fluid">        
        <a class="navbar-brand px-2" style="margin-right: 0rem;" href="index.php">
            <h2 style="text-align: center; font-weight: bolder;">JOB FINDER BD</h2>
        </a>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
            style="background: white; color:black" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"> <i class="fa-solid fa-house-user"></i> &nbsp;Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="jobs.php"><i class="fas fa-briefcase"></i> &nbsp;Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="companies.php"><i class="fas fa-university"></i> &nbsp;Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" style="cursor: pointer;"><i class="fa-solid fa-envelope"></i> &nbsp;Contact</a>
                </li>
                <li class="nav-item">
                <?php if (isset($_SESSION['user'])) { ?>
                    <?php if($_SESSION['user']['user_type'] == "admin"){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a>
                        </li>
                    <?php } elseif($_SESSION['user']['user_type'] == "user"){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="user_dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a>
                        </li>
                    <?php } elseif($_SESSION['user']['user_type'] == "company"){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="company_dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a>
                        </li>
                    <?php } ?>
				    <li class="nav-item"><a href="logout.php" class="nav-link" style="cursor:pointer;"><i class="fa-solid fa-right-to-bracket"></i> &nbsp;Sign Out</a></li>
			    <?php } else{ ?>
				    <li class=""><a href="login.php" class="nav-link" style="cursor:pointer;"><i class="fa-solid fa-right-to-bracket"></i> &nbsp;Sign in</a></li>
			    <?php } ?>
                </li>
                <?php if (isset($_SESSION['user'])) { ?>
			    <?php } else{ ?>
				    <li class="nav-item">
                        <a class="nav-link" href="register.php"><i class="fas fa-user-plus"></i> Register</a>
                    </li>
			    <?php } ?>
           </ul>
        </div>
    </div>
</nav>