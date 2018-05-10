<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                      <div class="row">
                      <div class="col-lg-6">
                        <div class="card card-outline-info">
                            <div class="card-header text-white text-center">SET NO. OF SUBJECTS FOR A CLASS IN A TERM</div>
                            <div class="card-body m-t-15">
                        <form action="#" method="post" class="form-horizontal form-bordered">

                    <div class="form-group">
                        <div class="row">
                    <label class="col-sm-3">Class</label><div class="col-sm-9">
            <select class="custom-select" name="class" required aria-required="true">
                    <option selected="selected" value="" disabled="disabled">select</option>
                    <?php foreach ($classes as $class): ?>  
                  <option value="<?= $class['class']; ?>"><?= $class['class']; ?></option>
                                                          <?php endforeach; ?>
                                                        </select>
                                                        <?php  if (isset($error['class'])) {  echo "<span class='text-danger'>".$error['class']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3">Session</label>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="session" required aria-required="true">
                                                            <?= $gsession; ?>
                                                        </select>
                                                        <?php  if (isset($error['session'])) {  echo "<span class='text-danger'>".$error['session']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3">Term</label>
                                                <div class="col-sm-9">
                                                    <select class="custom-select" name="term" required aria-required="true">
                                                            <?= $gterm; ?>
                                                        </select>
                                                        <?php  if (isset($error['term'])) {  echo "<span class='text-danger'>".$error['term']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>
                             <div class="form-group">
                                <div class="row">
                                <label class="col-sm-3">No of Subjects:</label>
                                    <div class="col-sm-9">
                    <input type="text" class="form-control" required="required" name="tsubjects"> 
                    <?php  if (isset($error['tsubjects'])) {  echo "<span class='text-danger'>".$error['tsubjects']."</span>";  } ?>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Submit</button>
                                                 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                         <div class="col-lg-6">
                        <div class="card">
                            <form method="post" name="form3">
                            <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                            <select class="custom-select" name="checkgs" required aria-required="true">
                                            <?= $gsession; ?>
                                                        </select>
                                                 </div>
                                               
                                                 <div class="col-md-3">
                                            <select class="custom-select" name="checkterm" required aria-required="true">
                                                            <?= $gterm; ?>
                                                        </select>
                                                 </div>
                                                 <div class="col-md-3">
                                            <button type="submit" class="btn btn-dark btn-outline" name="checksub"> <i class="fa fa-check"></i> Check</button>
                                                 </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            <div class="p-3 mb-2 bg-dark text-white">
                                CLASSES AND NO. OF SUBJECTS TAKEN FOR <?= strtoupper($term)." ".$session; ?>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>CLASS</th>
                                                <th>SUBJECTS NO.</th>
                                                 <th>DELETE</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>                                           
                                        <?php  $n=0;
                                         foreach ($setclasses as $sc){  
                                            extract($sc);
                                            $n++; ?>                                      
                                              <tr>
                                                <th scope="row"><?= $n; ?></th>
                                                <td><?=  $class; ?></td>
                                                <td><?=  $subno; ?></td>
                                            <td><a href="delete.php?sbn=<?= $sn ?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a></td> 
                                            </tr>
                                           <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>