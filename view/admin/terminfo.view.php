<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                <div class="row">
                      <div class="col-lg-6">
                        <div class="card card-outline-info">
                            <div class="p-3 mb-2 bg-dark text-white">SET TERMS' GENERAL INFORMATION</div>
                <?php  if (isset($error['class'])) {  echo "<span class='alert alert-danger'>".$error['class']."</span>";  }
    if (isset($succ['insert'])) {  echo "<span class='alert alert-success'>".$succ['insert']."</span>";  }
                 ?>
                       <form action="#" method="post" class="form-horizontal form-bordered">
                       <div class="form-group row"><label class="col-sm-3">Session</label>
                            <div class="col-sm-9">
                                <select class="custom-select" name="session" required aria-required="true">
                                         <?= $gsession; ?></select></div></div>

                            <div class="form-group row"><label class="col-sm-3">Term</label>
                                                <div class="col-sm-9">
                            <select class="custom-select" name="term" required aria-required="true">
                                 <?= $gterm; ?></select></div></div>
                             <div class="form-group row">
                                <label class="col-sm-3">TERM STARTED:</label>
                                    <div class="col-sm-9">
                    <input type="date" class="form-control" required="required" name="tstarted"> 
                                                </div></div>
                    <div class="form-group row"><label class="col-sm-3">TERM ENDED:</label>
                                    <div class="col-sm-9">
                    <input type="date" class="form-control" required="required" name="tended"> 
                                            </div></div>
                    <div class="form-group row"><label class="col-sm-3">NEXT TERM BEGINS:</label>
                                    <div class="col-sm-9">
                    <input type="date" class="form-control" required="required" name="nextterm"> 
                                          </div></div>

            <div class="form-actions row"><div class="offset-sm-3 col-md-9">
        <button type="submit" class="btn btn-dark" name="submit"> <i class="fa fa-check"></i> Submit</button>
                                                 </div></div>
                                </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <form method="post" name="form3">
                            <div class="form-actions row"><div class="col-md-3">
                            <select class="custom-select" name="gsession" required aria-required="true">
                            <?= $nsession; ?></select></div>
                                               
            <div class="col-md-3"><select class="custom-select" name="gterm" required aria-required="true">
                        <?= $gterm; ?></select></div>
                                                 <div class="col-md-3">
    <button type="submit" class="btn btn-dark btn-outline" name="check"> <i class="fa fa-check"></i> Check</button>
    </div></div>
                                </form>
                                <hr>
                              
                            <div class="p-3 mb-2 bg-dark text-white">
                                <?php if (empty($termDetails)) {
                                    echo "SELECT SESSION AND TERM TO VIEW ITS INFORMATION";
                                }  else{ 
                                    extract($termDetails);
                                    echo "TERM INFORMATION FOR ".strtoupper($_POST['gterm'])." ".$_POST['gsession'].""; ?>
                            </div>
                            <div class="card-body">
                                
                                    <table class="table table-striped">                    
                                              <tr>
                                                <td class="text-info">TERM STARTED:</td>
                                                <td><?=  $termst; ?></td> 
                                            </tr> 
                                            <tr>
                                                <td class="text-info">TERM ENDED:</td>
                                                <td><?=  $terme; ?></td> 
                                            </tr> 
                                            <tr>
                                                <td class="text-info">NEXT TERM BEGINS:</td>
                                                <td><?=  $nextterm; ?></td> 
                                            </tr> 
                                       <tr><td align="center"> <a href="delete.php?session=<?= $_POST['gsession'] ?>&term=<?= $_POST['gterm'] ?>" title="Delete" class="btn btn-danger m-b-10 m-l-5">Delete</a></td><td>Delete to reset the dates.</td></tr>
                                    </table>
                                </div>
                         
                             <?php } ?>
                      
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>