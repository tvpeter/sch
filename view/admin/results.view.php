<?php require 'adminheader.php';  
?>            
<div class="container-fluid">
                      <div class="row">
                    
                       <div class="col-lg-10">
                        <div class="card">
                            
                            <div class="card-body">
                                <div style="width:820px; font-size: 12px;">
                                    <table style="font-weight: lighter; font-family:Courier NEW; margin: auto;" align="center" class="table table-condensed table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th colspan="4">STUDENT NAME: <?= $name; ?></th>
                                                 <th colspan="3">CLASS:<?= $gclass; ?></th>
                                                  <th colspan="3">ADMISSION NO: <?= $gadmno; ?></th>                                                                           
                                            </tr>
                                      
                                      
                                            <tr>
                                                
                                             
                                                <th colspan="4">SESSION: <?= $gsession; ?></th>
                                                <th colspan="3">TERM: <?= $gterm; ?></th>
                                                <th colspan="3">ATTENDANCE: <?php if($studentAtt){ echo $present; }?></th>                                                
                                            </tr>
                                            <tr>
                                                 <th colspan="3">GENDER: <?= $sex; ?></th> 
                                               <th colspan="3">DOB: <?= $dob; ?></th>
                                               <th colspan="4">TOTAL DAYS: <?php if($studentAtt){ echo $total; } ?></th>
                                               </tr>                                     
                                            <tr>
                                                <th>SUBJECTS</th>
                                                <th>CA TOTAL <br>(30MKS)</th>
                                                <th>EXAMS <br>(70MKS)</th>
                                                <th>TOTAL <br>(100MKS)</th>
                                                <th>POS</th>
                                                <th>CLASS <br>AVERAGE</th>
                                                <th>LOWEST</th>
                                                <th>HIGHEST</th>
                                                <th>GRADE</th>
                                                <th>REMARK</th>
                                            </tr>
                                            <?php foreach ($studentrs as $rs) {
                                                extract($rs);
                                                $grade = $query->showGrade($total)[0];
                                                $remark = $query->showGrade($total)[1];
                                             ?>
                                            <tr>
                                                <th><?= $subj; ?></th>
                                                <th><?= $test; ?></th>
                                                <th><?= $exam; ?></th>
                                                <th><?= $total; ?></th>
                                                <th><?= $subjpos; ?></th>
                                                <th><?= round($classavg, 2); ?></th>
                                                <th><?= $min; ?></th>
                                                <th><?= $maxi; ?></th>
                                                <th><?= $grade; ?></th>
                                                <th><?= $remark; ?></th>
                                            </tr>  
                                            <?php } ?>
                                            <tr>
       <th colspan="10">KEY TO GRADES: A1(EXCELLENT)=80-100%;&nbsp; B2(VERY GOOD)=75-79%; &nbsp; B3(GOOD)=65-69%; &nbsp;C4(CREDIT)=60-64%; &nbsp;
       C5(CREDIT)=55-59%;&nbsp;C6(CREDIT)=50-54%; &nbsp;D7(PASS)=45-49%;&nbsp;E8(PASS)=40-44%;&nbsp;F9(FAIL)=0-39%
                    </th></tr>
                    <tr>
     <th align="left" colspan="3">TOTAL SUBJECTS:&nbsp;<?php echo htmlentities($subjectsTotal); ?></th>
     <th align="left" colspan="3">TOTAL MARKS:&nbsp;</th>
     <th align="left" colspan="4">MARKS OBTAINED:&nbsp;<?php echo htmlentities($gtotal); ?></th>
        </tr>
 <tr><th colspan="2">AVERAGE:&nbsp;<?php echo round($avg, 2); ?></th>
          <th colspan="3">POS:&nbsp;<?php echo $pos; ?>&nbsp;OUT OF&nbsp;</th>
          <th colspan="2">ANALYSIS:&nbsp;</th>
          <th colspan="3">TERM STARTED:&nbsp;</th>
          </tr>


        <tr><th colspan="3"><b>AFFECTIVE DOMAIN</b></th>
            <th  colspan="3" ><b>PSYCHOMOTOR DOMAIN</b></th>
            <th colspan='2'>TERM ENDED:&nbsp;<?php ?></th>
            <th colspan="2" align="center">RESUMPTION:<?php  ?></th></tr>

       <tr><th colspan="2">BEHAVIOUR</th>
        <th >GRADING</th>
        <th  colspan="2">ACTIVITY</th><th>GRADING</th>
       <th colspan="5" align="center" bgcolor="#F5F5F5" rowspan="13">
       


       <table border='1' width='100%' style="font-family:Courier NEW">
       <tr><th colspan='2' align='center'><strong>NEXT TERM SCHOOL FEES</strong></th></tr>
       <tr><th><strong>ITEM</strong></th><th><strong>AMOUNT</strong></th></tr>
       <?php  
