<?php require'adminheader.php';
 
?>
            <!-- Container fluid  -->
            <div class="container-fluid">
                <style type="text/css">
                    .img{border-radius: 50%; height: 200px; width: auto; margin: 20px 20px; float: none;}
                </style>
                <div class="row">
                       <div class="col-md-12">
                        <div class="row">
                          <?php if (empty($students)) {
                            echo "<span class='text-primary'>No student found. Refine your search</span>";
                          }else{
                           foreach ($students as $student) {
                            extract($student);
                            ?>
                            <div class="col-md-6"><div class="card">
                            <div class="card-body"> <p class="p-2 mb-2 bg-dark text-white text-center">STUDENT INFORMATION</p><hr>
                              
                                    <div class="row">
                                     <span class="text-right col-md-3">Name:</span>
                                    <span class="col-md-9 text-primary"><?= $name; ?></span></div><hr>

                                    <div class="row">
                                     <span class="text-right col-md-3">Addmission Number:</span>
                                  <span class="col-md-9 text-primary"><?= $admno; ?></span></div><hr>
                                    <div class="row">
                                     <label class="text-right col-md-3">Current Class:</label>
                                    <div class="col-md-9 text-primary"><?= $student['class']; ?></div></div><hr>
                                    
                                     <div class="row">
                                     <span class="text-right col-md-3">Current Session:</span>
                              <span class="col-md-9 text-primary"><?= $session; ?></span></div><hr>

                              <div class="row">
                                     <span class="text-right col-md-3">Registration Date:</span>
                              <span class="col-md-9 text-primary"><?= $dater; ?></span></div><hr>      

                        <?php if ($_SESSION['role'] == "staff" && !in_array($student['class'], $sieved)) {
                          echo "<span class='text-danger'>RESTRICTED ACCESS (STUDENT NOT IN YOUR CLASS).</span>";
                               }else{

                               ?>
                              <div class="row">
                             <span class="text-right col-md-3">VIEW DETAILS:</span>
          <span class="col-md-9 text-primary"><a href="student.php?cid=<?= $admno ?>&session=<?= $session ?>" title="Details"><i class="fa fa-telegram fa-2x"></i></a></span></div><hr>
                      <?php } ?>


                              </div>
                        </div>
                    </div>
                  <?php  }} ?>

                   
                        </div>
                        </div>
                </div>
            </div>
           <?php require 'adminfooter.php'; ?>