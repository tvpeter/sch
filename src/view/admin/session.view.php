<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                      <div class="row"><div class="col-lg-6">
                        <div class="card card-outline-primary">
                    <h4 class="card-header text-white text-center">CREATE AND SET SESSION STATUS</h4>
                         <div class="card-body m-t-15">
                        <form method="post" class="form-horizontal form-bordered">
                    <div class="form-group row"><label class="col-sm-3">Session</label>
                         <div class="col-sm-9">
                    <input type="text" name="sess" class="form-control" required="required" placeholder="something like 2017/2018">
                    <?php  if (isset($error['sess'])) {  echo "<span class='text-warning'>".$error['sess']."</span>";  } ?></div>
                </div>
                                        
                                <div class="form-group row">
                    <label class="col-sm-3">Status</label> <div class="col-sm-9">
                        <select class="custom-select" name="status" required aria-required="true">
                        <option value="" selected="selected">Select</option>
                        <option value="editable">Editable</option>
                        <option value="viewable">Viewable</option>
                          </select></div></div>
                    
                                    <div class="form-actions">
                                 <div class="offset-sm-3 col-md-9">
        <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Submit</button>                    </div>
                                          </div>
                                </form>
                            </div>
                        </div>
                    </div>

                         <div class="col-lg-6">
                        <div class="card">
                            <div class="card-outline-primary">
                            <div class="card-header text-white text-center">
                               SESSIONS AND THEIR STATUS
                            </div></div>
                            <div class="card-body">
                                  <table class="table table-hover ">
<thead><tr> <th>#</th><th>SESSION</th><th>STATUS.</th><th>CHANGE STATUS</th><th>DELETE</th></tr></thead>
                                        <tbody>                                           
                                        <?php 
                            if (empty($sessions)) { "SESSIONS HAVE NOT BEEN SET YET"; }else{
                                         $n=0;
                                         foreach ($sessions as $session){  
                                            extract($session);
                                            $n++; ?>                                      
                                              <tr>
                                                <th scope="row"><?= $n; ?></th>
                                                <td><?=  $session; ?></td>
                                                <td><?=  strtoupper($status); ?></td>
    
                                        <td><?php 
                                        if ($status == "editable") { ?>
            <a href="delete.php?toview=<?= $id ?>" onclick="return confirm('Sure you want to make this session viewable only?')" title="Make it only viewable" ><i class="fa fa-eye fa-2x"></i></a><?php  } else{ ?>
<a href="delete.php?toedit=<?= $id ?>" onclick="return confirm('Sure you want to make this session editable?')" title="Make it editable" ><i class="fa fa-edit fa-2x"></i></a> <?php }?>
                                        </td>
    <td><a href="delete.php?rmsessn=<?= $id ?>" onclick="return confirm('Sure you want to delete this session?')" title="Delete" ><i class="fa fa-trash fa-2x"></i></a></td> 
                                            </tr>
                                           <?php } } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>