            
<div class="container-fluid" align="center">
                      <div class="row">
                    
                       <div class="col-lg-12">
                        <div class="card">
                            
               <div class="card-body">
        <div style="width:835px; font-size: 12px; font-family: 'Courier New', Courier, monospace;">
            <table border="1">
              <tr>
        <td align="center"><img src="images/logo1.png" width="100" height="75"/></td>
   <td align="center" colspan="9"><strong>ST. CATHERINE'S COLLEGE</strong></font><br><font face="Palatino Linotype, Book Antiqua, Palatino, serif">P.O. Box 626 Ogoja<br /> Cross River State</font><br><font face="Courier New, Courier, monospace"><tt>http://www.sccogoja.com</tt></font><br><b>STUDENTS RESULT</b></td>
   <td><div style="width:90px; height:90px;"><?php if (!empty($passport)){  echo "<img src='passports/$passport' width='90' height='85'>";  } ?></div></td>
   </tr>
            <tr>
             <td colspan="5">STUDENT NAME: <?= $name; ?></td>
               <td colspan="3">ADMISSION NO: <?= $gadmno; ?></td>  
               <td colspan="3">DOB: <?= $dob; ?></td></tr>
                <tr><td colspan="5">SESSION: <?= $gsession; ?></td>
              <td colspan="3">CLASS:<?= $gclass; ?></td>
                <td colspan="3">GENDER: <?= strtoupper($sex); ?></td> </tr>                                                                
            <tr>
                <td>SUBJECTS</td>
                <td align="center">TERM I</td>
                <td align="center">TERM <br> II</td>
                <td align="center">TERM III</td>
                <td align="center">AVERAGE</td>
                <td align="center">POSITION</td>
                <td align="center">CLASS AVERAGE</td>
                <td align="center">LOWEST</td>
                <td align="center">HIGHEST</td>
                <td >GRADE</td>
                 <td >REMARK</td>
            </tr>
<?php foreach ($studentrs as $rs) {                 extract($rs);
                $grade = $query->showGrade($avg)[0];
                $remark = $query->showGrade($avg)[1];
                $s = $query->combStats($gclass, $gsession, $subj);
                extract($s);

                             ?>
            <tr>
                <td><?= $subj; ?></td>
                <td align="center"><?= $term1; ?></td>
                <td align="center"><?= $term2; ?></td>
                <td align="center"><?= $term3; ?></td>
                <td align="center"><?= round($avg, 2); ?></td>
            <td align="center"><?= $position; ?></td>
                <td align="center"><?= round($cmbavg, 2); ?></td>
                <td align="center"><?= $cmbmin; ?></td>
                <td align="center"><?= $cmbmax; ?></td>
                 <td><?= $grade; ?></td>
                <td><?= $remark; ?></td>
            </tr>  
            <?php } ?>
            <tr>
       <td colspan="11" style="font-size: 12px;">KEY TO GRADES: A1(EXCELLENT)=80-100%;&nbsp; B2(VERY GOOD)=75-79%; &nbsp; B3(GOOD)=65-69%; &nbsp;C4(CREDIT)=60-64%; &nbsp;
       C5(CREDIT)=55-59%;&nbsp;C6(CREDIT)=50-54%; &nbsp;D7(PASS)=45-49%;&nbsp;E8(PASS)=40-44%;&nbsp;F9(FAIL)=0-39% </td></tr>
                    
 <tr><td colspan="3">AVERAGE:&nbsp;<?php echo round($avg, 2); ?></td>
    <td colspan="4" align="center">POSITION:&nbsp;<?= $pos; ?>&nbsp;OUT OF&nbsp;<?= $totalStudents; ?></td>
          <td colspan="4">ANALYSIS:&nbsp;<?php $analysis=""; if ($avg>=50){$analysis='PASSED';} else {   $analysis='FAILED'; } echo $analysis; ?></td></tr>

