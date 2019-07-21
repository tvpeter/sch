<?php session_start();
require_once 'bridge.php';

$error = [];

$classes = $query->selectColumn("class", "class"); 

$session = $query->editableSession(["session"], "sessionstatus", ["status"=>"editable"], "session", "ASC");

if (isset($_POST['register'])) {

    $imgtype = array("image/gif", "image/jpeg", "image/png", "image/jpg");

    if (($query->lookUp("name", "students", ["name" =>$_POST['studentname']])) > 0){
        $error['studentname'] = "Student name already exist";
    } 
    if (($query->lookUp("admno", "students", ["admno"=>$_POST['admno']])) > 0) {
        $error['admno'] = "Admission number already assigned to another student";
    }
    if ($_FILES['passpt']['size'] != 0 && !empty($_FILES['passpt']['name'])){
    if ($_FILES["passpt"]["size"]>300000) {   $error['image'] = "Image size cannot be more than 300kb"; }

    if (!in_array($_FILES["passpt"]["type"], $imgtype)){ $error["image"] ="Image type not known"; }
                }

    if (empty($error)) {
       
        if ($_FILES['passpt']['size'] == 0 && empty($_FILES['passpt']['name']))
     {
        
        $query->dbInsert("students", [
        "name" => $_POST['studentname'],
        "admno" => $_POST['admno'],
        "dob" => $_POST['dob'],
        "sex" => $_POST['sex'],
        "address" => $_POST['address'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email'],
        "class" => $_POST['class'],
        "dater" => date('Y-m-d'),
        "session" => $_POST['session']
    ]); 
     }else {
        $dest = $query->uploadFile("passpt", "passports/");

        $query->dbInsert("students", [
        "name" => $_POST['studentname'],
        "admno" => $_POST['admno'],
        "dob" => $_POST['dob'],
        "sex" => $_POST['sex'],
        "address" => $_POST['address'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email'],
        "passport" => $dest,
        "class" => $_POST['class'],
        "dater" => date('Y-m-d'),
        "session" => $_POST['session']]);
     }
 }

}

require_once 'view/admin/registerstudent.view.php';
