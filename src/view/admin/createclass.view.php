<?php require_once 'adminheader.php';  ?>   
 <div class="container-fluid">
                      <div class="row">
                        
                      <div class="col-lg-6">
                        <div class="card card-outline-info">
                  <div class="p-3 mb-2 bg-dark text-white">CREATE CLASS</div>
  <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="form-horizontal form-bordered">

                         <div class="form-group row">
         <label class="text-right col-md-3">Class Name:</label>
        <div class="col-md-9">
    <input type="text" class="form-control" name="cname" required="required">
    <?php  if (isset($error['cname'])) {  echo "<span class='alert alert-danger'>".$error['cname']."</span>";  } ?>
                                      </div></div>

                                      <div class="offset-sm-3 col-md-9">
                                        <button type="submit" class="btn btn-inverse" name="submit"> <i class="fa fa-check"></i> Submit</button>
                                    </div>                                              
                                </form>
                          
                        </div>
                    </div>
                         <div class="col-lg-6">
                        <div class="card">
                              <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                       <tr class="bg-secondary"> 
                 <td colspan="3" class="p-3 mb-2 bg-dark text-white"><strong>CLASSES IN THE SCHOOL</strong></td></tr></thead>
                                                                                                                             
                            <thead><tr><th>#</th><th>CLASS</th><th>DELETE</th></tr>  </thead>
                                       
                                        <tbody>
                        <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>"  method="post">
                                        <?php  $sn=0;
                                         foreach ($classes as $class){  $sn++; ?>          
                    <tr><th scope="row"><?= $sn; ?></th><td><?=  $class['class']; ?></td>
    <td><input type="checkbox" name="delete[]" id="checkbox" value="<?= $class['class']; ?>"></td>
                                    </tr>
                                           <?php } ?></tbody>
                                           <tfoot> <tr><td colspan="3" class="text-center"><button type="submit" class="btn btn-danger" name="del" onClick="confirm('Sure want to delete this class?')"> <i class="fa fa-trash"></i> Delete</button></td></tr></tfoot>
                                                </form>
                                        </table>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
             </div>
            <?php require_once 'adminfooter.php'; ?>