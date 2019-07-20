<?php

require 'bridge.php';

if (isset($_GET['id']) && isset($_GET['session'])) {
	
        if(($query->deleteRow("results", ["admno"=>$_GET['id'], "session"=>$_GET['session']])) && ($query->deleteRow("scores", ["admno"=>$_GET['id'], "session"=>$_GET['session']])) && ($query->deleteRow("students", ["admno"=>$_GET['id'], "session"=>$_GET['session']]))) 
        {
           header("location:allstudents.php");
        }
                
        header("location:allstudents.php");
}

	if (isset($_GET['sbn'])) 
	{
		if ($query->deleteRow("subjno", ["sn"=>$_GET['sbn']])) {
			header("location:subno.php");
		}

	}

  if (isset($_GET['session']) && isset($_GET['term'])) 
  {
  	if ($query->deleteRow("control", ["session"=>$_GET['session'], "term"=>$_GET['term']])) {
			header("location:terminfo.php");
		}		

  }

  if (isset($_GET['fsession']) && isset($_GET['fterm'])) 
  {
    if ($query->deleteRow("fees", ["session"=>$_GET['fsession'], "term"=>$_GET['fterm']])) {
      header("location:fees.php");
    }   
  }

  if (isset($_GET['ns']) && isset($_GET['nt'])) {
    if ($query->deleteRow("newsletter", ["session"=>$_GET['ns'], "term"=>$_GET['nt']])) {
      header("location:newsletter.php");
    }
  }

  if (isset($_GET['todoid'])) {
    if ($query->deleteRow('todo', ["id"=>$_GET['todoid']])) {
      header("location:welc.php"); }
  }

  if (isset($_GET['suspendid'])) {
    $query->updateQuery('uzerz', ["status"=>"suspended"], ["id"=>$_GET['suspendid']]);
      header("location:users.php");  }

  if (isset($_GET['activateid'])) {
    $query->updateQuery('uzerz', ["status"=>"active"], ["id"=>$_GET['activateid']]);
      header("location:users.php");  }

  if (isset($_GET['deleteid'])) {
    $query->deleteRow('uzerz',  ["id"=>$_GET['deleteid']]);
      header("location:users.php");
      }

  if (isset($_GET['stclassid']) && isset($_GET['stid'])) {
    $stidd = $_GET['stid'];
    $query->deleteRow('tclasses',  ["id"=>$_GET['stclassid']]);
      header("location:sclasses.php?stid=$stidd");
  }

  if (isset($_GET['rmsessn'])) {
      $query->deleteRow('sessionstatus',  ["id"=>$_GET['rmsessn']]);
      header("location:session.php");
  }

   if (isset($_GET['toview'])) {
       $query->updateQuery('sessionstatus', ["status"=>"viewable"], ["id"=>$_GET['toview']]);
      header("location:session.php");
  }

  if (isset($_GET['toedit'])) {
       $query->updateQuery('sessionstatus', ["status"=>"editable"], ["id"=>$_GET['toedit']]);
      header("location:session.php");
  }

  if (isset($_GET['tsid'])) {
      $query->deleteRow('termstatus',  ["id"=>$_GET['tsid']]);
      header("location:termstatus.php");
  }

  // if (isset($_GET['tsview'])) {
  //      $query->updateQuery('termstatus', ["status"=>"viewable"], ["id"=>$_GET['tsview']]);
  //     header("location:termstatus.php");
  // }

  // if (isset($_GET['tsedit'])) {
  //      $query->updateQuery('termstatus', ["status"=>"editable"], ["id"=>$_GET['tsedit']]);
  //     header("location:termstatus.php");
  // }