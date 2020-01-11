<?php if($query->loggedIn()){
    $query->checkTime(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>SCC Ogoja</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                         <a class="navbar-brand" href="welc.php">
                        
                         <img src="images/logo1.png"/>                       
                        
                    </a>
                </div>

                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Search -->
             <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" action="search.php" method="post">
            <input type="text" class="form-control" placeholder="Search using student name or admission number" required="required" pattern=".{3,}"   required title="3 characters minimum" name="searchqn"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                       
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Comment -->
                        
                        
                        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle fa-2x"></i> </a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                    <li><a href="profile.php"><i class="ti-user"></i> Profile</a></li>
                         <li role="separator" class="divider"></li>

    <li><a href="https://secure57.webhostinghub.com:2096/" target="_blank"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
       
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                 <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
          <li class="nav-label">LABELS</li>
          <?php if ($_SESSION['role']== "admin") { ?>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-plus"></i><span class="hide-menu">CREATE</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="users.php"><i class="fa fa-user-circle"></i>Create Users</a></li>
    <li><a href="createclass.php"><i class="fa fa-plus-circle"></i>Create Class</a></li>
    <li><a href="subjects.php"><i class="fa fa-plus"></i>Create Subject</a></li>
     <li><a href="session.php"><i class="fa fa-plus-square"></i>Create Session</a></li>
    
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-address-card"></i><span class="hide-menu">RESULTS</span></a>
                            <ul aria-expanded="false" class="collapse">
      <li><a href="termstatus.php"><i class="fa fa-check"></i>Approve Results</a></li>
        <li><a href="subject.php"><i class="fa fa-clipboard"></i>Term Subject Scores</a></li>
    <li><a href="viewresults.php"><i class="fa fa-paper-plane"></i>Term Results</a></li>
    <li><a href="asubrecords.php"><i class="fa fa-gg-circle"></i>Annual Subject Scores</a></li>
    <li><a href="annualresult.php"><i class="fa fa-address-card"></i>Annual Results</a></li>     
                            </ul>
                        </li>

 <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-signal"></i><span class="hide-menu">RESULTS ANALYSIS</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="analysis.php"><i class="fa fa-align-center"></i>Class Performance</a></li>
        
    <li><a href="ranalysis.php"><i class="fa fa-signal"></i>Term Results Analysis</a></li>
    

                            </ul>
                        </li>
    <li><a href="registerstudent.php"><i class="fa fa-user-plus"></i>Register Student</a></li>
    <li><a href="allstudents.php"><i class="fa fa-users"></i>All Students</a></li>
    <li><a href="classtudents.php"><i class="fa fa-home"></i> Students In a Class</a></li>
    <li><a href="subno.php"><i class="fa fa-list-ol"></i>Set A Class Subjects No</a></li>
    <li><a href="subjectclass.php"><i class="fa fa-registered"></i>Register Class a Subject</a></li>   <hr>                
      
    
    <li><a href="announcement.php"><i class="fa fa-bullhorn"></i>Make Announcement</a></li>
    <li><a href="comments.php"><i class="fa fa-comments"></i>Read Users Comments</a></li>
    <li><a href="./docs/documentation.pdf" target="_blank"><i class="fa fa-book"></i>Documentation</a></li>

  
      <hr>  
    <li><a href="fees.php"><i class="fa fa-calculator"></i>School Fees</a></li>
    <li><a href="terminfo.php"><i class="fa fa-info-circle"></i>Term Information</a></li>
    <li><a href="newsletter.php"><i class="fa fa-paperclip"></i>Term Newsletter</a></li>
    <li><a href="bimages.php"><i class="fa fa-image"></i>Sliding Images</a></li>
<?php }elseif ($_SESSION['role']== "staff") { ?>
      <li><a href="classtudents.php"><i class="fa fa-home"></i> Students In a Class</a></li>
    <li><a href="subno.php"><i class="fa fa-list-ol"></i>Set A Class Subjects No</a></li>
    <li><a href="subjectclass.php"><i class="fa fa-registered"></i>Register Class a Subject</a></li>   <hr>                
      
    <li><a href="subject.php"><i class="fa fa-clipboard"></i>Term Subject Scores</a></li>
    <li><a href="viewresults.php"><i class="fa fa-paper-plane"></i>Term Results</a></li>
    <li><a href="asubrecords.php"><i class="fa fa-gg-circle"></i>Annual Subject Scores</a></li>
    <li><a href="annualresult.php"><i class="fa fa-address-card"></i>Annual Results</a></li>
         <hr>  
    <li><a href="analysis.php"><i class="fa fa-align-center"></i>Class Performance</a></li>
        
    <li><a href="ranalysis.php"><i class="fa fa-signal"></i>Term Results Analysis</a></li>
    <li><a href="./docs/documentation.pdf" target="_blank"><i class="fa fa-book"></i>Documentation</a></li>
    
    <?php }else{
        header("location:logout.php");
    } ?>
                </ul>
                </nav>
               
            </div>
           
        </div>
        
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
            </div>
<?php } ?>
            

