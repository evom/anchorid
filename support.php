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

					<form action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" class="form" role="form support" method="POST">
						<?php
							$success = " ";
							if(isset($_GET['success'])){
								$success = $_GET['success'];
						?>
							<div class="alert alert-success form-success error_mess" style="display: block;">Your message has been successfully received.</div>
						<?php $success = " ";}	?>
						<div class="alert alert-error form-error error_mess"></div>

						<input type=hidden name="oid" value="00DG0000000kr9o">
						<input type=hidden name="retURL" value="http://qbpn.com/anchorid/support.php?success=1">
						<div class="form-group">
						<label for="last_name">What is your name, or nickname?</label>
						<input  id="last_name" maxlength="80" name="last_name" size="20" type="text" class="form-control" />
						</div>
						<div class="form-group">
						<label for="email">We need your email to contact you:</label>
						<input  id="email" maxlength="80" name="email" size="20" type="text" class="form-control" />
						</div>
						<div class="form-group">
						<label for="00NG000000C6iRw">Do you have a Twitter handle? </label>
						<input id="00NG000000C6iRw" maxlength="20" name="00NG000000C6iRw" size="20" type="text" class="form-control" />
						</div>
						<div class="form-group">
						<label for="description">Questions for us? </label>
						<textarea id="description" name="description" class="form-control"></textarea>
						</div>
						<button class="btn btn-success" name="submit" type="submit">Submit</button>
					</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
$(function(){
	$('div.form-success').delay(6000).slideUp();
}); 
</script>
<?php include "includes/footer.php"; ?>
</body>
</html>