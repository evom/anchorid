<!DOCTYPE html>
<html>
<head>
	<title>Contact Us - AnchorID</title>
	<?php include('includes/head.php'); ?>
</head>
<body>
<!-- Header Starts Here -->
<?php include "includes/header.php";?>
<div class="outer-container">
<div class="container">
	<div class="row contact-row-setting">

		<div class="col-md-9 pull-right top-container">
			<h1 class="main-heading">Contact Us</h1>
			<div class="inner-sub-menus"></div>
			<div class="row">
				<div class="contact-map">
					<div id="map-canvas" style="width: 100%; height:100%; border-radius:10px; margin-bottom:30px;"></div>
				</div>

				<div class="col-md-5">
					<div style="width:100%;" class="contact contact-setting">
			             <div class="contact-detail home-detail"><span class="fa fa-home"></span>

			             <p class="para">One North Front Street, <br>Suite 103, Kingston, NY 12401</p></div>

			               <div class="contact-detail"><span class="fa fa-envelope"></span><p><a href="mailto:questions@AnchorID.com">Questions? questions@AnchorID.com</a></p></div>

			              <div class="contact-detail last-child-detail"><span class="fa fa-envelope"></span><p><a href="mailto:press@AnchorID.com">Media Contact:press@AnchorID.com</a></p></div>
			         </div>
			    </div>
			    <div class="col-md-7">
			    	<form role="form" class="contact-form" id="contact_form" action="mail.contact.php" method="post">
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
		<!-- End of 9 Columns -->
		<div class="col-md-3">
			<div id="sidebar">
				<?php include('includes/sidebar.php'); ?>	
			</div>		
		</div>

	</div>
</div>
</div>

<script type="text/javascript">
$(function(){
	$('#contact_form').on('submit',function(e){
		$.ajax({
			type: "post",
			url: "mail.contact.php",
			data: $("#contact_form").serialize(),
			success: function(data) {
				if(data){
					$('div.form-success').html("Your message has been successfully received.").slideDown().delay(6000).slideUp();
					$('.notEmpty').val("");
				}
				// change_captcha();
				return false;
			}
		});
		// $.ajax({
		// 	url : 'captcha/post.php',
		// 	type : 'post',
		// 	data : $("#contact_form").serialize(),
		// 	success : function(response) {
		// 		if( response == 1) {
		// 			$.ajax({
		// 				type: "post",
		// 				url: "mail.testimonial.php",
		// 				data: $("#contact_form").serialize(),
		// 				success: function(data) {
		// 					console.log(data);
		// 					if(data){
		// 						$('div.form-success').html(data).slideDown().delay(6000).slideUp();
		// 						$('.notEmpty').val("");
		// 					}
		// 					change_captcha();
		// 					return false;
		// 				}
		// 			});
		// 		} else {
		// 			var msg = "Captcha code incorrect. Please Enter the write captcha code."
		// 			$('div.form-error').html(msg).slideDown().delay(5000).slideUp();
		// 		}
		// 	}
		// });
		// change_captcha();
		return false;
	});
}); 
</script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	function initialize() {
    // Create an array of styles.
    var styles = [
    {
    	stylers: [
    	{ hue: "#80A035" },
    	{ saturation: 0 }
    	]
    },{
    	featureType: "road",
    	elementType: "geometry",
    	stylers: [
    	{ lightness: 100 },
    	{ visibility: "simplified" }
    	]
    },{
    	featureType: "road",
    	elementType: "labels",
    	stylers: [
    	{ visibility: "off" }
    	]
    }
    ];

   

  // Create a new StyledMapType object, passing it the array of styles,
  // as well as the name to be displayed on the map type control.
  var styledMap = new google.maps.StyledMapType(styles,
  	{name: "Styled Map"});



  var myLatlng = new google.maps.LatLng(41.935609,-74.018951);
  var mapOptions = {
  	zoom: 15,
  	center: myLatlng,

  	mapTypeControlOptions: {
  		mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
  	}
  };
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  //Associate the styled map with the MapTypeId and set it to display.
  map.mapTypes.set('map_style', styledMap);
  map.setMapTypeId('map_style');


  var marker = new google.maps.Marker({
  	position: myLatlng,
  	map: map,
  	title: 'One North Front Street, Suite 103, Kingston, NY 12401',
  	icon: ''
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
<?php include "includes/footer.php"; ?>
</body>
</html>