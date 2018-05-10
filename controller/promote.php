<?php 

require '../bridge.php';
$classes = $query->selectColumn("class", "class");  
if(isset($_GET['cid'])){ $admno =$_GET['cid']; }
     if(isset($_GET['class'])) {   $class =$_GET['class']; }
     if(isset($_GET['session'])) { $session =$_GET['session']; }

     $newS = substr( $session, -4); $nn = $newS+1; $nsession = $newS.'/'.$nn;

$studentDetails = $query->selectRow(["name", "passport", "dob", "sex", "dater", "address", "phone", "email", "class"], "students", ["admno"=>$admno, "class"=>$class, "session"=>$session]);
extract($studentDetails);

$studentPerformance = $query->selectRow(["avg", "pos"], "combr", ["admno"=>$admno, "class"=>$class, "session"=>$session]);
extract($studentPerformance);

$suc = [];

if (isset($_POST['submit']) && isset($_POST['pclass'])) {
  $date=date('Y-m-d');

   $check = $query->lookUp("admno", "students", ["admno"=>$admno, "session"=>$nsession]);

   if ($check == 1) {
     $query->updateQuery("students", ["class" => $_POST['pclass']], ["admno" => $admno, "session" => $nsession]);
     $query->updateQuery("combr", ["class" => $_POST['pclass']], ["admno" => $admno, "session" => $nsession]);
      $suc['msg']='STUDENT ALREADY PROMOTED, CLASS UPDATED SUCCESSFULLY';
   }elseif ($check == 0) {

    $query->dbInsert("students", [
      "name"=>$name, "admno"=>$admno, "dob"=>$dob, "sex"=>$sex, "address"=>$address, "phone"=>$phone,
      "email"=>$email, "passport"=>$passport, "class"=>$_POST['pclass'], "dater"=>$date, "session"=>$nsession]);

    $query->dbInsert("combr", ["admno"=>$admno, "class"=>$_POST['pclass'], "session"=>$nsession]);
     $suc['msg']='PROMOTED SUCCESSFULLY';

   }
}
     
   
  

require '../view/admin/promote.view.php';

