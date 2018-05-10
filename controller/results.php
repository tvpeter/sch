<?php    require '../bridge.php';
    if(isset($_GET['cid']));    $gadmno =$_GET['cid'];
    if(isset($_GET['class']));       $gclass =$_GET['class'];
    if(isset($_GET['session']));          $gsession =$_GET['session'];
    if(isset($_GET['term']));      $gterm =$_GET['term'];

    $studentinfo = $query->getResults($gadmno, $gsession, $gclass, $gterm);
    extract($studentinfo);

    $studentAtt = $query->selectRow(["*"], "skills", ["admno"=>$gadmno, "session"=>$gsession, "class"=>$gclass, "term"=>$gterm]);
    if ($studentAtt) {
      extract($studentAtt);
    }

    $studentrs = $query->selectAndOrder(["subj", "test", "exam", "total", "classavg", "min", "maxi", "subjpos"], "scores", ["admno"=>$gadmno, "session"=>$gsession, "class"=>$gclass, "term"=>$gterm], "subj", "ASC");
   


require '../view/admin/results.view.php';
        
?>            


