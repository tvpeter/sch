<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                      <div class="row"><div class="col-lg-6">
                        <div class="card card-outline-primary">
                    <h4 class="card-header text-white text-center">APPROVE RESULTS FOR A CLASS/ WHOLE SCHOOL</h4>
                         <div class="card-body m-t-15">
                        <form method="post" class="form-horizontal form-bordered">
                          <div class="form-group row"><label class="col-sm-3">Session</label>
                            <div class="col-sm-9">
                    <select class="custom-select" name="session" required aria-required="true">
                                         <?= $gsession; ?></select>
        <?php  if (isset($error['session'])) {  echo "<span class='text-danger'>".$error['session']."</span>";  } ?>
                                            </div></div>

                  <div class="form-group row"><label class="col-sm-3">Term</label>
                                           <div class="col-sm-9">
                  <select class="custom-select" name="term" required aria-required="true">
                                                            <?= $gterm; ?>
                                                        </select>
              <?php  if (isset($error['term'])) {  echo "<span class='text-danger'>".$error['term']."</span>";  } ?>
                                         </div></div>
                                        
                     <div class="form-group row">
                    <label class="col-sm-3">Class</label> <div class="col-sm-9">
                    <select class="form-control custom-select" name="class" required aria-required="true">
             <option selected="selected" value="" disabled="disabled">select</option>
             <option value="all">All</option>
                <?php foreach ($classes as $class): ?>  
                  <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                           <?php endforeach; ?>
                          </select></div></div>
                    
                              <div class="form-actions"><div class="offset-sm-3 col-md-9">
        <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Approve</button>                    </div></div>
                                </form>

                            </div>

                        </div>
                    </div>

                         <div class="col-lg-6">
                        <div class="card">
                          <form method="post" name="form3">
                            <div class="form-actions row"><div class="col-md-3">
                                    <select class="custom-select" name="checkgs" required aria-required="true">
                                            <?= $gsession; ?>
                                            </select></div>
                                               
                                                <div class="col-md-3">
                                    <select class="custom-select" name="checkterm" required aria-required="true">
                                                            <?= $gterm; ?>
                                                        </select>
                                                 </div>
                                                 <div class="col-md-3">
<button type="submit" class="btn btn-dark btn-outline" name="checksub"> <i class="fa fa-check"></i> Check</button>
                                                 </div>         
                                    </div>
                                </form>
                                <hr>
                            <div class="card-outline-primary">
                            <div class="card-header text-white text-center">
                        CLASSES WHOSE RESULTS HAVE BEEN APPROVED FOR <?php 
                        if (! isset($_POST['checkgs']) || !isset($_POST['checkterm'])) {
                          echo "SELECT TERM AND SESSION";
                        }else{
                      echo  $_POST['checkgs']." SESSION ".strtoupper($_POST['checkterm']); } ?>
                            </div></div>
                            <div class="card-body">
                                  <table class="table table-hover ">
<thead><tr> <th>#</th><th>CLASS</th> <th>DISAPPROVE</th> </tr></thead>
                                        <tbody>                                           
                                        <?php 
                            if (empty($approvedClasses)) { "RESULTS HAVE NOT BEEN APPROVED FOR THIS SESSION"; }else{
                                         $n=0;
                                         foreach ($approvedClasses as $apc){  
                                            extract($apc);
                                            $n++; ?>                                      
                                 <tr>
                                <th scope="row"><?= $n; ?></th>
                                <td><?=  $class; ?></td>
      <td><a href="delete.php?tsid=<?= $id ?>" onclick="return confirm('Sure you want to disapprove this class term results?')" title="Delete" ><i class="fa fa-trash fa-2x"></i></a></td> 
                                            </tr>
                                           <?php } } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                     </div>
                    <p>Use the above form to approve results for a class/whole school. Once the result has been approved, 
                     it cannot be edited. If results are not approved for a particular term, students cannot be able to print the results.</p>

                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>