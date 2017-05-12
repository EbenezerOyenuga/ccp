<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Xtreme Travel a Travel Agency Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Xtreme Travel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?php echo base_url(); ?>asset/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>asset/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>asset/css/styles.css?v=1.6" rel="stylesheet">
<!-- js -->
<script src="<?php echo base_url(); ?>asset/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/scripts.js?v=1.7"></script>
<!-- //js -->
<!--FlexSlider-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/flexslider.css" type="text/css" media="screen" />
		<script defer src="<?php echo base_url(); ?>asset/js/jquery.flexslider.js"></script>
		<script type="text/javascript">
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
<!--End-slider-script-->
<!-- pop-up-script -->
<script src="<?php echo base_url(); ?>asset/js/jquery.chocolat.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/chocolat.css" type="text/css" media="screen" charset="utf-8">
		<!--light-box-files -->
		<script type="<?php echo base_url(); ?>asset/text/javascript" charset="utf-8">
		$(function() {
			$('.view-seventh a').Chocolat();
		});
		</script>
<!-- //pop-up-script -->
<script src="<?php echo base_url(); ?>asset/js/easyResponsiveTabs.js" type="text/javascript"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Comfortaa:400,300,700' rel='stylesheet' type='text/css'>

<script type="text/javascript">
	function AlertIt() {
	var answer = confirm ("You must be logged in to book a trip. Click OK to Login.")
	if (answer)
	window.location="<?php echo base_url();?>Login";
	}
</script>

<script type="text/javascript">
    function load_source_points() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_point_type?type="+document.getElementById("source_point").value, false);
        xmlhttp.send(null);
        document.getElementById("points").innerHTML=xmlhttp.responseText;
    }

    function load_location() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_institution_points_select?inst="+document.getElementById("insti_state_dd").value, false);
        xmlhttp.send(null);
        document.getElementById("locations").innerHTML=xmlhttp.responseText;
    }

		function load_location_state() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_state_points_select?state="+document.getElementById("insti_state_dd").value, false);
        xmlhttp.send(null);
        document.getElementById("locations").innerHTML=xmlhttp.responseText;
    }

		function load_destination(source) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_point_type_dest?type="+document.getElementById("source_point").value, false);
			xmlhttp.send(null);
			document.getElementById("dest").innerHTML=xmlhttp.responseText;

    }

		function load_location_dest_inst() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_institution_points_select_dest?inst="+document.getElementById("destination").value, false);
        xmlhttp.send(null);
        document.getElementById("destination_point").innerHTML=xmlhttp.responseText;
    }

		function load_location_dest_state() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "<?php echo base_url(); ?>Points/load_state_points_select_dest?state="+document.getElementById("destination").value, false);
        xmlhttp.send(null);
        document.getElementById("destination_point").innerHTML=xmlhttp.responseText;
    }

</script>

</head>

