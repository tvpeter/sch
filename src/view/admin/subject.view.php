 <?php require 'adminheader.php';  ?>
 <div class="container-fluid">
     <div class="col-12">
         <div class="card">
             <form action="" method="post" name="form1">
                 <div class="row">
                     <div class="col-md-2">
                         <select class="custom-select" name="session" required aria-required="true"> <?= $session; ?></select>
                     </div>
                     <div class="col-md-2">
                         <select class="custom-select" name="term" required aria-required="true">
                             <?= $gterm; ?> </select>
                     </div>

                     <div class="col-md-3">
                         <select class="custom-select" name="class" required aria-required="true">
                             <option selected="selected" value="" disabled="disabled">Class</option>
                             <?php foreach ($classes as $class): ?>
                                 <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>

                     <div class="col-md-3">
                         <select class="custom-select" name="subject" required aria-required="true">
                             <option selected="selected" value="" disabled="disabled">Subject</option>
                             <?php foreach ($subs as $sub): ?>
                                 <option value="<?= $sub['subject']; ?>"><?= $sub['subject']; ?></option>
                             <?php endforeach; ?>
                         </select>
                     </div>

                     <div class="col-md-2">
                         <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button>
                     </div>
                 </div>

             </form>
             <hr>
             <?php if (isset($_POST['session']) && isset($_POST['class'])) { ?>
                 <div class="p-3 mb-2 bg-primary text-white" align="center"><?= $_POST['class'] . " STUDENTS PERFORMANCE IN " . $_POST['subject'] . " " . $_POST['session'] . " " . $_POST['term']; ?></div>
                 <div class="table-responsive m-t-40">
                     <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                         <thead>
                             <tr>
                                 <th>SN</th>
                                 <th>NAME</th>
                                 <th>ADMNO</th>
                                 <th>TOTAL CA</th>
                                 <th>EXAM</th>
                                 <th>TOTAL</th>
                                 <th>POSITION</th>
                                 <th>GRADE</th>
                                 <th>REMARK</th>
                             </tr>
                         </thead>

                         <tbody>
                             <?php $n = 0;

                                foreach ($students as $student) {
                                    $n++;
                                    extract($student);

                                    $grade = $query->showGrade($total)[0];
                                    $remark = $query->showGrade($total)[1];

                                    $query->updateQuery("scores", ["subjpos" => $n], ["admno" => $admno, "subj" => $_POST['subject'], "class" => $_POST['class'], "term" => $_POST['term'], "session" => $_POST['session']]);

                                ?>
                                 <tr style="font-weight: bold;">
                                     <td><?= $n; ?></td>
                                     <td class="text-primary"><?= $name; ?></td>
                                     <td><?= $admno; ?></td>
                                     <td class="text-warning"><?= $test; ?></td>
                                     <td><?= $exam; ?></td>
                                     <td><?= $total; ?></td>
                                     <td class="text-danger"><?= $n; ?></td>
                                     <td><?= $grade; ?></td>
                                     <td class="text-success"><?= $remark; ?></td>

                                 </tr>
                         <?php }
                            } else {
                                echo "SELECT TO VIEW STUDENTS SCORES IN A SUBJECT";
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
