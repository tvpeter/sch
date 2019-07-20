<?php session_start();
 require 'bridge.php';

         if(isset($_GET['cid']))   $gadmno =$_GET['cid'];
         if(isset($_GET['class']))  $gclass =$_GET['class'];
         if(isset($_GET['session']))  $gsession =$_GET['session'];
         if(isset($_GET['term']))   $gterm =$_GET['term'];

    
       
          $subjects = $query->selectAndOrder(["subj"], "scores", ["admno"=> $gadmno, "class"=>$gclass, "session"=>$gsession, "term"=>$gterm ], "subj", "ASC");
            $sieved = array_column($subjects, "subj");       

         $addSubjects = $query->selectNotIn(["subject"], "subject", "subject", $sieved);
        

    $studentinfo = $query->selectRow(["name", "passport"], "students", ["admno"=>$gadmno]);
    extract($studentinfo);

    $totalsubjects = $query->selectRow(["subno"], "subjno", ["session"=>$gsession, "term"=>$gterm, "class"=>$gclass]);
    
     
if (isset($_POST['adds']) && !empty($_POST['rsubject'])) {

    foreach ($_POST['rsubject'] as $selected) 
    {      
        if (($query->lookUp("subj", "comb", ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsession, "subj"=>$selected])) < 1) 
        {
             $query->dbInsert("comb", ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsession,
                "subj"=>$selected]);
        }

   if (($query->lookUp("subj", "scores", ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsession, "term"=>$gterm, "subj"=>$selected])) < 1) 
        {
            $query->dbInsert("scores", ["admno"=>$gadmno, "class"=>$gclass, "session"=>$gsession,
                "term" =>$gterm, "subj"=>$selected]);
        }
        }
        header("location:viewsubjects.php?cid=$gadmno&session=$gsession&class=$gclass&term=$gterm");    
}


      require 'view/admin/addsubject.view.php';

?>