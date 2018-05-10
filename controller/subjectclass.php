<?php    require '../bridge.php';

$classes = $query->selectColumn("class", "class"); 
$gsession = $query->sSession();  
$gterm = $query->term();
$subs = $query->selectColumn("subject", "subject");


if (isset($_POST['submit'])) {
       
        $error = $succ = [];
        
    if (empty($_POST['class'])) {
       $error['class'] = "select class";
    }
     if (empty($_POST['session'])) {
       $error['session'] = "select session";
    }
    if (empty($_POST['term'])) {
       $error['term'] = "select term";
    }
    if (empty($_POST['regsubject'])) {
       $error['regsubject'] = "select subject";
    }


     if (empty($error)) 
     {
      
      $studentsadm = $query->selectAndOrder(["admno"], "students", [
        "class"=>$_POST['class'], "session"=> $_POST['session']], "admno", "ASC"); 

      $stadmn = array_column($studentsadm, "admno");

      foreach ($stadmn as $adm) {
                
        if (($query->lookUp("admno", "comb", ["admno"=>$adm, "class"=>$_POST['class'], 
          "session"=>$_POST['session'], "subj"=>$_POST['regsubject']])) < 1) 
        {
          $query->dbInsert("comb", ["admno"=>$adm, "class"=>$_POST['class'],
            "session"=>$_POST['session'], "subj"=>$_POST['regsubject']]);
        }

        if (($query->lookUp("admno", "scores", ["admno"=>$adm, "class"=>$_POST['class'], 
          "session"=>$_POST['session'], "term"=>$_POST['term'], "subj"=>$_POST['regsubject']])) < 1)
        {
          $query->dbInsert("scores", ["admno"=>$adm, "class"=>$_POST['class'],
            "session"=>$_POST['session'], "term"=>$_POST['term'], "subj"=>$_POST['regsubject']]);
        } 

      }

     }
     $cc =$_POST['class'];  $ss=$_POST['session']; $tt = $_POST['term'];
      
     header("location:subjectclass.php?class=$cc&session=$ss&term=$tt"); 
}

if (isset($_POST['checksubjects']) && !empty($_POST['checkclass']) && !empty($_POST['checkgs']) && !empty($_POST['checkterm'])) 
	{
		$csession = $_POST['checkgs']; $cterm = $_POST["checkterm"]; $cclass = $_POST['checkclass'];
	
	}elseif (isset($_GET['class']) && isset($_GET['session']) && isset($_GET['term'])) 
  {
    $csession = $_GET['session']; $cterm = $_GET['term']; $cclass = $_GET['class'];
  }else{
		$csession=(date("Y")-1)."/".date("Y"); $cterm = "Term I"; $cclass = "JSS 1A";
	}


	$setclasses = $query->selectDistinct("subj", "scores", ["class"=>$cclass, "session"=>$csession, "term"=>$cterm]);
  $csubjects = array_column($setclasses, "subj");

  $returned = [];

  foreach ($csubjects as $sb) {

   $returned[$sb]= $query->lookUp("admno", "scores", [
      "class"=>$cclass, "session"=>$csession, "term"=>$cterm, "subj"=>$sb]);
   
  }
  

require '../view/admin/subjectclass.view.php';
        
?>            