//        if ($fTuition > 0) {  echo "<tr><th>TUITION</th><th>$fTuition</th></tr>"; }
//        if ($fDev > 0) {  echo "<tr><th>DEVELOPMENT LEVY</th><th>$fDev</th></tr>"; }
//        if ($fMedical > 0) {  echo "<tr><th>MEDICAL LEVY</th><th>$fMedical</th></tr>"; }
//         if ($fExams > 0) {  echo "<tr><th>EXAMINATIONS </th><th>$fExams</th></tr>"; }
//           if ($fcard > 0) {  echo "<tr><th>ID CARD (SS ONE ONLY) </th><th>$fcard</th></tr>"; }
//             if ($flocker > 0) {  echo "<tr><th>LOCKER </th><th>$flocker</th></tr>"; }
//             if ($fbook > 0) {  echo "<tr><th>C.A. BOOKLET</th><th>$fbook</th></tr>"; }
//               if ($flevy> 0) {  echo "<tr><th>EDUCATION LEVY </th><th>$flevy</th></tr>"; }
//               echo "<tr><th><strong>TOTAL</strong></th><th><strong>$total1</strong></th></tr>";
//                 echo "<tr><th colspan='2'>The above amount is to be paid to Diamond Bank
// Account no: 0020993956.</th></tr>";
       ?>

       </table>



       <table border='1' width='100%' style="font-family:Courier NEW">
     <tr><th><strong>ITEM</strong></th><th><strong>AMOUNT</strong></th></tr>
       <?php  if ($fPta > 0) {  echo "<tr><th>PTA</th><th>$fPta</th></tr>"; }
       if ($fLesson > 0) {  echo "<tr><th>EXTRA CLASS</th><th>$fLesson</th></tr>"; }
       if ($fUtility > 0) {  echo "<tr><th>UTILITY</th><th>$fUtility</th></tr>"; }
        if ($fCathe > 0) {  echo "<tr><th>CATHEDRATICUM </th><th>$fCathe</th></tr>"; }
          if ($fSports > 0) {  echo "<tr><th>SPORTS</th><th>$fSports</th></tr>"; }
            if ($fparty > 0) {  echo "<tr><th>CHRISMAS PARTY</th><th>$fparty</th></tr>"; }
            if ($fDvd > 0) {  echo "<tr><th>DVD </th><th>$fDvd</th></tr>"; }
              echo "<tr><th><strong>TOTAL</strong></th><th><strong>$total2</strong></th></tr>";
                echo "<tr><th colspan='2'>Above amount to be paid in the sch.</th></tr>";
       ?>

       </table>
 <?php }else{ echo "SCHOOL FEES HAS NOT BEEN PUBLISHED. CONTACT FINANCE DEPARTMENT FOR DETAIALS"; } ?>

       </th></tr>

            <tr><th  colspan="2">AEST. APPREC.</th><th align='center'><?php echo htmlentities($aesth); ?></th><th align="left" colspan="2">GAMES</th><th align='center'><?php echo htmlentities($games); ?></th></tr>

             <tr><th colspan="2">CREATIVITY</th><th align='center'><?php echo $creativity; ?></th><th colspan="2">SPORTS</th><th align='center'><?php echo htmlentities($sports); ?></th></tr>

            <tr><th colspan="2">HONESTY</th><th align='center'><?php echo htmlentities($honesty); ?></th><th  colspan="2">HANDLING TOOLS</th><th align='center'><?php echo $handle; ?></th></tr>

            <tr><th colspan="2">INITIATIVE</th><th align='center'><?php echo htmlentities($initiative); ?></th><th  colspan="2">HANDWRITING</th><th align='center'><?php echo $handle; ?></th></tr>

            <tr><th colspan="2">LEADERSHIP ROLE</th><th align='center'><?php echo htmlentities($leadership); ?></th><th " colspan="2" >COMMUNICATION /th><th align='center'><?php echo htmlentities($communication); ?></th></tr>

            <tr><th colspan="2">NEATNESS</th><th align='center'><?php echo $neatness; ?></th><th  colspan="2">PAINTING AND DRAWING</th><th align='center'><?php echo htmlentities($painting); ?></th></tr>


            <tr><th colspan="2">OBEDIENCE</th><th align='center'><?php echo htmlentities($obedience); ?></th><th  colspan="2"> MUSICAL SKILL </th><th align='center'><?php echo htmlentities($painting); ?></th></tr>

            <tr><th colspan="2">POLITENESS</th><th align='center'><?php echo $politeness; ?></th><th colspan="2">CRAFT</th><th align='center'><?php echo $craft; ?></th></tr>


    <tr><th colspan="2">PUNCTUALITY</th><th align='center'><?php echo htmlentities($punctuality); ?></th><th colspan="2">GYMNASTICS</th><th align='center'><?php echo htmlentities($painting); ?></th></tr>

            <tr><th colspan="2">SELF-CONTROL</th><th align='center'><?php echo htmlentities($scontrol); ?></th><th align="center"  colspan="3"> <strong>KEY TO RATINGS</strong></th></tr>

            <tr><th colspan="2">SENSE OF RESPONSIBILITY</th><th align='center'><?php echo htmlentities($responsibility); ?></th><th colspan="2">A(EXCELLENT)</th><th> &#8805 80%</th></tr>

           <tr><th colspan="2">SOCIABILITY</th><th align='center'><?php echo htmlentities($sociability); ?></th><th colspan="2">B(VERY GOOD)</th><th>60-79%</th></tr>

           <tr><th colspan="2">ORG. ABILITY</th><th align='center'><?php echo htmlentities($organised); ?></th><th align="left">C(GOOD)</th><th>50-59%</th><th colspan="6">FORM MASTERS' REMARKS:&nbsp;<em><?php echo htmlentities($tcomment); ?></em></th> </tr>

           <tr><th colspan="2">PERSEVERANCE</th><th align='center'><?php echo htmlentities($persevere); ?></th><th align="left" >D(FAIR)</th><th>40-49%</th><th colspan="6">SIGNATURE AND DATE:&nbsp;</th></tr>

           <tr ><th colspan="2">COOP. SPIRIT</th><th align='center'><?php echo htmlentities($cooperate); ?></th><th align="left" >E(POOR)</th><th>&lt;40%</th><th colspan="6"><strong>PRINCIPAL'S REMARKS:</strong>&nbsp;</th></tr>

     <tr ><th colspan="10">DATE AND SIGNATURE:</th></tr>
       <tr><th colspan="10" align="center"><b>PRINCIPAL:&nbsp;<?php echo 'REV. SR. STELLA AKPAN ' ?></b> </th></tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
             </div>
           
           <?php require 'adminfooter.php'; 
           ?>