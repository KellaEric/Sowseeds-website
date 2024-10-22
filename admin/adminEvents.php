<?php
	require_once '../controller/database.php';
    require_once '../controller/register.php';
	require_once '../models/Database.php';
	require_once '../models/Event.php';
    session_start();
    
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Events Manager Page</title>
	<link rel="icon" href="../assets/SIM logo.png" type="image/gif">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="adminIndex.css">
	<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #007F00;">
		<div class="container">
			<a class="navbar-brand" href="#"><img width="200" height="100" src="../assets/SIM logo.png" > Sowseeds</a>
			<!-- Hamburger -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <!-- Collapses navbar items into Hamburger -->
		  <div class="collapse navbar-collapse" id="navbarNav">
		  	<ul class="navbar-nav">
		      <li class="nav-item ">
		        <a class="nav-link" href="adminIndex.php">Home</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="adminEvents.php">Events</a>
		      </li>
		     <li class="nav-item">
		        <a class="nav-link" href="adminTeachings.php">Teachings</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="adminContacts.php">Contacts</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="adminDonations.php">Donations</a>
		      </li>
		    </ul>
			<ul class="navbar-nav my-2 my-lg-0 ml-auto" >
                <li class="nav-item signIn">
					<?php
					//if session variable has been created, put first name and last name in navbar
							if(isset($_SESSION['sessionFname'])&&isset($_SESSION['sessionLname'])){
								printf('Welcome, %s %s', $_SESSION['sessionFname'], $_SESSION['sessionLname']);
								echo <<<_SIGNOUTITEM
								<a id="sign-in" class="nav-link" href="../controller/logout.php">
										Sign Out 
									<i class="fa fa-sign-out" aria-hidden="true"></i></a>
								
								_SIGNOUTITEM;

							}else{
								//if not, redirect to sign in page
								echo <<<_GOTOSIGNIN
								<script>Swal.fire({
									icon: 'error',
									title: 'Oops... no authentication',
									text: 'Pls sign in'
								}).then(function() {
									window.location = "../admin/adminSignIn.php";
								});</script>
								
								_GOTOSIGNIN;
								
                				// echo '<script>window.location.href = "../admin/adminSignIn.php";</script>';

								
							}
						?> 
					
				</li>
			</ul>
			</div>
 			
 		</div>
	</nav>
	
	<!-- responsible for live background -->
    <div class="bg"></div>
	<div class="bg bg2"></div>
	<div class="bg bg3"></div>
	
    <div class="container content">
        <h2>Events</h2>
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr>
				<th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Start Time</th>
					<th scope="col">End Time</th>
					<th scope="col">Picture</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id='tableContent'>
                <!-- <tr>
                    <th scope="row">1</th>
                    <td>Watch Night</td>
                    <td>We are going to show gratittude to God for all that He has done for us in 2020</td>
					<td>2020-12-31</td>
					<td>2020-12-31</td>
					<td><img style="width: 200px;" src="../assets/events1.jpg" alt=""></td>
                    <td><button class='btn btn-dark'><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                </tr> -->
                
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

						echo '<tr>';
						echo '<th scope="row">'.$counter.'</th>';
						echo '<input type="hidden" name="eventId" value="'.$eve->eventID.'"></input>';
						echo '<td>'.$eve->title.'</td>';
						echo '<td>'.$eve->description.'</td>';
						echo '<td>'.$eve->startTime.'</td>';
						echo '<td>'.$eve->endTime.'</td>';
						echo '<td><img style="width: 200px;" src="../assets/eventImages/'.$eve->picture.'" alt=""></td>';
						echo '<td><button class="btn btn-dark" onclick="deleteEvent('.$eve->eventID.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
						echo '</tr>';
					};

			   ?>
                
            </tbody>
        </table>

        <button class='btn btn-dark' onclick='location.href="./adminAddEvents.php";'>Add <i class="fa fa-plus" aria-hidden="true"></i></button>
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
					<p>Comping up &copy; 2024. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<script>
		function deleteEvent(eventID){
			Swal.fire({
				title: 'Do you want to delete this event?',
				showDenyButton: true,
				showCancelButton: true,
				confirmButtonText: `Delete`,
				denyButtonText: `Don't delete`,
				}).then((result) => {
				
				if (result.isConfirmed) {
					$.ajax({
						url: "../controller/deleteEvent.php",
						type: "POST",
						data: {
							id: eventID
						},
						// dataType: "html",
						success: function(data){
							$('#tableContent').html(data);
							Swal.fire('Deleted!', '', 'success');

						},
						error: function(xhr, ajaxOptions, thrownError){
							Swal.fire('Error deleting!', 'Please try again', 'error');
						}
					})
				} else if (result.isDenied) {
					Swal.fire('Event is not deleted', '', 'info')
				}
			})
		}
	</script>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../bootstrap.min.js"></script>
	
</body>
</html>