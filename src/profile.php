<?php   session_start(); 
require_once 'bridge.php';

if ($_SESSION['role'] == "staff") {
	$classes = $query->selectAndOrder(["class"], "tclasses", ["name"=>$_SESSION['_id_']], "class", "ASC");
}

$profile = $query->selectRow(["id", "signature", "mobile", "em"], "uzerz", ["name"=>$_SESSION['_ref_user'], "role"=> $_SESSION['role']]);
extract($profile);

if (array_key_exists("udprofile", $_POST)) {
	if ($_FILES['sgn']['size'] == 0 && empty($_FILES['sgn']['name'])) {
	$query->updateQuery("uzerz", ["name"=>$_POST['stname'], "mobile"=>$_POST['pn'], "em"=>$_POST['el']], ["id"=>$id, "role"=>$_SESSION['role']]);
		header("Refresh:0");
	}else{
		$error = [];
		  $imgtype = array("image/gif", "image/jpeg", "image/png", "image/jpg");
		
    if ($_FILES["sgn"]["size"]>300000) {   $error['image'] = "Image size cannot be more than 300kb"; }

    if (!in_array($_FILES["sgn"]["type"], $imgtype)){ $error["image"] ="Image type not known"; }

    	if (empty($error)) {
    		 $dest = $query->uploadFile("sgn", "passports/");

    		$query->updateQuery("uzerz", ["name"=>$_POST['stname'], "signature"=>$dest, "mobile"=>$_POST['pn'], "em"=>$_POST['el']], ["id"=>$id, "role"=>$_SESSION['role']]);
    		header("Refresh:0");
    	}

	}
}

if (isset($_POST['udpass']) && !empty($_POST['cpass']) && !empty($_POST['npass']) && !empty($_POST['password'])) {
	$msg = [];
	if (strcmp($_POST['npass'], $_POST['password']) != 0) {
		$msg['pass'] = "Password does not match"; 
	}

	$std = $query->login($_SESSION['_uv_'], $_POST['cpass']);

	if (!$std) {
		$msg = " Wrong password.";
	}else{


	if (empty($msg)) {
		
	$updatedPass= password_hash($_POST['npass'], PASSWORD_BCRYPT, [ 'cost' => 12]);
	
	$query->updateQuery("uzerz", ["pvihiga"=>$updatedPass], ["name"=>$_SESSION['_ref_user'], "id"=>$_SESSION['_id_']]);
		header("location:welc.php");
	}
}
}



if (isset($_POST['msend']) && !empty($_POST['mbody']) && !empty($_POST['msubject'])) {

	$msubject = $_POST['msubject'];
	$mbody = $_POST['mbody'];


	$to = "withtvpeter@gmail.com";
	$header = "From:SCCO STAFF ". $_SESSION['_ref_user'];

	if(mail($to, $msubject, $mbody, $header)){
	$msg['sc'] = "Your message was received successfully. The team will respond asap. Thank you.".
	header("Refresh:0"); }
}

require_once 'view/admin/profile.view.php';     
      
