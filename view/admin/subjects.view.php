<?php require 'adminheader.php'; 
        
?>            <div class="container-fluid">
                      <div class="row">
                      <div class="col-lg-6">
                        <div class="card card-outline-info">
                            <div class="p-3 mb-2 bg-primary text-white" align="center">CREATE SUBJECT</div>
                                <form action="#" method="post">
                                        <div class="form-group row">
                                            <label class="col-md-3">Subject Name:</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="subject" required="required">
                                              <?php  if (isset($error['subject'])) {  echo "<span class='text-danger'>".$error['subject']."</span>";  } ?>
                                            </div>
                                    </div>
                                        <div class="row">
                                        <div class="offset-sm-3 col-md-9">
                                            <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Submit</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                         <div class="col-lg-6">
                        <div class="card">
                            <div class="p-3 mb-2 bg-secondary text-white">SUBJECTS IN THE SCHOOL </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>SUBJECT</th>
                                                <th>DELETE</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action=""  method="post">
                                           
                                        <?php  $n=0;
                                        foreach ($subjects as $sub){ $n++; ?>                                      
                                              <tr>
                                                <th scope="row"><?= $n;  ?></th>
                                                <td><?=  $sub['subject']; ?></td>
                                            <td><input type="checkbox" name="delete[]" id="checkbox" value="<?= $sub['id']; ?>"></td>
                                                
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