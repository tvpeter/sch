<?php require_once 'adminheader.php';  ?>  
          <head>
    <link href="css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
</head>
            <div class="container-fluid">
            
           
      <div class="row card">
        <?php if (isset($_SESSION['_ref_user'])) { ?>
          <p class="text-center text-primary"> <?= "WELCOME! ".$_SESSION['_ref_user'].", check you todo-list for today"; ?>
          </p> <?php } else{ header("location:logout.php"); 
      } ?>
      </div>
                <div class="row">
					<div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="year-calendar"></div>
                            </div>
                        </div>
                    </div>

				    <div class="col-lg-4">
                    <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Todo</h4>
                    <div class="card-content">
                    <div class="todo-list">
                    <div class="tdl-holder">
                    <div class="tdl-content">
                     <ul>
                        <?php if (empty($list)) {
                            echo "WOW! You have completed all tasks.";
                        } else{ 
                            foreach ($list as $td) {
                                 extract($td);
                                
                            ?>
                      <li>
                      <label>
		<input type="checkbox"><i class="bg-primary"></i><span><?= $body; ?></span>
					<a href='delete.php?todoid=<?= $id; ?>' class="ti-close"></a>
						</label>
                              </li>   <?php }} ?>                               
                                                </ul>
                                            </div>
                                        </div>

                    <form method="post" action="" id="form1">
                <div class="input-group input-group-rounded">
                 <button class="btn btn-primary input-group-close-icon btn-group-left" type="reset"><i class="ti-close"></i></button>
                <input type="text" class="form-control" placeholder="Type to add todo item" name="tdbody">
            <button class="btn btn-primary btn-group-right" type="submit" name="adtodo"><i class="fa fa-play"></i></button>

                                            </div></form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            

  <footer class="footer"> © 2018 All rights reserved</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/semantic.ui.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/prism.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <!-- scripit init-->
    <script src="js/lib/calendar-2/pignose.init.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>