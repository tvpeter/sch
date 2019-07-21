<?php    session_start();
require 'bridge.php';
 
  $images = $query->selectColsOrder(["id", "image"], "sliders", "id", "DESC");   

                  $passport=""; $sn = 0;
                   $msg = array();
                  $imgtype = array("image/gif", "image/jpeg", "image/png", "image/jpg");

                if (isset($_POST['submit'])){
                  if (!in_array($_FILES["file"]["type"], $imgtype)){
                    $msg ['error'] ="Image type not known";           }
                  
                  if ($_FILES["file"]["error"] > 0) {
                    $msg ['error'] = "Image has an error";       }
                  if ($_FILES["file"]["size"]>1500000) {   
                    $msg ['error'] = "Image size cannot be more than 1.5mb"; 
                  }

            if (empty($msg)) {
            
                $dest = $query->uploadFile("file", "sliders/");

                $query->dbInsert("sliders", ["image"=>$dest]);
                header("Refresh:0"); 
          

                  }
                }


        if (array_key_exists("remove", $_POST) && !empty($_POST['delete'])) 
{
    foreach ($_POST['delete'] as $id) {

        if($query->deleteRow("sliders", ["id" =>$id]))
        {
            header("Refresh:0");
        }
                
    }

}
 
require 'view/admin/bimages.view.php';
        
?>            


