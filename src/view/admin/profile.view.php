<?php require 'adminheader.php';  ?>  
 <style type="text/css">
                    .img {image-orientation: from-image; width: 100px; height: 100px;}
                </style>
            <div class="container-fluid">
               <div class="row">
                <style type="text/css">  .ls{color:#000080;}    .ls:hover{color: #0000FF;}
                </style>
                   <div class="col-lg-12"><div class="card"><div class="card-body">
    <div class="card-two"><div class="text-center"><i class="fa fa-user-circle fa-5x"></i></div>  
    <div class="text-center"><a href="https://secure57.webhostinghub.com:2096/" title="Check Mail" target="_blank" class="ls"><i class="fa fa-envelope fa-2x"></i></a></div></div>
                            </div></div></div>
                    
                    <div class="col-lg-12"><div class="card">
        <ul class="nav nav-tabs profile-tab" role="tablist">
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">PROFILE</a></li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">SETTINGS</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#pas" role="tab">UPDATE PASSWORD</a> </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#contact" role="tab">CONTACT SUPPORT</a> </li></ul>

            <div class="tab-content"><div class="tab-pane active" id="profile" role="tabpanel">
                                <div class="card-body"><div class="row">
                    <div class="col-md-2 col-xs-6 b-r"> <strong>Name</strong><br>
                <p class="text-muted"><?= $_SESSION['_ref_user']; ?></p></div>
                <div class="col-md-2 col-xs-6 b-r"> <strong>Mobile</strong><br>
                    <p class="text-muted"><?= $mobile; ?></p></div>
                    <div class="col-md-2 col-xs-6 b-r"> <strong>Email</strong><br>
                    <p class="text-muted"><?= $em; ?></p></div>
                    <div class="col-md-2 col-xs-6 b-r"> <strong>Signature</strong><br>
                <p> <?php if (!empty($signature)){  echo "<img src='passports/$signature' class='img'>";  } ?></p></div>
                    <div class="col-md-4 col-xs-6 b-r"> <strong>Classes in Charge:</strong><br>
                    <p class="text-muted"><?php
            if ($_SESSION['role'] == "admin") { echo "ALL CLASSES"; }else{
            foreach ($classes as $class) { extract($class);  echo $class."; "; }} ?></p></div>

             
                  </div></div></div>


                <div class="tab-pane" id="settings" role="tabpanel"><div class="card-body">
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group"><label class="col-md-12">Full Name</label>
                    <div class="col-md-12">
                <input type="text" name="stname" class="form-control form-control-line" value="<?= $_SESSION['_ref_user']; ?>"></div></div>
            <div class="form-group"><label for="example-email" class="col-md-12">Email</label>
            <div class="col-md-12">
        <input type="email" name="el" class="form-control form-control-line" name="example-email" id="example-email" value="<?= $em; ?>"></div></div>

         <div class="form-group"><label class="col-md-12">Phone No</label>
        <div class="col-md-12"> <input type="text" name="pn" class="form-control form-control-line" value="<?= $mobile; ?>"> </div></div>
        <div class="form-group"><label class="col-md-12">Signature</label>
        <div class="col-md-12"> <input type="file" name="sgn" class="form-control form-control-line"> 
<?php  if (isset($error['image'])) {  echo "<span class='text-danger'>".$error['image']."</span>";  } ?>
        </div></div>       
        <div class="form-group"><div class="col-sm-12">
        <button class="btn btn-primary" name="udprofile">Update Profile</button></div>
    </div>
                                        </form></div></div>

            <div class="tab-pane" id="pas" role="tabpanel"><div class="card-body">
            <form class="form-horizontal form-material" method="post"><div class="form-group">
            <label class="col-md-12">Current Password</label>
    <div class="col-md-12"><input type="password" name="cpass" class="form-control form-control-line"></div>
                                            </div>
        <div class="form-group"><label for="example-email" class="col-md-12">New Password</label>
                                                <div class="col-md-12">
        <input type="password" class="form-control form-control-line" name="npass" id="example-email"></div></div>
        <div class="form-group"><label class="col-md-12">Confirm New Password</label>
    <div class="col-md-12"><input type="password" name="password" class="form-control form-control-line"></div></div>
        <div class="form-group"><div class="col-sm-12">
        <button class="btn btn-primary" name="udpass">Update Password</button></div></div>
                                        </form></div></div>


            <div class="tab-pane" id="contact" role="tabpanel"><div class="card-body">
                <form class="form-horizontal form-material" method="post">
                    <?php if (isset($msg['sc'])) {  echo "<span class='text-success'>".$msg['sc']."</span>";  } ?>
            <p style="font-style: italic;">Do you have any question? suggestion? Recommendation? challenge using this web app? Any component not functioning? Needs assistance using certain functions? ...ANYTHING ALTHOUGH. JUST CONTACT THE DEVELOPERS AND WE WILL RESPOND TIMELY. Just fill the below form and talk to us. Dont forget to include your name in the message. Thank you.</p>
    <div class="form-group"><label for="example-email" class="col-md-12">SUBJECT</label>
            <div class="col-md-12">
            <input type="text" class="form-control form-control-line" name="msubject" id="example-email" placeholder="my promote button is not functional"></div></div>
        <div class="form-group"><label class="col-md-12">Message Body</label>
         <textarea name="mbody" rows="8" cols="80" class="form-control" style="height:300px" required="required"></textarea></div>
        <div class="form-group"><div class="col-sm-12">
         <button class="btn btn-primary" name="msend" type="submit">Send</button></div></div>
     </form></div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- End PAge Content -->
            </div>
            
  <?php require 'adminfooter.php'; ?>