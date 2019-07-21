<?php require 'adminheader.php';  ?>            
<div class="container-fluid">
        <style type="text/css"> input {  text-align: right; }</style>
            <div class="row">
            <div class="col-lg-6">
                        <div class="card card-outline-info">
                    <div class="p-3 mb-2 bg-dark text-white">SELECT SECTION AND SET SCHOOL FEES FOR A TERM </div>
                    <form action="#" method="post" class="form-horizontal form-bordered">
                    <div class="row"><div class="col-md-12 text-center"><?php  if (isset($error['failure'])) {  echo "<span class='alert alert-danger'>".$error['failure']."</span>";  }
                        if (isset($_GET['msg'])) {  echo "<span>".$_GET['msg']."</span>";  }
                     ?></div></div>
                    <div class="row"><div class="col-md-6">
                     <label class="control-label">SESSION: </label>
                    <select class="custom-select" name="session" required aria-required="true">
                                     <?= $edsession; ?>       </select>
                  <?php  if (isset($error['session'])) {  echo "<span class='text-danger'>".$error['session']."</span>";  } ?></div> 

                    <div class="col-md-6"><label class="control-label">TERM: </label>
                    <select class="custom-select" name="term" required aria-required="true">
                        <?= $gterm; ?>                  </select>
                 <?php  if (isset($error['term'])) {  echo "<span class='text-danger'>".$error['term']."</span>";  } ?></div></div>   

                          <div class="row"> <div class="col-md-6">
                        <label class="control-label">TUITION </label>
    <input type="number"  required="required" name="tuition" class="form-control"> 
                    <?php  if (isset($error['tuition'])) {  echo "<span class='text-danger'>".$error['tuition']."</span>";  } ?></div>

                    <div class="col-md-6"><label class="control-label">PTA </label>
    <input type="number"  required="required" name="pta" class="form-control" value="0"> 
                   </div></div>   
                                     
                    <div class="row"><div class="col-md-6">
                     <label class="control-label">DEVELOPMENT LEVY: </label>
 <input type="number" class="form-control" required="required" name="dlevy" value="0"></div>  

                <div class="col-md-6"><label class="control-label">EXTRA LESSONS: </label>
