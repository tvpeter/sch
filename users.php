<?php   session_start();
require 'bridge.php';
  $classes = $query->selectColumn("class", "class");

  $sdetails = $query->selectColsOrder(["id", "name", "status", "role"], "uzerz", "role", "ASC");

if (isset($_POST['submit'])) {
       
        $error = $succ = [];
         $imgtype = array("image/gif", "image/jpeg", "image/png", "image/jpg");
       
      if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['sname'])){ $error ['sname'] ='Non alphabetic characters are not allowed as name'; }
    
    if (!filter_var($_POST['semail'], FILTER_VALIDATE_EMAIL)) { $error['semail'] = "Invalid email";  }
          
    if (strcmp($_POST['pword'], $_POST['cpword']) != 0) {
    $error['cpword'] = "Password and its confirmation does not match";   }
     if (strcmp($_POST['pword'], $_POST['uname']) == 0) {
    $error['cpword'] = "Username and password cannot be same";   }

    if ($query->lookUp("id", "uzerz", ["ustarp"=>md5($_POST['uname'])]) > 0) {
      $error['uname'] = "Username already exist";
    }
    if ($query->lookUp("id", "uzerz", ["name"=>$_POST['sname']]) > 0) {
      $error['sname'] = "Staff already exist";
    }
    if ($_FILES['sign']['size'] == 0 && empty($_FILES['sign']['name'])) {
      $dest = "";
    }else{
      if ($_FILES["sign"]["size"]>300000) {   $error['image'] = "Image size cannot be more than 300kb"; }

    if (!in_array($_FILES["sign"]["type"], $imgtype)){ $error["image"] ="Image type not known"; }
      $dest = $query->uploadFile("sign", "passports/");
    }
    if ($_POST['class'] == "admin") { $role = "admin";   }else{    $role = "staff"; }

    if (empty($error)) {


      $options = [ 'cost' => 12,  'salt' => random_bytes(22)];
      
  $pword= password_hash($_POST['pword'], PASSWORD_BCRYPT, $options);

         $query->dbInsert("uzerz", [ "ustarp"=>md5($_POST['uname']), "pvihiga"=>$pword,
        "name"=>strtoupper($_POST['sname']), "class"=>$_POST['class'],
        "signature"=>$dest, "status"=>"active",
        "role"=>$role,    "mobile"=>$_POST['snumber'],   "em"=>$_POST['semail']]);

      $stid = $query->selectRow(["id"], "uzerz", ['ustarp'=>md5($_POST['uname']), "pvihiga"=>md5($_POST['pword'])]);
      if($stid){ extract($stid);
        $query->dbInsert("tclasses", ["name"=>$id, "class"=>$_POST['class']]);
         }
         header("Refresh:0");
      }

    }

require 'view/admin/users.view.php';
        
?>            


