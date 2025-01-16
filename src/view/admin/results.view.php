            <div class="container-fluid" align="center">
              <div class="row">

                <div class="col-lg-12">
                  <div class="card">

                    <div class="card-body">
                      <div style="width:835px; font-size: 12px; font-family: 'Courier New', Courier, monospace;">
                        <table border="1">
                          <tr>
                            <td align="center" width="18%"><img src="img/scco.png" width="100" height="75" /></td>
                            <td align="center" colspan="9"><strong>ST. CATHERINE'S COLLEGE</strong></font><br>
                              <font face="Palatino Linotype, Book Antiqua, Palatino, serif">P.O. Box 626 Ogoja<br /> Cross River State</font><br>
                              <font face="Courier New, Courier, monospace"><tt>http://www.sccogoja.com</tt></font><br><b>STUDENTS RESULT</b>
                            </td>
                            <td>
                              <div style="width:90px; height:90px;"><?php if (!empty($passport)) {
                                                                      echo "<img src='passports/$passport' width='90' height='85'>  ";
                                                                    } ?></div>
                            </td>
                          </tr>

                          <tr>
                            <td colspan="5">STUDENT NAME: <?= $name; ?></td>
                            <td colspan="3">CLASS:<?= $gclass; ?></td>
                            <td colspan="3">ADMISSION NO: <?= $gadmno; ?></td>
                          </tr>
                          <tr>
                            <td colspan="2">GENDER: <?= strtoupper($sex); ?></td>
                            <td colspan="3">DOB: <?= $dob; ?></td>
                            <td colspan="3">SESSION: <?= $gsession; ?></td>
                            <td colspan="3">TERM: <?= strtoupper($gterm); ?></td>
                          </tr>
                          <tr>
                            <td colspan="2">TOTAL DAYS: <?php if ($studentAtt) {
                                                          echo $total;
                                                        } ?></td>

                            <td colspan="2">ATTENDANCE: <?php if ($studentAtt) {
                                                          echo $present;
                                                        } ?></td>
                            <td colspan="4">TERM STARTED:&nbsp;<?php if (!empty($termst)) {
                                                                  echo htmlentities($termst);
                                                                }   ?></td>
                            <td colspan="3">TERM ENDED: <?php if (!empty($terme)) {
                                                          echo htmlentities($terme);
                                                        } ?></td>
                          </tr>

                          <tr>
                            <td colspan="2">SUBJECTS</td>
                            <td align="center" style="font-size: 11.5px;">CA TOTAL <br>(30MKS)</td>
                            <td align="center">EXAMS <br>(70MKS)</td>
                            <td align="center">TOTAL <br>(100MKS)</td>
                            <td align="center">POS</td>
                            <td align="center">CLASS <br>AVERAGE</td>
                            <td align="center">LOWEST</td>
                            <td align="center">HIGHEST</td>
                            <td align="center">GRADE</td>
                            <td align="center">REMARK</td>
                          </tr>
                          <?php foreach ($studentrs as $rs) {
                            extract($rs);
                            $grade = $query->showGrade($total)[0];
                            $remark = $query->showGrade($total)[1];
                            if ($subj == "AGRICULTURAL SCIENCE") {
                              $subj = "AGRIC. SCIENCE";
                            } ?>
                            <tr>
                              <td colspan="2"><?= $subj; ?></td>
                              <td align="center"><?= $test; ?></td>
                              <td align="center"><?= $exam; ?></td>
                              <td align="center"><?= $total; ?></td>
                              <td align="center"><?= $subjpos; ?></td>
                              <td align="center"><?= round($classavg, 2); ?></td>
                              <td align="center"><?= $min; ?></td>
                              <td align="center"><?= $maxi; ?></td>
                              <td align="center"><?= $grade; ?></td>
                              <td><?= $remark; ?></td>
                            </tr>
                          <?php } ?>
                          <tr>
                            <td colspan="11" style="font-size: 12px;">KEY TO GRADES: A1(EXCELLENT)=80-100%;&nbsp; B2(VERY GOOD)=75-79%; &nbsp; B3(GOOD)=65-69%; &nbsp;C4(CREDIT)=60-64%; &nbsp;
                              C5(CREDIT)=55-59%;&nbsp;C6(CREDIT)=50-54%; &nbsp;D7(PASS)=45-49%;&nbsp;E8(PASS)=40-44%;&nbsp;F9(FAIL)=0-39%
                            </td>
                          </tr>
                          <tr>
                            <td colspan="4">TOTAL SUBJECTS:&nbsp;<?php echo htmlentities($subjectsTotal); ?></td>
                            <td colspan="3">TOTAL MARKS:&nbsp; <?php echo htmlentities($subjectsTotal * 100); ?></td>
                            <td colspan="4">MARKS OBTAINED:&nbsp;<?php echo htmlentities($gtotal); ?></td>
                          </tr>
                          <tr>
                            <td colspan="3">AVERAGE:&nbsp;<?php echo round($avg, 2); ?></td>
                            <td colspan="4" align="center">POSITION:&nbsp;<?php echo $query->position($position); ?>&nbsp;OUT OF&nbsp;<?= $totalStudents; ?></td>
                            <td colspan="4">ANALYSIS:&nbsp;<?php $analysis = "";
                                                            if ($avg >= 50) {
                                                              $analysis = 'PASSED';
                                                            } else {
                                                              $analysis = 'FAILED';
                                                            }
                                                            echo $analysis; ?></td>
                          </tr>
                          <tr>
                            <td colspan="3" align="center"><b>AFFECTIVE DOMAIN</b></td>
                            <td colspan="3" align="center"><b>PSYCHOMOTOR DOMAIN</b></td>


                            <td colspan="5" align="center">NEXT TERM STARTS:<?php if (!empty($nextterm)) {
                                                                              echo
                                                                              htmlentities($nextterm);
                                                                            }   ?></td>
                          </tr>

                          <tr>
                            <td colspan="2">BEHAVIOUR</td>
                            <td>GRADING</td>
                            <td colspan="2">ACTIVITY</td>
                            <td>GRADING</td>
                            <td colspan="5"></td>
                          </tr>
                          <!-- <td colspan="5" align="center" bgcolor="#F5F5F5" rowspan="13"> -->

                          <?php
                          // if ($fees) {

                          //  $total =$tuition+$dev+$medical+$exams+ $idcard + $locker + $cbooklet + $edulevy +$pta+$lesson+$utility+$cathe+$sports+$dvd+$party;
                          ?>


                          <!--  <table border='1' width='100%' style="font-family:Courier NEW">
       <tr><td colspan='2' align="center"><strong>NEXT TERM SCHOOL FEES</strong></td></tr>
       <tr><td ><strong>Fees to be paid in the bank</strong></td><td ><strong>AMOUNT</strong></td></tr>
       <tr><td colspan='2' >Bank Name: 0020993956.</td></tr>
       <tr><td colspan='2' >Bank Account number: 0020993956.</td></tr>
       <tr><td ><strong>Fees to be paid in School</strong></td><td ><strong>AMOUNT</strong></td></tr>
     </table> -->

                          <?php
                          // if ($tuition > 0) {  echo "<tr><td >TUITION</td><td >$tuition</td></tr>"; }

                          // if ($tuition > 0) {  echo "<tr><td >TUITION</td><td >$tuition</td></tr>"; }
                          //   if ($dev > 0) {  echo "<tr><td >DEVELOPMENT LEVY</td><td >$dev</td></tr>"; }
                          //   if ($medical > 0) {  echo "<tr><td >MEDICAL</td><td >$medical</td></tr>"; }
                          //    if ($exams > 0) {  echo "<tr><td >EXAMINATIONS </td><td >$exams</td></tr>"; }
                          //      if ($idcard > 0) {  echo "<tr><td >ID CARD (SS ONE ONLY) </td><td >$idcard</td></tr>"; }
                          //        if ($locker > 0) {  echo "<tr><td >LOCKER </td><td >$locker</td></tr>"; }
                          //        if ($cbooklet > 0) {  echo "<tr><td >CONTINUOUS ASSESSMENT</td><td >$cbooklet</td></tr>"; }
                          //          if ($edulevy> 0) {  echo "<tr><td >EDUCATION LEVY </td><td >$edulevy</td></tr>"; }

                          //    if ($pta > 0) {  echo "<tr><td >PTA</td><td >$pta</td></tr>"; }
                          //   if ($lesson > 0) {  echo "<tr><td >EXTRA CLASS</td><td >$lesson</td></tr>"; }
                          //   if ($utility > 0) {  echo "<tr><td >UTILITY</td><td >$utility</td></tr>"; }
                          //    if ($cathe > 0) {  echo "<tr><td >CATHEDRATICUM </td><td >$cathe</td></tr>"; }
                          //      if ($sports > 0) {  echo "<tr><td >SPORTS</td><td >$sports</td></tr>"; }
                          //        if ($party > 0) {  echo "<tr><td >CHRISTMAS PARTY</td><td >$party</td></tr>"; }
                          //        if ($dvd > 0) {  echo "<tr><td >DVD </td><td >$dvd</td></tr>"; }
                          //   echo "<tr><td ><strong>TOTAL</strong></td><td ><strong>N".number_format($total)."</strong></td></tr>";
                          // }else{ echo "SCHOOL FEES HAS NOT BEEN PUBLISHED. CONTACT FINANCE DEPARTMENT FOR DETAILS"; }

                          ?>

                          <!-- </td></tr> -->

                          <tr>
                            <td colspan="2">AEST. APPREC.</td>
                            <td><?php if (!empty($aestd)) {
                                  echo htmlentities($aestd);
                                } ?></td>
                            <td class="text-left" colspan="2">GAMES</td>
                            <td><?php if (!empty($games)) {
                                  echo htmlentities($games);
                                } ?></td>
                            <td colspan="5" align="center"><strong>NEXT TERM SCHOOL FEES</strong></td>
                          </tr>

                          <tr>
                            <td colspan="2">CREATIVITY</td>
                            <td><?php if (!empty($creativity)) {
                                  echo $creativity;
                                } ?></td>
                            <td colspan="2">SPORTS</td>
                            <td><?php if (!empty($sport)) {
                                  echo htmlentities($sport);
                                } ?></td>
                            <?php if ($fees) { ?>

                              <td colspan="4"> Fees to be paid in School</td>
                              <td><?= $pis; ?></td>
                            <?php } else {
                              echo "<td colspan='5' align='center'>The School fees for next term has not</td>";
                            } ?>
                          </tr>

                          <tr>
                            <td colspan="2">HONESTY</td>
                            <td><?php if (!empty($honesty)) {
                                  echo htmlentities($honesty);
                                } ?></td>
                            <td colspan="2">HANDLING TOOLS</td>
                            <td><?php if (!empty($handle)) {
                                  echo $handle;
                                } ?></td>
                            <?php if ($fees) { ?>

                              <td colspan="4">Fees to be paid in the Bank</td>
                              <td><?= $pib; ?></td>
                            <?php } else {
                              echo "<td colspan='5'> been published. Bank details:</td>";
                            } ?>

                          </tr>

                          <tr>
                            <td colspan="2">INITIATIVE</td>
                            <td><?php if (!empty($initiative)) {
                                  echo htmlentities($initiative);
                                } ?></td>
                            <td colspan="2">HANDWRITING</td>
                            <td><?php if (!empty($handle)) {
                                  echo $handle;
                                } ?></td>
                            <td colspan="5">Bank Name: Access Bank Plc.</td>

                          </tr>

                          <tr>
                            <td colspan="2">LEADERSHIP ROLE</td>
                            <td><?php if (!empty($leadership)) {
                                  echo htmlentities($leadership);
                                } ?></td>
                            <td colspan="2">COMMUNICATION </td>
                            <td><?php if (!empty($communication)) {
                                  echo htmlentities($communication);
                                } ?></td>
                            <td colspan="5">Bank Account Number: 0020993956</td>

                          </tr>

                          <tr>
                            <td colspan="2">NEATNESS</td>
                            <td><?php if (!empty($neatness)) {
                                  echo $neatness;
                                } ?></td>
                            <td colspan="2">PAINTING &amp; DRW.</td>
                            <td><?php if (!empty($painting)) {
                                  echo htmlentities($painting);
                                } ?></td>
                            <td align="center" colspan="5"></td>
                          </tr>


                          <tr>
                            <td colspan="2">OBEDIENCE</td>
                            <td><?php if (!empty($obedience)) {
                                  echo htmlentities($obedience);
                                } ?></td>
                            <td colspan="2"> MUSICAL SKILL </td>
                            <td><?php if (!empty($painting)) {
                                  echo htmlentities($painting);
                                } ?></td>
                            <td align="center" colspan="5"> <strong>KEY TO RATINGS</strong></td>
                          </tr>

                          <tr>
                            <td colspan="2">POLITENESS</td>
                            <td><?php if (!empty($politeness)) {
                                  echo $politeness;
                                } ?></td>
                            <td colspan="2">CRAFT</td>
                            <td><?php if (!empty($craft)) {
                                  echo $craft;
                                } ?></td>
                            <td colspan="3">A(EXCELLENT)</td>
                            <td colspan="2"> &#8805 80%</td>
                          </tr>


                          <tr>
                            <td colspan="2">PUNCTUALITY</td>
                            <td><?php if (!empty($punctuality)) {
                                  echo htmlentities($punctuality);
                                } ?></td>
                            <td colspan="2">GYMNASTICS</td>
                            <td><?php if (!empty($gymnastics)) {
                                  echo htmlentities($gymnastics);
                                } ?></td>
                            <td colspan="3">B(VERY GOOD)</td>
                            <td colspan="2">60-79%</td>
                          </tr>

                          <tr>
                            <td colspan="2">SELF-CONTROL</td>
                            <td><?php if (!empty($scontrol)) {
                                  echo htmlentities($scontrol);
                                } ?></td>
                            <td colspan="2">ORG. ABILITY</td>
                            <td><?php if (!empty($organised)) {
                                  echo htmlentities($organised);
                                } ?></td>
                            <td colspan="3">C(GOOD)</td>
                            <td colspan="2">50-59%</td>
                          </tr>

                          <tr>
                            <td colspan="2">SENSE OF RESP.</td>
                            <td><?php if (!empty($responsibility)) {
                                  echo htmlentities($responsibility);
                                } ?></td>
                            <td colspan="2">PERSEVERANCE</td>
                            <td><?php if (!empty($persevere)) {
                                  echo htmlentities($persevere);
                                } ?></td>
                            <td colspan="3">D(FAIR)</td>
                            <td colspan="2">40-49%</td>
                          </tr>

                          <tr>
                            <td colspan="2">SOCIABILITY</td>
                            <td><?php if (!empty($sociability)) {
                                  echo htmlentities($sociability);
                                } ?></td>
                            <td colspan="2" class="text-left">COOP. SPIRIT</td>
                            <td><?php if (!empty($cooperate)) {
                                  echo htmlentities($cooperate);
                                } ?></td>
                            <td colspan="3">E(POOR)</td>
                            <td colspan="2">&lt;40%</td>
                          </tr>

                          <tr>
                            <td colspan="11"><strong>FORM MASTERS' REMARKS:</strong><em><?php if (!empty($tcomment)) {
                                                                                          echo htmlentities($tcomment);
                                                                                        } ?></em></td>
                          </tr>

                          <tr>
                            <td colspan="11" class="text-left">SIGNATURE AND DATE:&nbsp;</td>
                          </tr>

                          <tr>
                            <td colspan="11" class="text-left"><strong>PRINCIPAL'S REMARKS:</strong>&nbsp;</td>
                          </tr>

                          <tr>
                            <td colspan="6">DATE AND SIGNATURE:</td>
                            <td align="center" colspan="5"><b>PRINCIPAL:&nbsp;<?php echo 'REV. SR.  AGATHA IWUEGBU ' ?></b></td>
                          </tr>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
