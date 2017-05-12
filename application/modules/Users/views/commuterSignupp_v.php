<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Xtreme Travel a Travel Agency Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
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
</head>

<body>
<!-- banner -->
<!--
	<div class="banner1">
		<div class="navigation">
			<div class="container-fluid">
				<nav class="pull">
					<ul class="nav">
						<li><a href="index.html" class="active"> Home</a></li>
						<li><a href="index.html"> About</a></li>
						<li><a href="index.html" class="menu">Popular Places<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
							<ul class="nav-sub">
								<li><a href="index.html">Place 1</a></li>
								<li><a href="index.html">Place 2</a></li>
								<li><a href="index.html">Place 3</a></li>
							</ul>
							<script>
								$( "li a.menu" ).click(function() {
								$( "ul.nav-sub" ).slideToggle( 300, function() {
								// Animation complete.
								});
								});
							</script>
						<li><a href="index.html"> Events</a></li>
						<li><a href="index.html"> Mail us</a></li>
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
						<a href="#"><img src="images/menu.png" alt=""></a>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- banner -->
<!-- sign-in -->
	<div class="sign-in">
		<div class="container">
			<div class="sign-in-form">
				<div class="in-form">
					<h3>Register as a Commuter</h3>
					<form id="sign_up" method="POST" action="<?php echo base_url(); ?>users/post_user" >
            <h style="color:green;font-weight:bold"><?php echo $this->session->flashdata('reg');?></h>
            <h style="color:red"><?php echo validation_errors('<p>'); ?></h>
            <?php if (isset($_SESSION['message']))echo $_SESSION['message'];?>


            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('uname');?>" required autofocus></p>
            <input type="text" class="form-control" name="name" placeholder="Full Name" value="<?php echo set_value('name');?>" required></p>
            <input type="text" class="form-control" name="email" placeholder="Email Address" value="<?php echo set_value('email');?>" required></p>
            <input type="text" class="form-control" name="phone" placeholder="Mobile Number" maxlength="11" value="<?php echo set_value('phone');?>" required></p>
            <select name="institution" class="frm-field required" required class="form-control"></p>
                <option value="">--Select Institution--</option>
                <?php echo $institutions; ?>
            </select>

            <input type="password" class="form-control" required placeholder="Password" name="password" value="<?php echo set_value('password');?>">
						<input type="password" class="form-control" required placeholder="Confirm Password" name="conf_pword" value="<?php echo set_value('conf_pword');?>"></p>

					<div class="ckeck-bg">
						<div class="checkbox-form">
							<div class="check-left">
								<div class="check">
									<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>I read and agree to the terms of usage</label>
								</div>
							</div>
							<div class="check-right">
                  <button  type="submit">SIGN UP</button>
							</div>
							<div class="clearfix"> </div>
							<div >
									<a href="<?php echo base_url(); ?>Login">Already a member? Login</a>
							</div>
						</div>
					</div>
        </form>
				</div>
			</div>

		</div>
	</div>
<!-- //sign-in -->
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
						<a href="#"><img src="images/11.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="images/12.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="images/13.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="clearfix"> </div>

					<div class="flickr-grid">
						<a href="#"><img src="images/16.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="images/14.jpg" alt=" " class="img-responsive" /></a>
					</div>
					<div class="flickr-grid">
						<a href="#"><img src="images/15.jpg" alt=" " class="img-responsive" /></a>
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
