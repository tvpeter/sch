<?php require 'adminheader.php'; ?>
            <div class="container-fluid">
               <style type="text/css">
                    .img{border-radius: 50%; height: 150px; width: auto; margin: 20px 20px; float: none;}
                </style>
                <div class="row">
               <div class="col-lg-11">
                        <div class="card">
                            <div align="right">
                <?php if (!empty($passport)){  echo "<img src='../passports/$passport' class='img'>";  } ?>

                            </div>
                            <div class="card-title" align="center">
                                <h4> <?= $name; ?> REGISTERED SUBJECTS AND RECORDS FOR 
                         <?php echo strtoupper($gterm) ." SESSION $gsession "; ?><br>
                          <span class="text-danger">
                            <?php 
                                   if(!empty($totalsubjects)) { 
                              echo  "TOTAL SUBJECTS TO BE REGISTERED FOR  $gclass  IS $subno "; 
                                 } else { 
                                echo ("SET THE NUMBER OF SUBJECTS FOR THIS CLASS THIS TERM"); }
                                 ?>
                              </span>
                            </h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr class="bg-dark">
                             <th colspan="2" class="text-white">STUDENT NAME: <?= $name; ?></th>
                              <th colspan="2" class="text-white">ADMIN NO: <?= $gadmno;  ?></th>
                                                <th colspan="2" class="text-white">CLASS: <?= $gclass; ?></th>
                                                <th colspan="2" class="text-white">SESSION <?= $gsession; ?></th>
                                                <th colspan="3" class="text-white">  TERM <?= $gterm; ?> </th>
                                                
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                           <th>#</th>
                                                <th>SUBJECT NAME</th>
                                                <th>TOTAL CA</th>
                                                <th>EXAMS</th>
                                                <th>TOTAL</th>
                                                <th>CLASS AVG</th>
                                                <th>LOWEST</th>
                                                <th>HIGHEST</th>
                                                <th>POSITION</th>
                                                <th>EDIT</th>
                                                <th>DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<form action=""  method="post">
        <?php $n = $totalMarks = 0;
         foreach ($subjects as $subject) {  $n++; 
                     extract($subject); 
                     $totalMarks = $totalMarks + $total;

                     ?>
            <tr style="font-weight: bold;">
              <th scope="row"><?= $n; ?></th>
             <td class="text-primary"><?=  htmlentities($subj); ?></td>
              <td><?= htmlentities($test); ?></td>
              <td class="text-success"><?= htmlentities($exam); ?></td>
               <td class="text-danger"><?= htmlentities($total); ?></td>
               <td><?=  htmlentities($classavg); ?></td>
            <td><?=  htmlentities($min); ?></td>
             <td class="text-success"><?=  htmlentities($maxi); ?></td>
            <td class="text-danger"><?=  htmlentities($subjpos); ?></td>
        <td><a href="editscore.php?cid=<?= htmlentities($gadmno); ?>&class=<?= htmlentities($gclass); ?>&session=<?= $gsession; ?>&term=<?= htmlentities($gterm); ?>&subj=<?= htmlentities($subj); ?>" title="Edit Score"><i class="fa fa-edit" style="font-size:24px;"></i></a></td>
            <td><input type="checkbox" name="delete[]" id="checkbox" class="btn" value="<?= htmlentities($subj); ?>"></td>
                                                </tr>
                                                   <?php }

                        if ($checkInResult < 1) {

                          if (!empty($totalsubjects)) {
                            $studentAvg = $totalMarks/$subno;
                          }else{
                            $studentAvg = 0;
                          }
                          
                          $query->dbInsert("results", ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsession, "term"=>$gterm, "subjectsTotal"=>$n, "gtotal"=>$totalMarks, "avg"=>$studentAvg]);
                          
                        }elseif( $checkInResult == 1) {
                          if (!empty($totalsubjects)) {
                            $studentAvg = $totalMarks/$subno;
                          }else{
                            $studentAvg = 0;
                          }

                          $query->updateQuery("results", ["subjectsTotal"=>$n, "gtotal"=>$totalMarks, "avg"=>$studentAvg], ["admno"=>$gadmno, "class"=>$gclass,  "session"=>$gsession, "term"=>$gterm]);

                        }
                                                    ?>  
                 <tr><td colspan="4"> <a href="student.php?cid=<?= htmlentities($gadmno); ?>&session=<?= $gsession; ?>" title="Back" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;BACK</a></td>
                  <td colspan="3"> <a href="addsubject.php?cid=<?= htmlentities($gadmno); ?>& class=<?= htmlentities($gclass);  ?> & session=<?php echo htmlentities($gsession); ?>& term=<?php echo htmlentities($gterm); ?>" title="Add subjects" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;ADD</a></td>

                  <td colspan="4"> <button class="btn btn-danger" name="del" type="submit"><i class="fa fa-trash"></i>&nbsp;Delete</button></td></tr>     
                                                    </form>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
           

           <?php require 'adminfooter.php'; ?>