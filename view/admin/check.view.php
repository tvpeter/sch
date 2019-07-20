<!DOCTYPE html>
<html lang="en">
<head>  
	<title>SCCO: Check Results</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/checked.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/ssco1.png">
          				</div>

				<form class="login100-form" method="post">

					<h2 class="text-center"><b>CHECK RESULTS</b></h2>
	<?php if (isset($error['cd'])) {  echo "<span class='text-warning'>".$error['cd']."</span><br>";  }
			if (isset($error['admn'])) {  echo "<span class='text-warning'>".$error['admn']."</span><br>";  }

	if (isset($msg['status'])) {  echo "<span class='text-warning'>".$msg['status']."</span>";  }
					?>
			<div class="wrap-input100 validate-input">
<input class="input100" type="text" name="admn" placeholder="Admission number" required="required">			<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100">
		<select  name="class" name="class" required aria-required="true" class="input100">
        <option selected="selected" value="" disabled="disabled">Class</option>
        <?php foreach ($classes as $class): ?>  
        <option value="<?= $class['class'] ?>"><?= $class['class']; ?></option>
                                    <?php endforeach; ?>
                                </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-gg-circle" aria-hidden="true"></i>
						</span>
					</div>
				<div class="wrap-input100 validate-input">
			<select name="session" size="1" required aria-required="true" class="input100">
                 <option selected="selected" value="" disabled="disabled">Session</option>
                <?php for($py=date('Y')-2; $py<=date('Y')-1; $py++){ $k= $py+1;?>
                  <option value="<?php echo $py.'/'.$k; ?>"><?php echo $py.'/'.$k;?></option>
                <?php } ?>
            </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
				<div class="wrap-input100 validate-input" >
						<select name="term" size="1" id="term" required aria-required="true" class="input100">
                 <option selected="selected" disabled="disabled" value="">Select</option>
                   <option value="Term I">Term I</option>
                   <option value="Term II">Term II</option>
                   <option value="Term III">Term III</option>
            </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					</div>
					<img src="captcha.php" title="confirmation code"><a href="login.php" title="refresh" align="right"><i class="fa fa-refresh"></i></a>
          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="pass" placeholder="Confirmation code" required="required">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							Check
						</button>
					</div>

					<div class="text-center">
                  <a href="index.php" title="Home"><i class="fa fa-home fa-2x"></i></a>
                </div>

				</form>


			</div>
		</div>
	</div>
	
	

</body>
</html>