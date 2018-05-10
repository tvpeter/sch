 <?php require 'adminheader.php';  ?>          
           <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" name="form1">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                               <select class="form-control custom-select" name="session" required aria-required="true">
                                    <?= $session; ?>   </select>
                                </div>  <div class="col-md-6">
                                    <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button></div>
                                </div>
                            </div></div>
                                </form><hr>
                                <h4 class="card-title" align="center"><?= "ALL STUDENTS IN THE SCHOOL FOR SESSION ".$select; ?></h4>
                                  <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr><th>SN</th><th>NAME</th><th>ADMNO</th><th>DOB</th>
                                                <th>GENDER</th><th>ADDRESS</th><th>CLASS</th>
                                                <th>REG. DATE</th><th>DETAILS</th><th>DELETE</th>
                                            </tr></thead>
                                            
                                        <tbody>  
                                             <?php $n = 0;

                             foreach ($students as $student){  $n++;  
                                extract($student); ?>  
                                            <tr>
                                                <td><?= $n; ?></td>
                                                <td><?= $name; ?></td>
                                                <td><?= $admno; ?></td>
                                                <td><?= $dob; ?></td>
                                                <td><?= $sex; ?></td>
                                                <td><?= $address; ?></td>
                                                <td><?= $class; ?></td>
                                                <td><?= $dater; ?></td>
                                                <td align="center"><a href="student.php?cid=<?= $admno ?>&session=<?= $select ?>" title="Details"><i class="fa fa-telegram fa-2x"></i></a></td>
                                              <td align="center"> <a href="delete.php?id=<?= $admno ?>&session=<?= $select ?>" title="Delete"><i class="fa fa-trash fa-2x"></i></a></td>
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