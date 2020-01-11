  <?php require_once 'connxtn/connectMe.php'; require_once('connxtn/session_inc.php');  require_once'header.php';
  if(!isset($_SESSION['_ref_user'])) 
      {
          header("Location:index.php");  
       }
	   if(!loggedin()){header('location:index.php');}

			if( isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 60*20) ){
			session_unset();    
			session_destroy();   
			header('Location: index.php');
		}
		else{
			session_regenerate_id(true);
			$_SESSION['last_acted_on'] = time();
		}

	   
	   if(isset($_GET['cid'])) $getit =$_GET['cid'];
	   if(isset($_GET['class']))    $class =$_GET['class'];
		 if(isset($_GET['session']))  $session =$_GET['session'];
		 if(isset($_GET['term']))  $getterm =$_GET['term'];
	   
$brings=mysqli_fetch_array(mysqli_query($link, "select * from scores where admno='$getit' and class='$class' and session='$session' and term='$getterm' "));
 $brings1=mysqli_fetch_array(mysqli_query($link, "select * from results where admno='$getit' and class='$class' and session='$session' and term='$getterm' "));
			
	 $brings2=mysqli_fetch_array(mysqli_query($link, "select * from students where admno='$getit' "));
			  
			 
		$msg='';
		
		 if(isset($_POST['button'])){
			$punctuality=$_POST['punctuality'];
			$attendance = $_POST['attendance'];
			$appreciation=$_POST['appreciation'];
			 $games=$_POST['games'];
			 
			  $creativity=$_POST['creativity'];
			    $tools=$_POST['tools'];
				$initiative=$_POST['initiative'];
				 $handwriting=$_POST['handwriting'];
				 $leadership=$_POST['leadership'];
				  $communication=$_POST['communication'];
				  $neatness=$_POST['neatness'];
			$painting=$_POST['painting'];
			 $obedience=$_POST['obedience'];
			  $music=$_POST['music']; $sports=$_POST['sports'];
			    $politeness=$_POST['politeness'];
				$craft=$_POST['craft'];
				 $punctuality=$_POST['punctuality'];
				 $gymnastics=$_POST['gymnastics'];
				  $control=$_POST['control'];
				  
				  $cooperation=$_POST['cooperation'];
			 $responsibility=$_POST['responsibility'];
			  $perseverance=$_POST['perseverance'];
			    $sociability=$_POST['sociability'];
				$organisational=$_POST['organisational'];
				 $honesty=$_POST['honesty'];
				  $remarks=mysqli_real_escape_string($link, $_POST['remarks']);
				   $present=$_POST['present'];
				   $date=date('Y-m-d');
				   $total=$_POST['total'];
		
				  	
mysqli_query($link,"update results set tcomment='$remarks', tdate='$date' where admno='$getit' and class='$class' and session='$session' and term='$getterm'");

$quer1 =mysqli_query($link, "select * from skills where admno='$getit' and class='$class' and session='$session' and term='$getterm'" );
					$hanky =mysqli_num_rows($quer1);
					if($hanky>=1){
						$msg ='Results already reviewed';
						}else if ($hanky==0){	
						mysqli_query($link,"update results set tcomment='$remarks', tdate='$date' where admno='$getit' and class='$class' and session='$session' and term='$getterm'");

		$myquery=mysqli_query($link, "insert into skills (admno, class,	session, term,	aesth,	attendance,	creativity,	honesty,	initiative,	leadership,	neatness,	obedience,	politeness,	punctuality,	scontrol,	responsibility,	sociability,	organised,	persevere,	cooperate,	games,	sports,	handle,	communication,	painting,	craft,	gymnastics, present, total) values ('$getit', '$class', '$session', '$getterm', '$appreciation', '$attendance', '$creativity', '$honesty', '$initiative', '$leadership', '$neatness', '$obedience', '$politeness', '$punctuality', '$control', '$responsibility',  '$sociability', '$organisational', '$perseverance', '$cooperation', '$games', '$sports', '$tools', '$communication', '$painting', '$craft', '$gymnastics', '$present', '$total')");
		
		if($myquery){
			$msg='Successfully reviewed. Thank you';
			}else{
				$msg='Not reviewed. Try again.';
				}
						
						}
		}
			 ?>

<div class="wrapper row4">
  <div class="spacer">
    <div id="breadcrumb" class="clear"> 
     <?php echo 'Welcome  ' . $_SESSION['_ref_user'];?>
    </div>
  </div>
</div>