<body>
<!-- banner -->
	<div class="banner">
		<div class="navigation">
			<div class="container-fluid">
				<nav class="pull">
					<ul class="nav">
						<li><a href="index.html" class="active"> Home</a></li>
						<li><a href="#about" class="scroll"> About</a></li>
						<li><a href="#portfolio" class="menu scroll">Popular Places<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
							<ul class="nav-sub">
								<li><a href="#portfolio" class="scroll">Place 1</a></li>
								<li><a href="#portfolio" class="scroll">Place 2</a></li>
								<li><a href="#portfolio" class="scroll">Place 3</a></li>
							</ul>
							<script>
								$( "li a.menu" ).click(function() {
								$( "ul.nav-sub" ).slideToggle( 300, function() {
								// Animation complete.
								});
								});
							</script>
						<li><a href="#events" class="scroll"> Events</a></li>
						<li><a href="#mail" class="scroll"> Mail us</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="header-top">
			<div class="container">
				<div class="head-logo">
					<a href="index.html"><span>X</span>treme Travel<i>Feeling Amazing Tour</i></a>
				</div>
				<div class="top-nav">
					<div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/menu.png" alt=""></a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="banner-info">
			<div class="container">
				<?php
					$username=$this->session->userdata('username');
					if ($username!='') {
						echo '<h1>Welcome '.$username.', Book Your Trip</h1>';
					}else {
						echo "<h1>Book Your Trip</h1>";
					}
				?>

				<div class="sap_tabs">
					<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
								<li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span><i class="glyphicon glyphicon-bed" aria-hidden="true"></i>Book Ticket</span></li>
							  <li class="resp-tab-item grid1" aria-controls="tab_item-0" role="tab"><span><i class="glyphicon glyphicon-home" aria-hidden="true"></i>Hotels</span></li>
							  <!--<li class="resp-tab-item grid2" aria-controls="tab_item-1" role="tab"><span><i class="glyphicon glyphicon-plane" aria-hidden="true"></i>Flights</span></li>
							  <li class="resp-tab-item grid3" aria-controls="tab_item-2" role="tab"><span><i class="glyphicon glyphicon-bed" aria-hidden="true"></i>Cars</span></li>
							  <!--<li class="resp-tab-item grid5" aria-controls="tab_item-3" role="tab"><span><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Destinations</span></li>-->
							  <div class="clear"></div>
						  </ul>
							<div class="resp-tabs-container">

								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
										<div class="booking-form">
											<div class="online_reservation">
													<div class="b_room">
														<div class="booking_room">
															<div class="reservation">
																<ul>
																	<li  class="span1_of_1 desti">
																		 <div class="book_date">
																			 <form method="POST" class="form-horizontal" action = "<?php echo base_url(); ?>Commuter/buy_ticket">

																				<div class="row clearfix">

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																				 		<label for="motto">Date</label>
																				 		<div class="form-group">
																				 				<div class="form-line">
																				 					<input type="text" id="datepicker" name="date" class="date form-control" placeholder="Enter Date" value="<?php //echo $date; ?>">
																				 				</div>
																				 		</div>
																				 </div>


																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																						 <label for="state">Source Point</label>
																						 <div class="form-group">
																								 <div class="form-line">
																										 <select class="form-control show-tick" name="source_point" id="source_point" onchange="load_source_points()" onclick="load_destination(this.value)">
																												 <option value="">--Select Source Point--</option>
																												 <option value="1">Institution</option>
																												 <option value="2">Outside Institution</option>
																										 </select>
																								 </div>
																						 </div>
																				 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="points" name="points">

				                                 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="locations" name="locations">

				                                 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" name="destination" id="dest">
																					 <label for="state">Destination</label>
																					 <div class="form-group">
																							 <div class="form-line">
																									 <select class="form-control show-tick" name="dest" id="desti">
																											 <option value="">--Select Destination--</option>
																									 </select>
																							 </div>
																					 </div>
				                                 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" name="destination_point" id="destination_point">
																					 <label for="state">Destination Points</label>
																					 <div class="form-group">
																							 <div class="form-line">
																									 <select class="form-control show-tick" name="dest_point">
																											 <option value="">--Select Destination Points--</option>
																									 </select>
																							 </div>
																					 </div>
				                                 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" name="trip">
																					 <label for="state">Trip</label>
																					 <div class="form-group">
																							 <div class="form-line">
																									 <select class="form-control show-tick" name="trip">
																											 <option value="">--Select Trip--</option>
																											 <option value="Single">Single</option>
																											 <option value="Return">Return</option>
																									 </select>
																							 </div>
																					 </div>
				                                 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" name="class">
																					 <label for="state">Class</label>
																					 <div class="form-group">
																							 <div class="form-line">
																									 <select class="form-control show-tick" name="class">
																											 <option value="">--Select Class--</option>
	 																										<?php echo $class; ?>
																									 </select>
																							 </div>
																					 </div>
				                                 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																				 		<label for="motto">Travel Time</label>
																				 		<div class="form-group">
																				 				<div class="form-line">
																				 					<!--<input type="hidden" id="institution_id" name="institution_id" value="<?php echo $institution_id; ?>">-->
																				 					<input type="text" name="time" class="date form-control" placeholder="Enter Travel Time" value="<?php //echo $date; ?>">
																				 				</div>
																				 		</div>
																				 </div>

																				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" name="vehicle">
																					 <label for="state">Select Vehicles</label>
																					 <div class="form-group">
																							 <div class="form-line">
																									 <select class="form-control show-tick" name="vehicle">
																											 <option value="">--Select Vehicles--</option>
																											 <option value="Single">Single</option>
																											 <option value="Return">Return</option>
																									 </select>
																							 </div>
																					 </div>
				                                 </div>
																			 </div>


																				<!-- <li  class="span1_of_1">
																					 <h5>Check In</h5>
																					 <div class="book_date">
																						<div class="book_date">
																							<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																							<input class="date" id="datepicker" type="text" name="date" placeholder="Date" required="">
																						</div>
																					 </div>
																				 </li>


																				 <li class="span1_of_1 adult">
																					<h5>Source Point</h5>
																					<!----------start section_room-----------
																					<div class="section_room">
																						 <select id="country" name="source_poing" class="frm-field required">
																							 option value="">-- Please Select Source Point--</option>
																							 <option value="1">Institution</option>
																							 <option value="2">Outside Institution</option>
																						 </select>
																					</div>
																			 </li>-->



																				<!--<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																				<input type="text" placeholder="Departure City or Hotel" class="typeahead1 input-md form-control tt-input" required="">-->
																		 </div>
																	 </li>
																</ul>
															</div>
															<!--<div class="reservation">
																<ul>
																	 <li  class="span1_of_1">
																		 <h5>Check In</h5>
																		 <div class="book_date">
																		<div class="book_date">
																			 <form>
																				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																				<input class="date" id="datepicker" type="text" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
																			 </form>
																		</div>

																		 </div>
																	 </li>
																	 <li  class="span1_of_1 left">
																		 <h5>Check Out</h5>
																		 <div class="book_date">
																			<form>
																				<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																				<input class="date" id="datepicker" type="text" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
																			 </form>
																		 </div>
																	 </li>
																	 <li class="span1_of_1 adult">
																		 <h5>Adults (18+)</h5>
																		 <!----------start section_room-----------
																		 <div class="section_room">
																			  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																					<option value="null">1</option>
																					<option value="null">2</option>
																					<option value="AX">3</option>
																					<option value="AX">4</option>
																					<option value="AX">5</option>
																					<option value="AX">6</option>
																			  </select>
																		 </div>
																	</li>
																	<li class="span1_of_1 adult">
																		 <h5>Children (0-17)</h5>
																		 <!----------start section_room-----------
																		 <div class="section_room">
																			  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																					<option value="null">1</option>
																					<option value="null">2</option>
																					<option value="AX">3</option>
																					<option value="AX">4</option>
																					<option value="AX">5</option>
																					<option value="AX">6</option>
																			  </select>
																		 </div>
																	</li>
																	<li class="span1_of_1 adult">
																		 <h5>Class</h5>
																		 <!----------start section_room-----------
																		 <div class="section_room">
																			  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																					<option value="null">Economy</option>
																					<option value="null">Business</option>
																			  </select>
																		 </div>
																	</li>
																	 <div class="clearfix"></div>
																</ul>
																	<!---strat-date-piker---->

																	<!---/End-date-piker---->
															</div>
															<link rel="stylesheet" href="css/jquery-ui.css" />
															<script src="<?php echo base_url(); ?>asset/js/jquery-ui.js"></script>
																<script>
																		$(function() {
																		$( "#datepicker,#datepicker1" ).datepicker();
																		});
																</script>

															<div class="reservation">
																<ul>
																	 <li class="span1_of_3">
																			<div class="date_btn">
																				<form>
																					<?php
																					$username=$this->session->userdata('username');
																					if ($username!='') {
																						echo '<input type="submit" value="Submit"/>';
																					}else {
																						echo '<input type="submit" value="Submit" onclick="javascript:AlertIt()"/>';
																					}

																					?>
																				</form>
																			</div>
																	 </li>
																	 <div class="clearfix"></div>
																</ul>
															</div>
														</form>
														</div>
														<div class="clearfix"></div>
													</div>
											</div>
											<!---->
										</div>
									</div>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
										<div class="flights">
											<div class="reservation">
												<ul>
													<li  class="span1_of_1 desti1">
														 <div class="book_date">
															 <form>
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<input type="text" placeholder="From" class="typeahead1 input-md form-control tt-input" required="">
															 </form>
														 </div>
													 </li>
													 <li  class="span1_of_1 desti1">
														 <div class="book_date">
															 <form>
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<input type="text" placeholder="To" class="typeahead1 input-md form-control tt-input" required="">
															 </form>
														 </div>
													 </li>
													 <div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													 <li  class="span1_of_1">
														 <h5>Departure</h5>
														 <div class="book_date">
														<form>
															<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
															<input class="date" id="datepicker" type="text" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
														 </form>
														 </div>
													 </li>
													 <li  class="span1_of_1 left">
														 <h5>Return</h5>
														 <div class="book_date">
														<form>
															<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
															<input class="date" id="datepicker" type="text" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
														 </form>
														 </div>
													 </li>
													 <div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													<li class="span1_of_1 adult">
														 <h5>Traveller</h5>
														 <!----------start section_room----------->
														 <div class="section_room">
															  <select id="1 Traveller" onchange="change_country(this.value)" class="frm-field required sect1">
																	<option value="null">1 Traveller</option>
																	<option value="null">2 Traveller</option>
																	<option value="AX">3 Traveller</option>
																	<option value="AX">4 Traveller</option>
																	<option value="AX">5 Traveller</option>
																	<option value="AX">6 Traveller</option>
															  </select>
														 </div>
													</li>
													<li class="span1_of_1 adult">
															 <h5>Children (0-17)</h5>
															 <!----------start section_room----------->
															 <div class="section_room">
																  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																		<option value="null">1</option>
																		<option value="null">2</option>
																		<option value="AX">3</option>
																		<option value="AX">4</option>
																		<option value="AX">5</option>
																		<option value="AX">6</option>
																  </select>
															 </div>
														</li>
														<li class="span1_of_1 adult">
															 <h5>Class</h5>
															 <!----------start section_room----------->
															 <div class="section_room">
																  <select id="country" onchange="change_country(this.value)" class="frm-field required">
																		<option value="null">Economy</option>
																		<option value="null">Business</option>
																  </select>
															 </div>
														</li>
													<div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													 <li class="span1_of_3">
															<div class="date_btn">
																<form>
																	<input type="submit" value="Search Flights" />
																</form>
															</div>
													 </li>
													 <div class="clearfix"></div>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									<div class="facts">
										<div class="cars">
											<div class="reservation">
												<ul>
													<li  class="span1_of_1 desti1">
														 <div class="book_date">
															 <form>
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<input type="text" placeholder="Pick Up Location" class="typeahead1 input-md form-control tt-input" required="">
															 </form>
														 </div>
													 </li>
													 <li  class="span1_of_1 desti1">
														 <div class="book_date">
															 <form>
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<input type="text" placeholder="Drop Off Location" class="typeahead1 input-md form-control tt-input" required="">
															 </form>
														 </div>
													 </li>
													 <div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													 <li  class="span1_of_1">
														 <h5>Pick Up Date</h5>
														 <div class="book_date">
														<form>
															<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
															<input class="date" id="datepicker" type="text" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
														 </form>
														 </div>
													 </li>
													 <li  class="span1_of_1 left">
														 <h5>Drop Off Date</h5>
														 <div class="book_date">
															<form>
																<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
																<input class="date" id="datepicker" type="text" value="19/10/2015" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '19/10/2015';}" required="">
															</form>
														 </div>
													 </li>
													 <div class="clearfix"> </div>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													 <li class="span1_of_3">
															<div class="date_btn date_car">
																<form>
																	<input type="submit" value="Search Cars" />
																</form>
															</div>
													 </li>
													 <div class="clearfix"></div>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
									<div class="facts">
										<div class="destination">
											<div class="reservation">
												<ul>
													<li  class="span1_of_1 desti">
														 <div class="book_date">
															 <form>
																<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
																<input type="text" placeholder="City ,Region Or Country" class="typeahead1 input-md form-control tt-input" required="">
															 </form>
														 </div>
													 </li>
												</ul>
											</div>
											<div class="reservation">
												<ul>
													 <li class="span1_of_3">
															<div class="date_btn date_car">
																<form>
																	<input type="submit" value="Reach Destinations" />
																</form>
															</div>
													 </li>
													 <div class="clearfix"></div>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
						</script>
				<div class="login">
					<a href="<?php echo base_url(); ?>Login">Login</a>
				</div>
			</div>
		</div>
	</div>
