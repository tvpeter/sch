<?php require'head.php'; ?>

	<!-- Banner Slider -->
	<div class="section-padding overlay-gray" data-enllax-ratio="-.3" style="background: url(images/bg.jpg) 40% 0% no-repeat fixed;">
		<div class="container p-relative">

			<!-- Page heading -->
			<div class="page-heading">
				<h2>Contact</h2>
			</div>
			

		</div>
	</div>
	<!-- Banner Slider -->

	<!-- Main Content -->
	<main class="main-content">

		<!-- Map  -->
		<div class="contact-map-holder">
			<div >
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3962.910351065743!2d8.801261197561747!3d6.658032539422784!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1481384339172"  height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="map-overlay">
				<div class="tc-display-table">
					<div class="tc-display-table-cell">
						<address>
							<span class="tree-icon"><i class="fa fa-map-marker fa-3x"></i></span>
							<span>P.O. Box 626, Igoli, Ogoja, </span>
							<span>Cross River State, Nigeria.</span>
							<span>+2348066058374 </span>
						</address>
					</div>
				</div>
			</div>
		</div>
		<!-- Map -->

		<!-- Contact Figures -->
		<div class="contact-figures section-padding-top">
			<div class="container">
				<div class="row">
					
					<!-- Contact Figure -->
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="contact-figure">
							<h3>Location</h3>
							<span class="contact-icon"><i class="fa fa-map-marker"></i></span>
							<span>Igoli, Ogoja, </span>
							<span>Cross River State, Nigeria.</span>
						</div>
					</div>
					<!-- Contact Figure -->

					<!-- Contact Figure -->
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="contact-figure">
							<h3>Phone &amp; Email</h3>
							<span class="contact-icon"><i class="fa fa-phone"></i></span>
							<span>+2348066058374</span>
							<span>info@sccogoja.com</span>
						</div>
					</div>
					<!-- Contact Figure -->

					<!-- Contact Figure -->
					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="contact-figure">
							<h3>School Time</h3>
							<span class="contact-icon"><i class="fa fa-clock-o"></i></span>
							<span>MON - FRI :  8:00 AM To 3:00 PM</span>
								</div>
					</div>
					<!-- Contact Figure -->

				</div>
			</div>
		</div>
		
		<section class="team-holder section-padding-top white-bg">
			<div class="container">

				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>Send <strong>Your </strong> Message</h2>
						<p>We will respond to your enquiry soonest. </p>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Contact Form -->
				<div class="commnet-form">
					<div id="formalert" class="alert hide">  
			          <a class="close">×</a>  
			          <strong>Warning!</strong> Make sure all fields are filled and try again.
			        </div>
					<form role="form" id="contact_form" class="comment-form" method="post" onSubmit="return false">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="required"/>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" name="email" id="email" placeholder="Email" required="required"/>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<textarea cols="10" class="form-control" rows="10" placeholder="Your Message.." required="required"/></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-btns">
									<ul class="btn-list">
										<li><button class="pink-btn" type="submit">Reset</button></li>
										<li><button type="submit" value="submit" class="pink-btn" id="btn_submit" onClick="proceed();">Submit</button></li>
									</ul>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- Contact Form -->

			</div>
		</section>
		<!-- Contact Form -->

		

	</main>
	<!-- Main Content -->

	<?php require'ffoot.php'; ?>