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
                                    <?= $gsession; ?>   </select>
                                </div>  <div class="col-md-6">
                                    <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button></div>
                                </div>
                            </div></div>
                                </form><hr>
                                 <?php if (isset($_POST['session'])){ ?>

                                <h4 class="card-title" align="center"><?= "ALL STUDENTS IN THE SCHOOL FOR SESSION ".$session; ?></h4>
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
                            <td class="text-primary"><?= $name; ?></td>
                            <td class="text-danger"><?= $admno; ?></td>
                                                <td><?= $dob; ?></td>
                                                <td><?= $sex; ?></td>
                                    <td class="text-info"><?= $address; ?></td>
                                <td class="text-success"><?= $class; ?></td>
                                                <td><?= $dater; ?></td>
                      <td align="center"><a href="student.php?cid=<?= $admno ?>&session=<?= $session ?>" title="Details"><i class="fa fa-telegram fa-2x"></i></a></td>
                        <td align="center"> <a href="delete.php?id=<?= $admno ?>&session=<?= $session ?>" title="Delete" onclick="return confirm('Are you sure you want to delete a student?')"><i class="fa fa-trash fa-2x"></i></a></td>
                                            </tr>
                                           <?php } ?>    
                                                                             
                                        </tbody>
                                       
                                     
                                    </table>  
                                     
                                </div>
                            <?php } else{
                                echo "Select session to view all students";
                            } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php require 'adminfooter.php'; ?>