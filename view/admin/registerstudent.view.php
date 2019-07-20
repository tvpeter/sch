<?php require 'adminheader.php'; 
?>
            <div class="container-fluid">
                <div class="row">
                     <div class="col-lg-3"></div>
                
                <div class="col-lg-6">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                            <h4 class="text-white text-center">NEW STUDENT REGISTRATION</h4>
                            </div><br>
                           <div class="card-body">
                                <div class="input-states">
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                        <div class="form-group">
                                            <div class="row">
                              <label class="col-sm-3 control-label">Name:</label>
                                                <div class="col-sm-9">
                <input type="text" class="form-control" name="studentname" required="required">
            <?php  if (isset($error['studentname'])) {  echo "<span class='text-danger'>".$error['studentname']."</span>";  } ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                 <label class="col-sm-3 control-label">Date of Birth:</label>
                                                <div class="col-sm-9">
                        <input type="date" class="form-control" required="required" name="dob">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                             <label class="col-sm-3 control-label">Gender</label>
                                      <div class="col-sm-9">
            <select class="form-control custom-select" name="sex" required aria-required="true">
              <option selected="selected" value="" disabled="disabled">Select</option>
                     <option value="Male">Male</option>
                      <option value="Female">Female</option>
                                       </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                         <label class="col-sm-3 control-label">Class</label>
                                 <div class="col-sm-9">
           <select class="form-control custom-select" name="class" required aria-required="true">
             <option selected="selected" value="" disabled="disabled">select</option>
                <?php foreach ($classes as $class): ?>  
                  <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                           <?php endforeach; ?>
                          </select></div>
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <div class="row">
                         <label class="col-sm-3 control-label">Session</label>
                                                <div class="col-sm-9">
        <select class="form-control custom-select" name="session" required aria-required="true">
                                               <?= $session; ?>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>

                    <div class="form-group"><div class="row">
                    <label class="col-sm-3 control-label">Admission Number:</label>
                            <div class="col-sm-9">
                        <input type="text" class="form-control" required="required" name="admno">
    <?php  if (isset($error['admno'])) {  echo "<span class='text-danger'>".$error['admno']."</span>";  } ?>         </div>
                                        </div>
              <div class="form-group"><div class="row">
                           <label class="col-sm-3 control-label">Phone:</label>
                                               <div class="col-sm-9">
                             <input type="text" class="form-control" name="phone">
                                                    </div>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <div class="row">
                                        <label class="col-sm-3 control-label">Email:</label>
                                                <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="optional email" name="email">
                                                     </div>
                                            </div>
                                        </div>
                        <div class="form-group"><div class="row">
                        <label class="col-sm-3 control-label">Address:</label>
                         <div class="col-sm-9">
                <input type="text" class="form-control" name="address" required="required">                     </div>
                                            </div>
                                        </div>
                    <div class="form-group"><div class="row">
                   <label class="col-sm-3 control-label">Passport</label>
                    <div class="col-sm-9">
                     <input type="file" name="passpt">
                 <?php  if (isset($error['image'])) {  echo "<span class='text-danger'>".$error['image']."</span>";  } ?>
                          </div>
                                            </div>
                                        </div>

        <div class="row"><div class="col-md-offset-3 col-md-9">
        <button type="submit" class="btn btn-primary" name="register">Submit</button>
         <button type="reset" class="btn btn-inverse" name="Reset">Cancel</button>
                       </div>
                           </div>
                             </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                    </div>
                  
                </div>
            </div>
           

           <?php require 'adminfooter.php'; ?>