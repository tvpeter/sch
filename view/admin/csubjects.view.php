<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                      <div class="row">
                        
                      <div class="col-lg-6">
                        <div class="card card-outline-info">
                            <div class="card-header"><h4 class="m-b-0 text-white">CREATE CLASS</h4></div>
                            <div class="card-body m-t-15">
                                <form action="#" method="post" class="form-horizontal form-bordered">
                                    <div class="form-body">
                                      
                                        <div class="form-group row">
                                            <label class="control-label text-right col-md-3">Class Name:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="cname" required="required">
                                                <?php  if (isset($error['cname'])) {  echo "<span class='text-danger'>".$error['cname']."</span>";  } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="offset-sm-3 col-md-9">
                                            <button type="submit" class="btn btn-success" name="submit"> <i class="fa fa-check"></i> Submit</button>
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
                            <div class="card-title">
                                <h4>CLASSES IN THE SCHOOL</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>CLASS</th>
                                                <th>DELETE</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action=""  method="post">
                                           
                                        <?php  $sn=0;
                                         foreach ($classes as $class){  $sn++; ?>                                      
                                              <tr>
                                                <th scope="row"><?= $sn; ?></th>
                                                <td><?=  $class['class']; ?></td>
                                            <td><input type="checkbox" name="delete[]" id="checkbox" value="<?= $class['sn']; ?>"></td>
                                                
                                            </tr>
                                           <?php } ?>
                                            <tr><td colspan="3"> <button type="submit" class="btn btn-danger" name="del"> <i class="fa fa-times"></i> Delete</button></td>
                                                </form>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>