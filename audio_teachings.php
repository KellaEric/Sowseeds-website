<?php
	require_once './controller/database.php';
    require_once './models/Teaching.php';
    require_once './models/Database.php';
    session_start();
    
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Our Teachings</title>
	<link rel="icon" href="./assets/SIM logo.png" type="image/gif">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="audio_teachings.css">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #007F00;">
		<div class="container">
			<a class="navbar-brand" href="#"><img width="200" height="100" src="./assets/SIM logo.png" > Sowseeds</a>
			<!-- Hamburger -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <!-- Collapses navbar items into Hamburger -->
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav">
		    	<li class="nav-item active dropdown">
			        <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          About Us<span class="sr-only">(current)</span>
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="index.html">Our Purpose</a>
			          <a class="dropdown-item" href="our_pastor_new.html">Our Pastor</a>
			          <a class="dropdown-item" href="our_team.html">Our Team</a>
			          <a class="dropdown-item" href="our_values_new.html">Our Values</a>
			          <a class="dropdown-item" href="statement_of_faith_new.html">Statement of Faith</a>
			          <a class="dropdown-item" href="contact_us_new.php">Contact Us</a>
			          
			    </li>
		      
		      <li class="nav-item ">
		        <a class="nav-link" href="events_new.php">Events </a>
		      </li>
		      <li class="nav-item ">
		        <a class="nav-link" href="mission_vision_new.html">Mission & Vision </a>
		      </li>
		     <li class="nav-item">
		        <a class="nav-link" href="audio_teachings.php">Audio Teachings</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="directions_new.html">Directions </a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="donations.php">Donations</a>
		      </li>
		    </ul>
			</div>
 			
 		</div>
	</nav>

	<div class="container teachings">

		
		<div class="row">
			<div class="col-lg-12">
				<div id="content">
					<h1>Our Teachings</h1>
				</div>
			</div>
		</div>
		<div class="jumbotron content">
			<div class="teaching">
				<?php
					$teaching= new Teaching();
					$teachings=$teaching->getTeachings();

					foreach($teachings as $key){
						echo '<p class="titles">';
						echo $key->teachDay.', '.$key->teachDate.'<br>';
						echo 'Minister: '.$key->minister.' <br>';
						echo 'Msg: <strong>'.$key->title.'</strong><br> ';
						echo 'A Must Hear Msg. <br>';
						echo 'Listen, be educated, do the work &  be blessed <br>';
						echo '</p>';
						echo '<audio src="./assets/sounds/'.$key->audioFile.'" type="audio/mpeg" controls></audio';

						echo '<br><br>';
					}
				?>
				
			</div>
		</div>
	</div>
	<footer class="jumbotron" id="footer">
		<div class="container">
			<div class="row">

				<div class="col-sm-6">
					<div >
						<h4>Sowseeds International Ministries</h4>
						<p>Camara, Accra</p>
						<p>(+233) 24-438-4937</p>
						<p>info@sowseeedsintlministries.com</p>
					</div>
				</div>
				<div class="col-sm-6">
					<div >
						<a href="https://web.facebook.com/Sowseeds-International-Ministries-109495494033767"><i class="fa fa-facebook-square fa-5x" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<p>Coming up&copy; 2024. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>