<?php
	require_once './controller/database.php';
	require_once './models/Database.php';
	require_once './models/Event.php';
    session_start();
    
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Events</title>
	<link rel="icon" href="./assets/SIM logo.png" type="image/gif">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="events_new.css">
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
		      <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          About Us
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="index.html">Our Purpose</a>
			          <a class="dropdown-item" href="our_pastor_new.html">Our Pastor</a>
			          <a class="dropdown-item" href="our_team.html">Our Team</a>
			          <a class="dropdown-item" href="our_values_new.html">Our Values</a>
			          <a class="dropdown-item" href="statement_of_faith_new.html">Statement of Faith</a>
			          <a class="dropdown-item" href="contact_us_new.php">Contact Us</a>
			          
			    </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="events_new.php">Events <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="mission_vision_new.html">Mission & Vision</a>
		      </li>
		     <li class="nav-item">
		        <a class="nav-link" href="audio_teachings.php">Audio Teachings</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="directions_new.html">Directions</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="donations.php">Donations</a>
		      </li>
		    </ul>
			</div>
 			
 		</div>
	</nav>
		<div class="container">
		<!-- <img src="nature4.jpg" class="img-fluid" alt="Responsive image"> -->
		
		<div class="row">
			<div class="col-lg-12">
				<div id="content">
					<h1>What's Happening?</h1>
				</div>
			</div>
		</div>
		<div class="jumbotron">
			<div class="row">

				<!-- <div class="col-sm-6">
					<div>
						<img src="./assets/_MG_0082.jpg" class="img-thumbnail">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="content1">
						<h3>Children's Camp</h3>
						<p>During every summer break, a children camp is organised to teach children the Word of God in a fun and exciting way through various activities and games. </p>
						<hr>
					<button type="button" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> Register Now!</button>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="content1">
						<h3>AWANA</h3>
						<p>Every weekend, boys and girls in the community are gathered to be taught the Word of God through fun and games </p>
						<hr>
					<button type="button" class="btn btn-primary btn-lg">Join Us Today <i class="fa fa-smile-o" aria-hidden="true"></i></button>
					</div>
				</div>
				<div class="col-sm-6">
					<div>
						<img src="./assets/_MG_1914.jpg" class="img-thumbnail">
					</div>
				</div>
				<div class="col-sm-6">
					<div>
						<img src="events3.jpg" class="img-thumbnail">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="content1">
						<h3>Worship Night: My Thanksgiving Service</h3>
						<p>On the 25th of December of every year, we come to the Lord's feet to worship and thank Him for keep us and bring us safely to the end of the year. </p>
						<hr>
					<button type="button" class="btn btn-primary btn-lg">RSVP Now! <i class="fa fa-address-book-o" aria-hidden="true"></i></button>
					</div>
				</div> -->

				<?php

					// Instantiate Event
					$event= new Event();
                
					//Get event
					$events= $event->getEvents();

					$length= count($events);
					$counter=0;
					//displays the details of each event
					foreach ($events as $eve) {
						$counter++;

						echo '<div class="col-sm-6">';
						echo '<div>';
						echo '<img  src="./assets/eventImages/'.$eve->picture.'" class="img-thumbnail">';
						echo '</div>';
						echo '</div>';
						echo '<div class="col-sm-6">';
						echo '<div class="content1">';
						echo '<h3>'.$eve->title.'</h3>';
						echo '<p>'.$eve->description.'</p>';
						if($eve->startTime==$eve->endTime){
							echo '<p>Date: '.$eve->startTime.'</p>';
							
							
						}else{
							echo '<p>Date: '.$eve->startTime.' <br>to <br>'.$eve->endTime.'</p>';
							
							
						}
						echo '<hr>';
						echo '</div>';
						echo '</div>';
					};

			   ?>
			</div>
		</div>

			
		    
		</div>
	</div>
	<footer class="jumbotron" id="footer">
		<div class="container">
			<div class="row">

				<div class="col-sm-6">
					<div >
						<h4>Sowseeds International Ministries</h4>
						<p>Naa Sakua Circle, Accra</p>
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
					<p>Made by Richard Kafui Anatsui &copy; 2020. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</body>
</html>