<input type="number" class="form-control" required="required" name="elessons" value="0">   
                                </div>   </div>   

                    <div class="row"><div class="col-md-6">
                     <label class="control-label">MEDICAL LEVY:  </label>
     <input type="number" class="form-control" required="required" name="mlevy" value="0"> </div>

                    <div class="col-md-6"><label class="control-label">UTILITY </label>
    <input type="number" class="form-control" required="required" name="utility" value="0"> </div></div>

                    <div class="row"><div class="col-md-6"> <label class="control-label">EXAMS: </label>
     <input type="number" class="form-control" required="required" name="exams" value="0"> </div>  

                    <div class="col-md-6"><label class="control-label">CATHEDRATICUM: </label>
        <input type="number" class="form-control" required="required" name="cath" value="0"> 
                   </div></div>  
                                       
                      <div class="row"><div class="col-md-6">
                    <label class="control-label">ID CARDS (SS 1 Only): </label>
        <input type="number" class="form-control" required="required" name="idcard" value="0"></div>

                       <div class="col-md-6"><label class="control-label">SPORTS </label>
        <input type="number" class="form-control" required="required" name="sports" value="0"> 
                   </div></div>                     

                            <div class="row"><div class="col-md-6">
                            <label class="control-label">LOCKER: </label>
        <input type="number" class="form-control" required="required" name="locker" value="0"></div> 

                        <div class="col-md-6"><label class="control-label">CHRITMAS PARTY: </label>
        <input type="number" class="form-control" required="required" name="cparty" value="0"> 
                                                  </div>  </div>  
                                        
                               <div class="row">    <div class="col-md-6">
                               <label class="control-label">CONTINOUS ASSESSMENT </label>
        <input type="number" class="form-control" required="required" name="cabooklet" value="0"></div>

                                <div class="col-md-6"> <label class="control-label">DVD: </label>
        <input type="number" class="form-control" required="required" name="dvd" value="0"> </div>      </div> 

                        <div class="row"> <div class="col-md-6">
                                      <label class="control-label">EDUCATIONAL LEVY </label>
        <input type="number" class="form-control" required="required" name="elevy" value="0"> 
                    </div> -->

                    <div class="col-md-6">
                     <label class="control-label">SECTION: </label>
                    <select class="custom-select" name="section" required aria-required="true">
                        <option selected='selected' disabled='disabled' value=''> Select </option>                        
                        <option value='JS'>JSS</option> 
                        <option value='SS'>SSS</option> 

                                 </select>
                  <?php  if (isset($error['section'])) {  echo "<span class='text-danger'>".$error['section']."</span>";  } ?></div> 

                </div><br>

                      <div class="row"><div class="offset-sm-3 col-md-9">
    <button type="submit" class="btn btn-dark" name="submit"> <i class="fa fa-check"></i> Submit</button></div></div>
                                </form>
                          
                        </div>
                    </div>



                         <div class="col-lg-6">
                        <div class="card">
                <form method="post" name="form3">
                <div class="form-actions">
                <div class="row">
                <div class="col-md-12">
                <div class="row">
                <div class="col-md-3">
                <select class="custom-select" name="gsession" required aria-required="true">
                <?= $gsession; ?>
                </select>
                </div>
                                               
                <div class="col-md-3">
                <select class="custom-select" name="gterm" required aria-required="true">
                <?= $gterm; ?></select></div>

                <div class="col-md-3">
                    <select class="custom-select" name="sectn" required aria-required="true">
                        <option selected='selected' disabled='disabled' value=''> Section </option>                        
                        <option value='JS'>JSS</option> 
                        <option value='SS'>SSS</option> 
                                 </select>
                  <?php  if (isset($error['section'])) {  echo "<span class='text-danger'>".$error['section']."</span>";  } ?></div>

                    <div class="col-md-3">
    <button type="submit" class="btn btn-dark btn-outline" name="check"> <i class="fa fa-check"></i> Check</button>
                                                 </div>




                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            <div class="p-3 mb-2 bg-dark text-white">
                                <?php if(empty($feeDetails)){
                                    echo "SELECT SESSION AND TERM TO VIEW THE SCHOOL FEES DETAILS ";
                                }else{
                                    extract($feeDetails);
                                    echo "SCHOOL FEES FOR ".strtoupper($term)." $session";
                                ?>
                               
                            </div>
                            <div class="card-body" style="font-weight: bold">
                                    <table class="table table-striped">
                                    <thead><th>ITEM</th><th>AMOUNT</th></thead>
                                        <tbody>                                                              
    <?php    $total = $tuition+$dev+$medical+$exams+$idcard+$locker+$cbooklet+$edulevy +$pta+$lesson+$utility+$cathe+$sports+$party+$dvd;  
       
    if ($tuition > 0) { echo "<tr><td class='text-primary'>TUITION</td><td class='text-primary'>$tuition</td></tr>"; }
if ($dev > 0) {  echo "<tr><td class='text-primary'>DEVELOPMENT LEVY</td><td class='text-primary'>$dev</td></tr>"; }
if ($medical > 0) {  echo "<tr><td class='text-primary'>MEDICAL LEVY</td><td class='text-primary'>$medical</td></tr>"; }
 if ($exams > 0) {  echo "<tr><td class='text-primary'>EXAMINATIONS </td><td class='text-primary'>$exams</td></tr>"; }
   if ($idcard > 0) {  echo "<tr><td class='text-primary'>ID CARD (SS ONE ONLY) </td><td class='text-primary'>$idcard</td></tr>"; }
     if ($locker > 0) {  echo "<tr><td class='text-primary'>LOCKER </td><td class='text-primary'>$locker</td></tr>"; }
     if ($cbooklet > 0) {  echo "<tr><td class='text-primary'>C.A. BOOKLET</td><td class='text-primary'>$cbooklet</td></tr>"; }
       if ($edulevy> 0) {  echo "<tr><td class='text-primary'>EDUCATION LEVY </td><td class='text-primary'>$edulevy</td></tr>"; }
if ($pta > 0) {  echo "<tr><td class='text-primary'>PTA</td><td class='text-primary'>$pta</td></tr>"; }
if ($lesson > 0) {  echo "<tr><td class='text-primary'>EXTRA LESSONS</td><td class='text-primary'>$lesson</td></tr>"; }
if ($utility > 0) {  echo "<tr><td class='text-primary'>UTILITY</td><td class='text-primary'>$utility</td></tr>"; }
 if ($cathe > 0) {  echo "<tr><td class='text-primary'>CATHEDRATICUM </td><td class='text-primary'>$cathe</td></tr>"; }
   if ($sports > 0) {  echo "<tr><td class='text-primary'>SPORTS</td><td class='text-primary'>$sports</td></tr>"; }
     if ($party > 0) {  echo "<tr><td class='text-primary'>CHRISMAS PARTY</td><td class='text-primary'>$party</td></tr>"; }
     if ($dvd > 0) {  echo "<tr><td class='text-primary'>DVD </td><td class='text-primary'>$dvd</td></tr>"; }
       echo "<tr><td class='text-primary'><strong>TOTAL</strong></td><td class='text-primary'><strong>".number_format($total)."</strong></td></tr>";
         echo "<tr><td colspan='2'>Amount to be paid in the bank</td></tr>";
                                        ?> </tbody>
                <tfoot><td colspan='2' align="center"><a href="delete.php?fsession=<?= $session; ?>&fterm=<?= $term; ?>" class="btn btn-danger m-b-10 m-l-5"><i class="fa fa-trash"></i>Delete</a></td></tfoot>  
                                       
                                    </table>
                                <?php } ?>
                                
                            </div>
                        </div>
                     </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; ?>