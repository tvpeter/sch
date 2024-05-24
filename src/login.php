<?php   session_start();
require_once 'bridge.php';
$error = $msg= [];
if (!isset($_SESSION['code'])) {
	header("Refresh:0");
}
	if (array_key_exists("check", $_POST)) {

	if (!$_SESSION['code']) {
			header("Refresh:0");
		}
		if (!isset($_SESSION['code'])) {
	header("Refresh:0");
}

	if (strtoupper($_POST['confirm']) != $_SESSION['code']) {
	$error['code'] = "Wrong verification code";
	}

	if (empty($_POST['uname'])  || empty($_POST['pword'])) {
	$error['uname'] = "Username/password cannot be empty";
	}
	if (empty($error)) {
		$unamea = $query->cleanInput($_POST['uname']);
		$uname = md5($unamea);
		$pd = $query->cleanInput($_POST['pword']);

		$details = $query->login($uname, $pd);
				
		if (!$details) {
			$msg['w'] = "WRONG USERNAME/PASSWORD";
				}else{
		extract($details);
		$_SESSION['_id_'] = $id;
		$_SESSION['_uv_'] = $ustarp;
		$_SESSION['_ref_user'] = $name; $_SESSION['last_acted_on'] = time();
		 $_SESSION['role'] = $role;
		 header("location:welc.php");
		
		}
	}
	}
require_once 'view/admin/login.view.php';
        
?>            
