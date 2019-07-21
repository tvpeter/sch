<?php require 'adminheader.php';  ?>            

     <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">

                <div class="col-6">
                 <div class="card">
                   <div class="card-body">
                <div class="card-content">
                                        <div class="mt-4">
       <div class="p-3 mb-2 bg-dark text-white text-center">MESSAGES FROM SITE USERS</div>
                         <form method="post" action="">
                            <ul class="message-list">
                              <?php if (empty($comments)) {
                             echo("No comments from users yet."); } else{
                                      foreach ($comments as $comment) {                               
                                      extract($comment);
                                      ?>                   
                             <li class="unread">
                                <div class="col-mail-1">
                    <a href="comments.php?email=<?=$email; ?>&name=<?= $name; ?>&date=<?= $date; ?>">
                      <input type="checkbox" name="del[]" value="<?= $id; ?>">
                      <span class="title"><?= $name; ?></span></a></div>
                                <div class="col-mail-2">
                             <div class="date"><?= $date; ?></div>
                                       </div></li>
                                                      <?php }} ?>    
                                                    </ul>
                                               
                        <div class="form-group m-b-0">
           <div class="text-right">
          <button class="btn btn-danger" name="delete" onClick="confirm('Sure want to delete this message?')"> <i class="fa fa-trash m-l-10"></i>&nbsp;Delete  </button>
          </form>
                </div> </div> </div> </div></div></div></div>

                   <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                        <div class="card-content">
                            <div class="mt-4">
        <div class="p-3 mb-2 bg-dark text-white text-center">User Message Details</div>

            <div>
              <?php  
              if (empty($details)) {
                echo "Select Message to view details.";
              }else{
                extract($details);

                echo "<b>FROM</b>:&nbsp; $name <hr/>
                      <b>EMAIL</b>:&nbsp; $email <hr/>
                      <b>PHONE</b>:&nbsp;  $phone <hr/>
                      <b>DATE</b>:&nbsp;  $date <hr/>
                      <b>MESSAGE</b>: <br/>
                      $comment  ";
              }
              ?>
            </div> </div> </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
           
           <?php require 'adminfooter.php'; ?>