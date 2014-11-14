<!DOCTYPE html>
<html>
<head>
	<title>Support - AnchorID</title>
	<?php include('includes/head.php'); ?>
</head>
<body>
<!-- Header Starts Here -->
<?php include "includes/header.php";?>
<div class="outer-container">
<div class="container">
	<div class="row contact-row-setting">
		
		<div class="col-md-12">
		<h1 class="main-heading">Support</h1>
			<div class="row"> 
				<div class="col-md-6">
					<div style="width:100%;" class=" contact support form1">
			             <div class="contact-detail home-detail"><span class="fa fa-home"></span>

			             <p class="para">One North Front Street, <br>Suite 103, Kingston, NY 12401 
			            	<a target="_blank" href="https://www.google.co.in/maps/place/1+N+Front+St+%23103,+Kingston,+NY+12401,+USA/@41.9362235,-74.0194338,17z/data=!4m2!3m1!1s0x89dd0f782e254c03:0xea38523c89273801?hl=en" class="location">[Locate Us on Google Maps]</a>
			             </p>
			         	 </div>

			               <div class="contact-detail"><span class="fa fa-envelope"></span><p><a href="mailto:questions@AnchorID.com">Questions? questions@AnchorID.com</a></p></div>

			              <div class="contact-detail last-child-detail"><span class="fa fa-envelope"></span><p><a href="mailto:press@AnchorID.com">Media Contact: press@AnchorID.com</a></p></div>
			         </div>
			    </div>
			    <div class="col-md-6">
			    	<form role="form" class="contact-form support-form form" id="contact_form" action="mail.contact.php" method="post">
			    		<div class="alert alert-error form-error error_mess"></div>
			    		<div class="alert alert-success form-success error_mess"></div>
			    		<div class="form-group">
			    			<label for="name">What is your name, or nickname?</label>
			    			<input type="text" name="name" class="form-control" id="name" placeholder="">
			    		</div>
			    		<div class="form-group">
			    			<label for="email">We need your email to contact you:</label>
			    			<input type="text" name="email" class="form-control" id="email" placeholder="">
			    		</div>
			    		<div class="form-group">
			    			<label for="twitter">Do you have a Twitter handle? </label>
			    			<input type="text" name="twitter_handle" class="form-control" id="twitter" placeholder="">
			    		</div>
			    		<div class="form-group">
			    			<label for="comments">Questions for us? </label>
			    			<textarea name="question" class="form-control" rows="3"></textarea>
			    		</div>
			    		<button type="submit" class="btn btn-success ">Submit</button>
			    	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>