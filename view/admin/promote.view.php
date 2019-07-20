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
                           <div class="col-md-6">
                            <div class="card">
                            <div class="card-body"> <p class="p-2 mb-2 bg-dark text-white text-center">STUDENT INFORMATION</p><hr>
                              
                                    <div align="center"> <?php if (!empty($passport)){  echo "<img src='passports/$passport' class='img'>";  } ?></div>
                                    <div class="row">
                                     <span class="text-right col-md-3">Name:</span>
                                    <span class="col-md-9 text-primary"><?= $name; ?></span></div><hr>

                                    <div class="row">
                                     <span class="text-right col-md-3">Addmission Number:</span>
                                  <span class="col-md-9 text-primary"><?= $admno; ?></span></div><hr>
                                    <div class="row">
                                     <label class="text-right col-md-3">Current Class:</label>
                                    <div class="col-md-9 text-primary"><?= $class; ?></div></div><hr>
                                    
                                     <div class="row">
                                     <span class="text-right col-md-3">Current Session:</span>
                                <span class="col-md-9 text-primary"><?= $session; ?></span></div><hr>

                                    
    <div class="row"><span class="text-center col-md-12"><strong>SESSIONS' PERFORMANCE</strong></span></div><hr>
          <div class="row"><span class="text-right col-md-3">ANNUAL AVERAGE</span>
          <span class="col-md-9 text-primary"><?= round($avg, 2); ?></span></div><hr>
     <div class="row"><span class="text-right col-md-3">POSITION:</span>
      <span class="col-md-9 text-primary"><?= $pos; ?></span></div><hr>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                          <div class="card">
        <div class="card-body"><p class="p-2 mb-2 bg-dark text-white text-center">STUDENT PROMOTION</p><hr>
                           <?php if ($checkP > 0) {
                                 echo "<span class='text-warning text-lead'>STUDENT HAS ALREADY BEEN PROMOTED</span>";
                               } else { 
        if (isset($suc['msg'])) {  echo "<span class='text-success'>".$suc['msg']."</span>";  } ?>

     <form class="form-horizontal form-material" method="post" name="form1" enctype="multipart/form-data">
                                       
                                            <div class="col-md-12 text-right">
                  Even for a student to repeat class, kindly select the same class and click promote.
                                            </div><br>                                       
                    <div class="form-group"><div class="row">
                    <label class="col-sm-3 text-right">Class</label><div class="col-sm-9">
            <select class="custom-select" name="pclass" required aria-required="true">
                <option selected="selected" value="" disabled="disabled">Class</option>
                    <?php foreach ($classes as $cl): ?>  
                  <option value="<?= $cl['class']; ?>"><?= $cl['class']; ?></option>
                                <?php endforeach; ?> </select>
                                                </div>
                                            </div>
                                        </div>

            <div class="col-md-12 text-right text-warning">
                  THIS PROMOTION IS FOR <?= $nsession ." SESSION"; ?>
                                            </div><br> 
                   
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-3">
        <a href="annualresult.php" title="Back" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;BACK</a></div>
                                                 <div class="col-md-6">
       <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Promote</button>
                                            </div>
                                            </div>           
                                        </form>
                                         <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
           <?php require 'adminfooter.php'; ?>