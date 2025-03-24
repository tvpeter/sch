 <?php require 'adminheader.php';  ?>
 <div class="container-fluid">
     <div class="col-12">
         <div class="card">
             <div class="card-body">
                 <form method="post" name="form1">
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

                         <div class="col-md-2">
                             <button type="submit" class="btn btn-dark btn-outline" name="check"><i class="fa fa-check"></i>Check</button>
                         </div>
                     </div>
                 </form>
                 <hr>

                 <?php if (isset($_POST['session']) && isset($_POST['class']) && isset($_POST['term'])) { ?>
                     <div class="p-3 mb-2 bg-dark text-white" align="center"><strong><?= "RESULTS FOR " . $_POST['class'] . " STUDENTS " . $_POST['session'] . " " . strtoupper($_POST['term']); ?></strong></div>

                     <div class="table-responsive m-t-40"><?php if ($subno !== 0) { ?>
                             <p class="text-warning"> <?= "TOTAL SUBJECTS TO BE TAKEN BY " . $_POST['class'] . " THIS TERM IS " . $subno; ?></p>
                         <?php } else { ?>
                             <p class="text-danger"> <?= "SET THE TOTAL NUMBER OF SUBJECTS TO BE TAKEN BY THIS CLASS ELSE RESULTS WILL NOT BE COMPUTED!! " ?></p>
                         <?php } ?>
                         <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                             <thead>
                                 <tr>
                                     <th>SN</th>
                                     <th>STUDENT NAME</th>
                                     <th>ADMNO</th>
                                     <th>SUBJECTS <br> TAKEN</th>
                                     <th>TOTAL <br>MARKS</th>
                                     <th>AVERAGE</th>
                                     <th>POS</th>
                                     <th>REVIEW</th>
                                     <th>PRINT</th>
                                 </tr>
                             </thead>
                             <tbody> <?php $n = 0;
                                        foreach ($resultsDetails as $rs) {
                                            $n++;
                                            extract($rs);  ?>
                                     <tr style="font-weight: bold;">
                                         <td><?= $n; ?></td>
                                         <td class="text-primary"><?= $name; ?></td>
                                         <td class="text-muted"><?= $admno; ?></td>
                                         <td class="text-warning"><?= $subjectsTotal; ?></td>
                                         <td class="text-success"><?= $gtotal; ?></td>
                                         <td><?= round($avg, 2); ?></td>
                                         <td class="text-danger"><?= $n; ?></td>
                                         <td><?php if ($query->lookUp("id", "termstatus", ["class" => $_POST['class'], "session" => $_POST['session'], "term" => $_POST['term'], "results_status" => "approved"]) != 1) { ?>
                                                 <a href="resultsreview.php?cid=<?= $admno; ?>&class=<?= $_POST['class']; ?>&session=<?= $_POST['session']; ?>&term=<?= $_POST['term']; ?>" title="Review">
                                                     <i class="fa fa-edit fa-2x"></i>
                                                 </a>
                                             <?php } else {
                                                    echo "<i class='fa fa-lock'></i>";
                                                } ?>
                                         </td>
                                         <td>
                                             <a href="results.php?cid=<?= $admno; ?>&class=<?= $_POST['class']; ?>&session=<?= $_POST['session']; ?>&term=<?= $_POST['term']; ?>" title="Details" target="_blank">
                                                 <i class="fa fa-check-circle fa-2x"></i>
                                             </a>
                                         </td>
                                     </tr>
                             <?php if ($subno !== 0) {
                                                $avgs = $gtotal / $subno;
                                            } else {
                                                $avgs = 0;
                                            }
                                            $query->updateQuery("results", ["position" => $n, "avg" => $avgs], ["admno" => $admno, "class" => $_POST['class'], "session" => $_POST['session'], "term" => $_POST['term']]);
                                        }
                                    } else {
                                        echo "SELECT CLASS, SESSION AND TERM TO VIEW STUDENTS RESULTS";
                                    } ?>
                             </tbody>
                         </table>
                     </div>
             </div>
         </div>
     </div>
 </div>
 </div>
 <?php require 'adminfooter.php'; ?>