<tr bgcolor="#EEE8CD"><td colspan="11" align="center"> <?php if(!$newclass){ echo "STUDENT YET TO BE PROMOTED"; }else{ echo "PROMOTED TO ".$newclass['class']. " ON DATE: ".$newclass['dater'] ; } ?></td></tr>

        <tr><td colspan="6" align="center"><b>AFFECTIVE DOMAIN</b></td>
        <td  colspan="3" align="center"><b>PSYCHOMOTOR DOMAIN</b></td>
      <td colspan="2" align="center"></td></tr>

       <tr><td colspan="2">BEHAVIOUR</td> <td >GRADING</td>
        <td  colspan="2">BEHAVIOUR</td><td>GRADING</td>
       <td colspan="2">ACTIVITY</td><td>GRADING</td><td colspan="2">KEY TO RATINGS</td></tr>

            <tr><td colspan="2">AEST. APPREC.</td><td><?php if(!empty($aestd)){echo htmlentities($aestd); }?></td><td colspan="2">SELF-CONTROL</td><td><?php if(!empty($scontrol)){ echo htmlentities($scontrol);} ?></td><td colspan="2">GAMES</td><td><?php if(!empty($games)){ echo htmlentities($games); }?></td><td> &#8805 80%</td><td>A(EXCELLENT)</td></tr>

            <tr><td colspan="2">CREATIVITY</td><td><?php if(!empty($creativity)){ echo $creativity;} ?></td>
              <td colspan="2">SENSE OF RESPONSIBILITY</td><td><?php if (!empty($responsibility)) { echo htmlentities($responsibility); } ?></td><td colspan="2">SPORTS</td><td><?php if(!empty($sport)){ echo htmlentities($sport);} ?></td><td>60-79%</td><td>B(VERY GOOD)</td></tr>

            <tr><td colspan="2">HONESTY</td><td><?php if(!empty($honesty)){ echo htmlentities($honesty);} ?></td><td colspan="2">SOCIABILITY</td><td><?php if(!empty($sociability)){echo htmlentities($sociability); } ?></td><td  colspan="2">HANDLING TOOLS</td><td><?php if(!empty($handle)){echo $handle;} ?></td><td>50-59%</td><td>C(GOOD)</td></tr>

            <tr><td colspan="2">INITIATIVE</td><td><?php if(!empty($initiative)){echo htmlentities($initiative);} ?></td><td colspan="2">ORG. ABILITY</td><td><?php if(!empty($organised)){echo htmlentities($organised); } ?></td><td  colspan="2">HANDWRITING</td><td><?php if(!empty($handle)){ echo $handle;} ?></td><td>40-49%</td><td>D(FAIR)</td></tr>

            <tr><td colspan="2">LEADERSHIP ROLE</td><td><?php if(!empty($leadership)){echo htmlentities($leadership);} ?></td><td colspan="2" >COMMUNICATION </td><td><?php if(!empty($communication)){echo htmlentities($communication);} ?></td><td  colspan="2"> MUSICAL SKILL </td><td><?php if(!empty($painting)){echo htmlentities($painting);} ?></td><td>&lt;40%</td><td>E(POOR)</td></tr>

            <tr><td colspan="2">NEATNESS</td><td><?php if(!empty($neatness)){echo $neatness; }?></td>
              <td  colspan="2">PAINTING &amp; DRAWING</td><td><?php if(!empty($painting)){echo htmlentities($painting);} ?></td><td colspan="2">CRAFT</td><td><?php if(!empty($craft)){echo $craft; }?></td><td colspan="2"></td></tr>


            <tr><td colspan="2">OBEDIENCE</td><td><?php if(!empty($obedience)){echo htmlentities($obedience); } ?></td><td colspan="2">PERSEVERANCE</td><td><?php if(!empty($persevere)){ echo htmlentities($persevere); } ?></td><td colspan="5" class="text-left">FORM MASTERS' REMARKS:&nbsp;</td></tr>

            <tr><td colspan="2">POLITENESS</td><td><?php if(!empty($politeness)){echo $politeness; } ?></td>
              <td colspan="2" class="text-left">COOP. SPIRIT</td><td><?php if(!empty($cooperate)){echo htmlentities($cooperate); } ?></td><td colspan="5"><em><?php if(!empty($tcomment)){echo htmlentities($tcomment); } ?></em></td></tr>


    <tr><td colspan="2">PUNCTUALITY</td><td><?php if(!empty($punctuality)){echo htmlentities($punctuality); } ?></td><td colspan="2">GYMNASTICS</td><td><?php if(!empty($gymnastics)){echo htmlentities($gymnastics);} ?></td><td colspan="5" class="text-left">SIGNATURE AND DATE:&nbsp;</td></tr>

          <tr ><td colspan="11"><strong>PRINCIPAL'S REMARKS:</strong>&nbsp;</td></tr>

     <tr ><td colspan="6">DATE AND SIGNATURE:</td><td colspan="5" align="center"><b>PRINCIPAL:&nbsp;<?php echo 'REV. SR. STELLA AKPAN ' ?></b> </td></tr>
                 
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
             </div>
           
           