<!-- //banner -->
<!-- about-us -->
	<div id="about" class="about">
		<div class="container">
			<h3>About Us</h3>
			<p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
			<div class="about-grids">
				<div class="col-md-6 about-grid">
					<div class="about-grid1">
						<div class="itis">
							<h4>voluptas nulla pariatur</h4>
						</div>
						<div class="hji">
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
						</div>
						<div class="about-grid1-pos">
							<img src="images/1.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
				</div>
				<div class="col-md-6 about-grid">
					<div class="about-grid2">
						<div class="col-xs-2 about-grid2-left">
							<p>01.</p>
						</div>
						<div class="col-xs-10 about-grid2-right">
							<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
								maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="about-grids">
				<div class="col-md-6 about-grid">
					<div class="about-grid2">
						<div class="col-xs-2 about-grid2-left">
							<p>02.</p>
						</div>
						<div class="col-xs-10 about-grid2-right">
							<p>Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus
								maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 about-grid">
					<div class="about-grid1 about-grd1">
						<div class="itis">
							<h4>voluptas nulla pariatur</h4>
						</div>
						<div class="hji">
							<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
						</div>
						<div class="about-grid1-pos1">
							<img src="images/2.jpg" alt=" " class="img-responsive" />
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!-- //about-us -->
<!-- about-bottom -->
	<div class="about-bottom">
		<div class="container">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="about-bottom-grids">
								<div class="col-md-4 about-bottom-grid-left">
									<h3>ea commodi consequatur</h3>
									<p>Quibusdam et aut officiis debitis<span>Xtreme Travel</span></p>
								</div>
								<div class="col-md-8 about-bottom-grid-right">
									<div class="col-md-4 about-bottom-grid-right-grid">
										<div class="about-bottom-grid-right-grid1">
											<img src="images/4.jpg" alt=" " class="img-responsive" />
											<div class="about-bottom-pos">
												<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											</div>
											<p>officiis debitis</p>
										</div>
									</div>
									<div class="col-md-4 about-bottom-grid-right-grid">
										<div class="about-bottom-grid-right-grid1">
											<img src="images/5.jpg" alt=" " class="img-responsive" />
											<div class="about-bottom-pos">
												<span class="glyphicon glyphicon-random" aria-hidden="true"></span>
											</div>
											<p>officiis debitis</p>
										</div>
									</div>
									<div class="col-md-4 about-bottom-grid-right-grid">
										<div class="about-bottom-grid-right-grid1">
											<img src="images/6.jpg" alt=" " class="img-responsive" />
											<div class="about-bottom-pos">
												<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
											</div>
											<p>officiis debitis</p>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
						<li>
							<div class="about-bottom-grids">
								<div class="col-md-4 about-bottom-grid-left">
									<h3>ea commodi consequatur</h3>
									<p>Quibusdam et aut officiis debitis<span>Xtreme Travel</span></p>
								</div>
								<div class="col-md-8 about-bottom-grid-right">
									<div class="col-md-4 about-bottom-grid-right-grid">
										<div class="about-bottom-grid-right-grid1">
											<img src="images/8.jpg" alt=" " class="img-responsive" />
											<div class="about-bottom-pos">
												<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
											</div>
											<p>officiis debitis</p>
										</div>
									</div>
									<div class="col-md-4 about-bottom-grid-right-grid">
										<div class="about-bottom-grid-right-grid1">
											<img src="images/9.jpg" alt=" " class="img-responsive" />
											<div class="about-bottom-pos">
												<span class="glyphicon glyphicon-random" aria-hidden="true"></span>
											</div>
											<p>officiis debitis</p>
										</div>
									</div>
									<div class="col-md-4 about-bottom-grid-right-grid">
										<div class="about-bottom-grid-right-grid1">
											<img src="images/7.jpg" alt=" " class="img-responsive" />
											<div class="about-bottom-pos">
												<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
											</div>
											<p>officiis debitis</p>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</li>
					</ul>
				</div>
			</section>
		</div>
	</div>