<div class="wrapper row3">
  <div class="spacer">
    <main class="container clear"> 
     <form name="form1" method="post" action="">
     
     <table width="" border="0" align="center" class="left_menu" bgcolor="#CDC9A5">
     <tr bgcolor="#ffffff"><td colspan="4" align="center"><?php echo $msg; ?></td></tr>
     <tr><td colspan="4" align="center"><B>  <?php echo $brings2['name'] ;?>&nbsp; RESULTS REVIEW</B></td></tr>
       <tr  bgcolor="">
  <td><b>Name:</b>&emsp;<?php echo $brings2['name'];?></td><td><b>Admission No:</b>&emsp;<?php echo $brings2['admno'];?></td><td><strong>TERM:</strong><?php echo $getterm; ?></td>    <td colspan="1"><div style="height:80px; width:80px;"><img src="<?php echo 'passports/'.$brings2['passport'];?>"width="80" height="75" align="right"  style="border-radius:50%;"/> </div></td>
  </tr>
  <tr>
   <td> <b>Class:</b>&emsp;<?php echo $brings2['class'];?></td><td><b> Sex:</b>&emsp;<?php echo $brings2['sex'];?></td>
   
    <td><b>Position:&nbsp;<?php echo $brings1['position'];?></b></td><td><b>AVERAGE:&nbsp;<?php echo round($brings1['avg'], 2);?></b></td>
  </tr>
  <tr><td colspan="2" align="center">AFFECTION DOMAIN<br /> (Values, Attitudes, Interest Character)</td><td colspan="2" align="center">PSYCHOMOTOR DOMAIN<br /> ( Manual and Physical Skills)</td></tr>
  </tr>
  <tr><td align="center">BEHAVIOURS</td><td align="center">GRADINGS</td><td align="center">ACTIVITIES</td><td align="center">GRADINGS</td></tr>
  <tr>
    <td>AESTHETIC APPRECIATION:</td><td><select name="appreciation" size="1">
                            <option selected="selected" value="">Select</option>
                              <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              
              </select></td>
                            <td>GAMES:</td><td><select name="games" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
  </tr>
  <tr>
    <td>ATTENDANCE AT CLASS:</td>
    <td><select name="attendance" size="1"><option selected="selected" value="">Select</option>
                          <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            <td>SPORTS:</td>
    <td><select name="sports" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            </tr>
  <tr>
    <td>CREATIVITY:</td>
    <td><select name="creativity" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            <td>HANDLING OF TOOLS:</td>
    <td><select name="tools" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>  </tr>
  <tr>
    <td>INITIATIVE:</td>
    <td><select name="initiative" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            
                             <td>HAND WRITING:</td>
    <td><select name="handwriting" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                              </tr>
                              
                              <tr>
    <td>LEADERSHIP ROLE:</td>
    <td><select name="leadership" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            <td>COMMUNICATION SKILLS:</td>
    <td><select name="communication" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            </tr>
  <tr>
    <td>NEATNESS</td>
    <td><select name="neatness" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            <td>PAINTING AND DRAWING:</td>
    <td><select name="painting" size="1"><option selected="selected" value="">Select</option>
                             <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>  </tr>
  <tr>
    <td>OBEDIENCE:</td>
    <td><select name="obedience" size="1"><option selected="selected" value="">Select</option>
                          <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            
                             <td>MUSICAL SKILLS:</td>
    <td><select name="music" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                              </tr>
  <tr>
    <td>POLITENESS:</td>
    <td><select name="politeness" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
              <td>CRAFT:</td>
    <td><select name="craft" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td></tr>
              
              <tr>
    <td>PUNCTUALITY</td>
    <td><select name="punctuality" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            <td>GYMNASTICS:</td>
    <td><select name="gymnastics" size="1"><option selected="selected" value="">Select</option>
                             <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>  </tr>
  <tr>
    <td>SELF-CONTROL:</td>
    <td><select name="control" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                            <td>SPIRIT OF CO-OPERATION</td>
    <td><select name="cooperation" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                             
                              </tr>
  <tr>
    <td>SENSE OF RESPONSIBILITY:</td>
    <td><select name="responsibility" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td><td>PERSEVERANCE:</td>
    <td><select name="perseverance" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
              </tr>
              
              <tr>
    <td>SOCIABILITY</td>
    <td><select name="sociability" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                    
              <td>DAYS PRESENT:</td>
    <td><input type="number" name="present" /></td>        
                            
                            
                              </tr>
  <tr>
    <td>ORGANISATIONAL ABILITY:</td>
    <td><select name="organisational" size="1"><option selected="selected" value="">Select</option>
                           <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
                           <td>TOTAL:</td>
    <td><input type="number" name="total" /></td> 
                             
                              </tr>
  <tr>
    
              <td>HONESTY:</td>
    <td><select name="honesty" size="1"><option selected="selected" value="">Select</option>
                            <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="E">E</option>
              </select></td>
              <td>REMARKS:</td>
    <td><textarea name="remarks" cols="20" rows="3"  required></textarea></td>
    
                             </tr>
  <tr>
    
                                    
       <tr><td colspan="2" align="center"><input name="button" type="submit"></td><td colspan="2"><a href="student.php?cid=<?php echo $brings2['admno']; ?>" title="Back"><i class=" fa fa-reply" style="font-size:24px; color:#000;"></i></a></td></tr>
</table>

     </form>
    
  </main>
  </div>
</div>
<?php require_once'footer.php';?>
</body>
</html>