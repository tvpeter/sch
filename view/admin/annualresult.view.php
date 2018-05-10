 <?php require 'adminheader.php';  ?>          
           <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                                <form action="" method="post" name="form1">
                                  <div class="row">
                                <div class="col-md-4">
                               <select class="custom-select" name="session" required aria-required="true"> <?= $session; ?></select></div>  
                                <div class="col-md-4">
                                <select class="custom-select" name="class" required aria-required="true">
                                <option selected="selected" value="" disabled="disabled">Class</option>
                                <?php foreach ($classes as $class): ?>  
                                <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                                    <?php endforeach; ?></select></div>  

                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button></div>
                                </div>
                                </form><hr>
                                <?php if (isset($_POST['session']) && isset($_POST['class'])){ ?>
                                <div class="p-3 mb-2 bg-dark text-white" align="center"><?= $_POST['class']." STUDENTS ANNUAL RESULTS FOR ".$_POST['session']; ?></div>
                                  <div class="table-responsive m-t-40">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr><th>SN</th><th>NAME</th><th>ADMNO</th><th>SUBJECTS</th>
                                                <th>AVERAGE</th><th>POSITION</th><th>PROMOTE</th><th>DETAILS</th>
                                            </tr></thead>
                                            
                                        <tbody>  
                                             <?php $n = 0;

                             foreach ($anresult as $studentresult){  $n++;  
                                extract($studentresult);

                              $query->updateQuery("combr", ["pos"=> $n], ["admno"=>$admno, "class"=>$_POST['class'], "session"=>$_POST['session']]);

                                ?>  
                                            <tr style="font-weight: bold;">
                                                <td><?= $n; ?></td>
                                                <td class="text-primary"><?= $name; ?></td>
                                                <td><?= $admno; ?></td>
                                                <td class="text-warning"><?= $subjtotal; ?></td>
                                                <td class="text-danger"><?= round($avg, 2); ?></td>
                                                <td class="text-success"><?= $n; ?></td>
                                                <td><a href="promote.php?cid=<?= $admno; ?>&class=<?= $_POST['class']; ?>&session=<?= $_POST['session']; ?>" title="Review"><i class="fa fa-edit fa-2x" style="font-size:24px;"></i></a></td>
                                                <td><a href="../cresults.php?cid=<?= $admno; ?>&class=<?= $_POST['class']; ?>&session=<?= $_POST['session']; ?>" title="Details"><i class="fa fa-check-circle fa-2x"></i></a></td>
                                                
                               
                                             </tr>
                                           <?php }
                                         }else{ 
                                           echo "SELECT TO VIEW STUDENTS' ANNUAL PERFORMANCE IN A SUBJECT";
                                         }
                                           ?>    
                                                                             
                                        </tbody>
                                    </table>  
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        <?php require 'adminfooter.php'; ?>