<!-- //about-bottom -->
<!-- awesome -->
	<div class="awesome">
		<div class="container">
			<div class="col-md-4 awesome-left">
				<h3>voluptas nulla</h3>
				<p>Too many of us look upon Americans as dollar chasers.
					This is a cruel libel, even if it is reiterated thoughtlessly.</p>
			</div>
			<div class="col-md-8 awesome-right">
				<div class="col-md-4 awesome-right-grid">
					<div class="awesome-right-grid1 view1 fifth-effect">
						<img class="img-responsive" src="images/10.jpg" alt=" " />
						<div class="social-icons">
							<ul>
								<li><a href="#" class="p"></a></li>
								<li><a href="#" class="facebook"></a></li>
								<li><a href="#" class="twitter"></a></li>
							</ul>
						</div>
						<div class="mask"></div>
					</div>
					<h4>man who chooses</h4>
					<p>Place // Photography</p>
				</div>
				<div class="col-md-4 awesome-right-grid">
					<div class="awesome-right-grid1 view1 fifth-effect">
						<img class="img-responsive" src="images/1.jpg" alt=" " />
						<div class="social-icons">
							<ul>
								<li><a href="#" class="p"></a></li>
								<li><a href="#" class="facebook"></a></li>
								<li><a href="#" class="twitter"></a></li>
							</ul>
						</div>
						<div class="mask"></div>
					</div>
					<h4>man who chooses</h4>
					<p>Place // Photography</p>
				</div>
				<div class="col-md-4 awesome-right-grid">
					<div class="awesome-right-grid1 view1 fifth-effect">
						<img class="img-responsive" src="images/2.jpg" alt=" " />
						<div class="social-icons">
							<ul>
								<li><a href="#" class="p"></a></li>
								<li><a href="#" class="facebook"></a></li>
								<li><a href="#" class="twitter"></a></li>
							</ul>
						</div>
						<div class="mask"></div>
					</div>
					<h4>man who chooses</h4>
					<p>Place // Photography</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //awesome -->
