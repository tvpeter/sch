 <?php require 'adminheader.php';  ?>          
           <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post" name="form1">
                                    <div class="row">
                                     <div class="col-md-12">
                                      <div class="row">
                                <div class="col-md-3">
                               <select class="custom-select" name="session" required aria-required="true"> <?= $session; ?></select></div>  
                                <div class="col-md-3">
                                <select class="custom-select" name="class" required aria-required="true">
                                <option selected="selected" value="" disabled="disabled">Class</option>
                                <?php foreach ($classes as $class): ?>  
                                <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                                    <?php endforeach; ?></select></div>  

                                 <div class="col-md-3">
                    <select class="custom-select" name="subject" required aria-required="true">
                    <option selected="selected" value="" disabled="disabled">Subject</option>
                    <?php foreach ($subs as $sub): ?>  
                  <option value="<?= $sub['subject']; ?>"><?= $sub['subject']; ?></option>
                        <?php endforeach; ?></select></div>


                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button></div>
                                </div>
                            </div></div>
                                </form><hr>
                                <?php if (isset($_POST['session']) && isset($_POST['class'])){ ?>
                                <div class="p-3 mb-2 bg-primary text-white" align="center"><?= $_POST['class']." STUDENTS PERFORMANCE IN ".$_POST['subject']." ".$_POST['session']; ?></div>
                                  <div class="table-responsive m-t-40">
                                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr><th>SN</th><th>NAME</th><th>ADMNO</th><th>TOTAL MARKS</th>
                                                <th>AVERAGE</th><th>POSITION</th><th>GRADE</th><th>REMARK</th>
                                            </tr></thead>
                                            
                                        <tbody>  
                                             <?php $n = 0;

                             foreach ($subjectRecords as $student){  $n++;  
                                extract($student); 
                                $avg = round(($tt/3), 2);
                              $grade = $query->showGrade($avg)[0];
                              $remark = $query->showGrade($avg)[1];

                               $query->updateQuery("comb", ["position"=> $n, "avg"=>$avg], ["admno"=>$admno, "subj"=>$_POST['subject'], "class"=>$_POST['class'], "session"=>$_POST['session']]);

          $studentAnnualStat = $query->annualSubjectStat($admno, $_POST['session'], $_POST['class']);
          if ($studentAnnualStat != null) {
            extract($studentAnnualStat);
            $anavg = $studentsum/$sbn;
            $query->updateQuery("combr", ["avg"=>$anavg, "subjtotal"=>$sbn], ["admno"=>$admno, "session"=>$_POST['session'], "class"=>$_POST['class']]);
          }

                                ?>  
                                            <tr style="font-weight: bold;">
                                                <td><?= $n; ?></td>
                                                <td class="text-primary"><?= $name; ?></td>
                                                <td><?= $admno; ?></td>
                                                <td class="text-warning"><?= $tt; ?></td>
                                                <td><?= $avg; ?></td>
                                                <td class="text-success"><?= $n; ?></td>
                                                <td class="text-danger"><?= $grade; ?></td>
                                                <td><?= $remark; ?></td>
                                                
                               
                                             </tr>
                                           <?php }

                                           if ($n>0) {
                                             
                                             $annualAvg = $query->annualAvg($_POST['class'], $_POST['session'], $_POST['subject']);

                                             extract($annualAvg);

                                             $query->updateQuery("comb", ["classavg"=>round($anavg, 2), "min"=>$anmin, "max"=>$anmax], ["class"=>$_POST['class'], "session"=>$_POST['session'], "subj"=>$_POST['subject']]);


                                           }


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
            </div>
        <?php require 'adminfooter.php'; ?>