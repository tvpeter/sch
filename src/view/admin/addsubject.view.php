<?php require 'adminheader.php'; ?>
            <div class="container-fluid">
               <div class="row">
                    
               <div class="col-lg-8">
                        <div class="card">
                          <div class="card-title" align="center">
                                <h4> <?= $name; ?> REGISTERED SUBJECTS AND RECORDS FOR 
                         <?php echo strtoupper($gterm) ."SESSION $gsession "; ?><br>
                          <span class="text-danger">
                            <?php 
                                   if(empty($subno)) { 
                                    echo ("SET THE NUMBER OF SUBJECTS FOR THIS CLASS THIS TERM");
                              
                                 } else { 
                                  echo  "TOTAL SUBJECTS TO BE REGISTERED FOR  $gclass  IS $subno"; 
                                 }
                                 ?>
                              </span>
                            </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                             <th>STUDENT NAME: <?= $name; ?></th>
                              <th>ADMIN NO: <?= $gadmno;  ?></th>
                                                <th>CLASS: <?= $gclass; ?></th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                           <th>#</th>
                                                <th>SUBJECT NAME</th>
                                                <th>ADD</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
<form action=""  method="post">
        <?php $n = 0;
         foreach ($addSubjects as $subject) {  $n++;
                    extract($subject); ?>
            <tr style="font-weight: bold;">
              <th scope="row"><?= $n; ?></th>
             <td class="color-primary"><?=  htmlentities($subject); ?></td>
            <td><input type="checkbox" name="rsubject[]" id="checkbox" value="<?= htmlentities($subject); ?>"></td>
                                                </tr>
                                                   <?php } 
                                                   ?>  
                 <tr><td colspan="2"> <a href="viewsubjects.php?cid=<?= htmlentities($gadmno); ?>&session=<?= $gsession; ?>&class=<?= $gclass; ?>&term=<?= $gterm; ?>" title="Back" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp;BACK</a></td>
                  <td> <button class="btn btn-primary" name="adds" type="submit"><i class="fa fa-plus"></i>&nbsp;ADD SUBJECT</button></td></tr>     
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