<!-- portfolio -->
	<div id="portfolio" class="portfolio">
		<div class="container">
			<h3>Popular Places</h3>
			<p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
			<div class="main">
                <div class="view view-seventh">
					<a href="images/11.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/11-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/12.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/12-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/13.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/13-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/14.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/14-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
            </div>
			<div class="main">
                <div class="view view-seventh">
					<a href="images/15.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/15-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/16.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/16-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/17.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/17-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/12.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/12-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
            </div>
			<div class="main">
                <div class="view view-seventh">
					<a href="images/14.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/14-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/12.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/12-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/13.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/13-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
                <div class="view view-seventh">
                    <a href="images/11.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
						<img src="images/11-.jpg" />
						<div class="mask">
							<h2>Necessitatibus</h2>
							<p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
						</div>
					</a>
                </div>
            </div>
		</div>
	</div>
<!-- //portfolio -->
<!-- twitter-text -->
	<div id="dfg" class="twitter-text">
		<div class="container">
			<div class="twitter-txt">
				<h3><a href="mailto:info@example.com">info@example.com</a> Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero.</h3>
				<p>about 13 hours,12 minutes ago</p>
			</div>
		</div>
	</div>
<!-- //twitter-text -->
<!-- events -->
	<div id="events" class="events">
		<div class="container">
			<h3>News & <span>Events</span></h3>
			<p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
			<div class="events-grids">
				<div class="col-md-4 events-grid">
					<div class="cal">
						<img src="images/3.png" alt=" " class="img-responsive" />
						<div class="cal-info">
							<h4>molestiae consequatur</h4>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
								quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
								voluptas nulla pariatur</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 events-grid">
					<div class="cal">
						<img src="images/3.png" alt=" " class="img-responsive" />
						<div class="cal-info">
							<h4>molestiae consequatur</h4>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
								quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
								voluptas nulla pariatur</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 events-grid">
					<div class="cal">
						<img src="images/3.png" alt=" " class="img-responsive" />
						<div class="cal-info">
							<h4>molestiae consequatur</h4>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
								quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
								voluptas nulla pariatur</p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="events-grids1">
				<div class="col-md-4 events-grid1">
					<div class="events-grid11">
						<span>01.</span>
						<div class="events-grid11-info">
							<h4><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i><label>31 October 2015</label>molestiae consequatur</h4>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
								quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
								voluptas nulla pariatur</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 events-grid1">
					<div class="events-grid11">
						<span>02.</span>
						<div class="events-grid11-info">
							<h4><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i><label>31 October 2015</label>molestiae consequatur</h4>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
								quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
								voluptas nulla pariatur</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 events-grid1">
					<div class="events-grid11">
						<span>03.</span>
						<div class="events-grid11-info">
							<h4><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i><label>31 October 2015</label>molestiae consequatur</h4>
							<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
								quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo
								voluptas nulla pariatur</p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //events -->
