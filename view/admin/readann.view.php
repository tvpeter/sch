    <?php require 'adminheader.php';  ?>    
           
            <div class="container-fluid">
             
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">

                                    <div class="inbox-leftbar">
        <p class="text-danger"><b>ANNOUNCEMENT DETAILS</b></p>                           
                                    </div>
                                <?php if (empty($ann)) {
                                    echo("The announcement you selected did not display, go back and refresh.");
                                }else{
                                    extract($ann);
                                    ?>
                                    <div class="inbox-rightbar">

                                        <div class="mt-4">
                                            <h5><?= $topic; ?></h5>
                                            <hr/>
                        <div class="media mb-4 mt-1">
                                                
            <div class="media-body"><span class="pull-right"><?= $postime; ?></span></div>
                                            </div>
                    <p><?= htmlentities($body); ?></p>

                                            <hr/>
                                    </div>
                                     <?php } ?>
            <div class="text-right">
                <a href="announcement.php" class="btn btn-primary"><i class="fa fa-reply"></i>&nbsp; Back</a>
    
                                        </div>

                                    </div>
                               

                                </div>
                            </div>
                        </div>
                    </div>
              
            </div>
            <?php require 'adminfooter.php'; ?>