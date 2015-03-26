<!Doctype HTML>
<html>
<head>
	<title>Smart Cube</title>
	<!-- Basic Page Needs
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<meta name="description" content="Connect to your home from anywhere around the world, control 
				lights, doors, speakers, televisions and so much more." />
	<meta name="author" content="Smart Cube">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<!-- Mobile Specific Metas
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- FONT
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	<!-- CSS
	–––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="css/custom.css" />
</head>
<body>
	<div class="fullLoader">
		<img id="loader" src="img/loader_2.png" alt="logo"/>
		<img src="img/logo.png" alt="logo"/>
	</div>
	<script>
	$(function(){
		$('.fullLoader').delay(500).fadeOut(500);
	});
	</script>
	<div class="nav">
		
<!-- 		<li class="user_form">Sign In</li>
		<li class="user_form">Register</li> -->
		<a href="#about"><li>About</li></a>
		<a href="#prices"><li>Prices</li></a>
		<a href="#contact"><li>Contact</li></a>
		<li class="main">Smart Cube</li>
		<a href="https://www.facebook.com/smartcube_home">
			<li class="facebook">Facebook</i></li>
		</a>
		<a href="https://twitter.com/smartcube_home">
			<li class="twitter">Twitter</li>
		</a>
		<a href="#contact"><li>App</li></a>
	</div>
	<div class="contentArea">
		<h1>
			About
		</h1>
		<p>
			<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, rerum velit assumenda omnis id ratione ipsa quos architecto fugit quo fugiat aut quae est nihil iusto, illo corporis deserunt quibusdam.</span>
			<span>Atque hic, dolorem mollitia autem praesentium. Aperiam iure quaerat quod impedit sit dicta hic inventore dolor nostrum quis sint veritatis eum laudantium fuga, facilis animi soluta totam ratione repellat expedita!</span>
			<span>Dolorum earum exercitationem facilis ut eveniet atque nemo esse rem, ipsum nobis enim fuga magnam obcaecati quae aut numquam rerum quaerat perferendis. Illum consectetur labore mollitia eaque quis porro atque!</span>
		</p>
			<video src="./img/SmartCube_Dashboard.mp4" autoplay loop/></video>
		<p>
			<span>Voluptatum maiores aut neque, sed accusantium cumque quo praesentium cupiditate asperiores, id eligendi possimus sit repellendus corporis voluptas illum atque vel fugit, molestias aspernatur ipsum incidunt autem? Harum, sunt, omnis.</span>
			<span>Magni dolores, ducimus sunt voluptatibus, neque voluptate laboriosam itaque blanditiis veniam incidunt fuga! Fuga magnam est, quia reprehenderit odit ab, accusantium sint pariatur officiis nobis, voluptate cum tenetur similique exercitationem.</span>
			<span>Reiciendis amet illum cupiditate error! Magnam, velit, recusandae quidem exercitationem, dolor dolore pariatur totam cum reiciendis repellat culpa beatae quis perferendis doloremque assumenda ratione adipisci voluptate nostrum libero dolores ea!</span>
			<span>Beatae facilis libero non dignissimos nulla deleniti, quia vero quaerat cum quas, aliquam facere, quod nisi, repudiandae fuga recusandae! Libero optio magnam qui rerum iusto nulla suscipit voluptas saepe rem.</span>
			<span>Earum qui voluptas voluptatum veniam rerum sit vitae alias similique fuga laboriosam ullam totam harum fugit unde hic delectus quibusdam, inventore eius dolorum quae autem sed excepturi esse quo. Harum.</span>
			<span>Blanditiis nam ea optio ex tenetur voluptatibus, nihil doloremque laboriosam veritatis dolorem qui tempora adipisci ab nisi accusantium necessitatibus eveniet, provident minus recusandae, officia sit repudiandae sed consequuntur quasi. Ratione.</span>
			<span>Eligendi dolorem voluptatem enim velit aut qui odit accusantium, distinctio laudantium doloribus, excepturi soluta rerum corporis vero, saepe magni adipisci dolor quasi fugiat alias rem et. Voluptatibus aspernatur pariatur ducimus.</span>
		</p>
		<div class="mobileCover">
			<span>Download App Here</span>
		</div>
	</div>
	<div class="cover">
		<div class="text">
			<img src="img/logo.png" alt="logo"/>
			<p>Connect to your home from anywhere around the world, control 
				lights, doors, speakers, televisions and so much more.
			</p>
			<div class="formButton" data-focus="login">Sign In</div>
			<div class="formButton" data-focus="register">Register</div>
		</div>
		<div class="switcher">
		</div>
	</div>
 	<div class="register">
		<i class="fa fa-close"></i>
		<div class="wrap">
			<h1>Smart Cube</h1>
			<h2>Sign In</h2>
			<form id="login" action="" method="">
				<input class="bb" type="email" name="username" placeholder="Enter Email" required value="AP@fake.co.uk"/>
				<input class="pad-button" type="password" name="password" placeholder="Enter Password" required value="superpass"/>
				<a href="dashboard">
				<button type="button">
					<i class="fa fa-arrow-right"></i>
				</button>
				</a>
			</form>
			<h2>Register</h2>
			<!--Here we show a email input for users to register
			A dynamic input for a verification code will shown-->
			<div style="position:relative">
			<input id="register" class="pad-button" type="email" name="email" placeholder="Enter Email" autocomplete="off" required/>
			<button id="register_button" type="button">
				<i class="fa fa-arrow-right"></i>
			</button>			
			</div>
			<div class="spinner">
			  <div class="bounce1"></div>
			  <div class="bounce2"></div>
			  <div class="bounce3"></div>
			</div>
			<div class="email_message"></div>
		</div>
	</div>
	<script src="js/cover_image.js"></script>
	<script src="js/reg_and_log.js"></script>
	<script src="js/index.js"></script>
	<script type="text/javascript">
	$(function(){
		var url = window.location.href.replace("http://louisdickinson.com/smartcube/#","");
		console.log(url);
		if(url == "register" || url == "signin"){
			$('.fa-close,video,.nav,.cover,.contentArea').remove();
			$('input[type="email"]').focus();
			$('.register').show();
			if(url == "register"){
				$('h2:contains("Sign In"),#login').remove();
				$('.wrap').css('height','185px');
			}else if(url == "signin"){
				$('h2:contains("Register"),#register').remove();
				$('.wrap').css('height','240px');
			}
			controlSlideshow();
		}
		if(url.indexOf("?") != -1){
			var email = url.split("?");
			var on = 'onclick="$(this).toggleClass(\'active\');"';
			$('head').append('<link rel="stylesheet" href="css/guest.css" />');
			$('body').html('<div class="guest">' + 
						   '<div class="controlPanel">' + 
						   '<h1>Smart Cube</h1>' +
						   '<h2>Guest of ' + email[0] + '</h2>' + 
						   '<ul data-id="My Devices">' +
						   '<li id="light" class="active" ' + on + '>Light<span></span></li>' +
						   '<li ' + on + '>Door<span></span></li>' + 
						   '<li>Temp' +
						   '<input type="range" value="10" min="10" max="40" class="slider">' +
						   '<div class="value"></div>' +
						   '</li>' +
						   '</ul><h3><a href="http://louisdickinson.com/smartcube">Check out the full site here</a></h3>' + 
						   '</div>' + 
						   '</div>');
		}
		if($(window).width() < 800){
			$('.nav .main').click(function(){
				$('.nav li').not(".main").slideToggle();
			});
		}
		
		$('#homeButton').click(function(){
			$("html, body").animate({ scrollTop: "0px" },800);
		});
		
		$('.formButton').click(function(){
			controlSlideshow(1);
			var fo = $(this).attr('data-focus');
			$('.register').fadeIn();
			$('#' + fo + ', #' + fo + ' input[type="email"]').focus();
		});
		
		var target = $('#navbar-container');
		var targetHeight = target.outerHeight();

		$(document).scroll(function(e){
			var scrollPercent = (targetHeight - window.scrollY) / targetHeight;
			if(scrollPercent >= 0){
				target.css('background:','rgba(0,0,0,0.8)');
			}  
		});
	});
	</script>
</body>
</html>