<?php    session_unset();
require 'bridge.php';
    if(isset($_GET['cid']));    $gadmno =$_GET['cid'];
    if(isset($_GET['class']));       $gclass =$_GET['class'];
    if(isset($_GET['session']));          $gsession =$_GET['session'];
    
    
    $studentinfo = $query->combResult($gadmno, $gsession, $gclass);
    extract($studentinfo);

    $newS = substr( $gsession, -4); $nn = $newS+1; $nsession = $newS.'/'.$nn;

    $newclass = $query->selectRow(["class", "dater"], "students", ["admno"=>$gadmno, "session"=>$nsession]);

    $totalStudents = $query->lookUp("admno", "combr", ["class"=>$gclass, "session"=>$gsession]);

    $studentrs = $query->selectAndOrder(["subj", "term1", "term2", "term3", "avg", "classavg", "min", "max", "position"], "comb", ["admno"=>$gadmno, "session"=>$gsession, "class"=>$gclass], "subj", "ASC");


require 'view/admin/cresults.view.php';
        
?>            