<!-- subscribe -->
	<div class="subscribe">
		<div class="container">
			<h3>Subscribe if you like what you see</h3>
			<p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
			<form>
				<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
				<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
				<input type="submit" value="Subscribe">
			</form>
			<div class="men-heart-clock-twitter">
				<div class="col-md-3 men-text">
					<img src="images/men.png" alt=" " />
					<div class="men-txt">
						<p>230<span>Customers</span></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 men-text">
					<img src="images/heart.png" alt=" " />
					<div class="men-txt">
						<p>12<span>Awards</span></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 men-text">
					<img src="images/clock.png" alt=" " />
					<div class="men-txt">
						<p>2380<span>Completed Projects</span></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 men-text">
					<img src="images/twitter.png" alt=" " />
					<div class="men-txt">
						<p>50890<span>Followers</span></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //subscribe -->
<!--contact-->
	<div id="mail" class="contact">
		<div class="container">
			<h3>How to Find Us</h3>
			<p class="ever">To take a trivial example, which of us ever undertakes laborious physical exercise.</p>
			<div class="contact-grids">
				<div class="col-md-7 contact-right">
					<form>
						<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
						<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="text" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
						<textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
						<input type="submit" value="Submit" >
					</form>
				</div>
				<div class="col-md-5 contact-left">
					<p>"Lorem Ipsum"is the common name dummy text often used in the design, printing, and type setting industriescommon name dummy text often used in the design, printing, and type setting industries. "</p>
					<ul>
						<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
							756 globel Place, Australia.
						</li>
						<li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
							+123 2222 222
						</li>
						<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
							<a href="mailto:info@example.com">mail@example.com</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4376542.827441857!2d133.94238155277205!3d-25.73870281693212!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2b2bfd076787c5df%3A0x538267a1955b1352!2sAustralia!5e0!3m2!1sen!2sin!4v1439377130002" allowfullscreen></iframe>
	</div>
