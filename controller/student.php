<?php 

require '../bridge.php';

if ($_GET['cid']) { $admno = $_GET['cid']; }

if ($_GET['session']) { $session = $_GET['session']; }

$studentDetails = $query->selectRow(["name", "passport", "dob", "sex", "dater", "address", "phone", "email", "class"], "students", ["admno"=>$admno, "session"=>$session]);
extract($studentDetails);

$firstTerm = $query->selectRow(["avg", "position"], "results", ["admno"=>$admno, "session"=>$session, "term"=>"Term I"]);
$secondTerm = $query->selectRow(["avg", "position"], "results", ["admno"=>$admno, "session"=>$session, "term"=>"Term II"]);
$thirdTerm = $query->selectRow(["avg", "position"], "results", ["admno"=>$admno, "session"=>$session, "term"=>"Term III"]);
$annualRs = $query->selectRow(["avg", "pos"], "combr", ["admno"=>$admno, "session"=>$session]);

if (isset($_POST['update'])) {

    $imgtype = array("image/gif", "image/jpeg", "image/png", "image/jpg");

     $query->updateQuery("results", ["class" => $_POST['uclass']], ["admno" => $admno, "session" => $session]);

     $query->updateQuery("scores", ["class" => $_POST['uclass']], ["admno" => $admno, "session" => $session]);
   
  if ($_FILES['upassport']['size'] == 0 && empty($_FILES['upassport']['name']))
  {
    $query->updateQuery("students", ["class" => $_POST['uclass'],
            "name" => $_POST['uname'],
            "dob" => $_POST['udob'],
            "address" => $_POST['uaddress'],
            "phone" => $_POST['uphone'],
             "email" => $_POST['umail'],
            "class" => $_POST['uclass'],
            "sex" => $_POST['gender']],          
     ["admno" => $admno, "session" => $session]);

      echo "<meta http-equiv=\"refresh\" content=\"0;URL=allstudents.php\"";

  }else {
    $error = [];

    if ($_FILES["upassport"]["size"]>300000) {   $error['image'] = "Image size cannot be more than 300kb"; }

    if (!in_array($_FILES["upassport"]["type"], $imgtype)){ $error["image"] ="Image type not known"; }
                
if (empty($error)) {
    
     $dest = $query->uploadFile("upassport", "../passports/");

      $query->updateQuery("students", ["class" => $_POST['uclass'],
            "name" => $_POST['uname'],
            "dob" => $_POST['udob'],
            "address" => $_POST['uaddress'],
            "phone" => $_POST['uphone'],
            "email" => $_POST['umail'],
            "class" => $_POST['uclass'],
            "sex" => $_POST['gender'],
            "passport" => $dest ],
     ["admno" => $admno, "session" => $session]);
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=allstudents.php\"";
    }
  }  
}


require '../view/admin/student.view.php';

