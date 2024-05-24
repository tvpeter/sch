<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
                      <div class="row"><div class="col-lg-6">
                        <div class="card card-outline-info">
            <div class="p-3 mb-2 bg-primary text-white">REGISTER ALL STUDENTS IN A CLASS FOR A SUBJECT</div>
                            <?php  
         if (isset($succ['insert'])) {  echo "<span class='alert alert-success'>".$succ['insert']."</span>";  } ?>
                            <div class="card-body m-t-15">
                        <form action="#" method="post" class="form-horizontal form-bordered">
                    <div class="form-group row">
                    <label class="col-sm-3">Class</label><div class="col-sm-9">
            <select class="custom-select" name="class" required aria-required="true">
                    <option selected="selected" value="" disabled="disabled">select</option>
                    <?php foreach ($classes as $class): ?>  
                  <option value="<?= $class['class']; ?>"><?= $class['class']; ?></option>
                            <?php endforeach; ?></select>
        <?php  if (isset($error['class'])) {  echo "<span class='text-danger'>".$error['class']."</span>";  } ?>
                                                </div></div>
            <div class="form-group row"><label class="col-sm-3">Session</label>
                                                <div class="col-sm-9">
    <select class="custom-select" name="session" required aria-required="true"><?= $edsession; ?></select>
    <?php  if (isset($error['session'])) {  echo "<span class='text-danger'>".$error['session']."</span>";  } ?>
                                                </div></div>

                    <div class="form-group row"><label class="col-sm-3">Term</label>
                                                <div class="col-sm-9">
                                    <select class="custom-select" name="term" required aria-required="true">
                                                            <?= $gterm; ?>
                                                        </select>
            <?php  if (isset($error['term'])) {  echo "<span class='text-danger'>".$error['term']."</span>";  } ?>
                                                </div></div>
                    <div class="form-group row"><label class="col-sm-3">Select Subject:</label>
                                    <div class="col-sm-9">
                    <select class="custom-select" name="regsubject" required aria-required="true">
                    <option selected="selected" value="" disabled="disabled">select</option>
                    <?php foreach ($subs as $sub): ?>  
                  <option value="<?= $sub['subject']; ?>"><?= $sub['subject']; ?></option>
                                        <?php endforeach; ?></select>
                    <?php  if (isset($error['regsubject'])) {  echo "<span class='text-danger'>".$error['regsubject']."</span>";  } ?></div></div>

                <div class="form-actions row"><div class="offset-sm-3 col-md-9">
        <button type="submit" class="btn btn-primary" name="submit"> <i class="fa fa-check"></i> Submit</button>
                            </div></div></form></div></div>
                    <p>If all the students in a class are offering a particular subject, then use the above form to register them for the subject.</p>
                        </div>

            <div class="col-lg-6"><div class="card"><form method="post" name="form3">
            <div class="form-actions"><div class="row"> <div class="col-md-3">
            <select class="custom-select" name="checkclass" required aria-required="true">
                                            <?php foreach ($classes as $class): ?>  
                  <option value="<?= $class['class']; ?>"><?= $class['class']; ?></option>
                                        <?php endforeach; ?></select></div>
                                               
                                <div class="col-md-3">
    <select class="custom-select" name="checkgs" required aria-required="true"><?= $gsession; ?></select></div>                               <div class="col-md-3">
        <select class="custom-select" name="checkterm" required aria-required="true"><?= $gterm; ?></select></div>
                                <div class="col-md-3">
    <button type="submit" class="btn btn-dark btn-outline" name="checksubjects"> <i class="fa fa-check"></i> Check</button></div></div></div></form><hr>

                            <div class="p-3 mb-2 bg-primary text-white">
            REGISTERED SUBJECTS &amp; NO OF STUDENTS FOR <?= $cclass." ".strtoupper($cterm)." ".$csession; ?></div>
                            <div class="card-body"><table class="table table-striped">
                            <thead><tr><th>#</th><th>SUBJECT</th><th>NO OF STUDENTS REGISTERED</th></tr></thead>
                                        <tbody> <?php  $n=0;
                                    foreach ($returned as $key=>$value){  $n++; ?>              
                            <tr><th scope="row"><?= $n; ?></th><td><?=  $key; ?></td><td><?=  $value; ?></td></tr>
                                           <?php } ?>
                                        </tbody></table>
                               </div>
                        </div>
                     </div>
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>