<!--//contact-->
<!-- footer-top -->
	<div class="footer-top">
		<div class="container">
			<div class="col-md-3 footer-top-grid">
				<h3>About <span>Travel</span></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
					id arcu neque, at convallis est felis.</p>
			</div>
			<div class="col-md-3 footer-top-grid">
				<h3>THE <span>TAGS</span></h3>
				<div class="unorder">
					<ul class="tag2">
						<li><a href="#">awesome</a></li>
						<li><a href="#">strategy</a></li>
						<li><a href="#">development</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="#">css</a></li>
						<li><a href="#">photoshop</a></li>
						<li><a href="#">photography</a></li>
						<li><a href="#">html</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="#">awesome</a></li>
						<li><a href="#">strategy</a></li>
						<li><a href="#">development</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="#">css</a></li>
						<li><a href="#">photoshop</a></li>
						<li><a href="#">photography</a></li>
						<li><a href="#">html</a></li>
					</ul>
					<ul class="tag2">
						<li><a href="#">awesome</a></li>
						<li><a href="#">strategy</a></li>
						<li><a href="#">development</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3 footer-top-grid">
				<h3>Latest <span>Tweets</span></h3>
				<ul class="twi">
					<li>I like this awesome freebie. Check it out <a href="mailto:info@example.com" class="mail">
					@http://t.co/9vslJFpW</a> <span>ABOUT 15 MINS</span></li>
					<li>I like this awesome freebie. You can view it online here<a href="mailto:info@example.com" class="mail">
					@http://t.co/9vslJFpW</a> <span>ABOUT 2 HOURS AGO</span></li>
				</ul>
			</div>
			<div class="col-md-3 footer-top-grid">
				<h3>Flickr <span>Feed</span></h3>
				<div class="flickr-grids">
					<div class="flickr-grid">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/11.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/12.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/13.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>

					<div class="flickr-grid">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/16.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/14.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="<?php echo base_url(); ?>asset/images/15.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer-top -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<ul>
					<li><a href="index.html"><i>X</i>treme Travel</a><span> |</span></li>
					<li><p>The awesome agency. <span>0800 (123) 4567 // Australia 746 PO</span></p></li>
				</ul>
			</div>
			<div class="footer-right">
				<p>© 2016 Xtreme Travel. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>
