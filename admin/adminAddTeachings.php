<?php
	require_once '../controller/database.php';
    require_once '../controller/register.php';
    require_once '../models/Database.php';
    session_start();
    
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Teachings Page</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<link rel="icon" href="../assets/SIM logo.png" type="image/gif">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="adminAddTeachings.css">
	<script src="../js/jquery-ui.min.js"></script>
	<meta charset="utf-8"/>
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
		      <li class="nav-item ">
		        <a class="nav-link" href="adminEvents.php">Events</a>
		      </li>
		     <li class="nav-item active">
		        <a class="nav-link" href="adminTeachings.php">Teachings</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="adminContacts.php">Contacts</a>
		      </li>
		      <li class="nav-item ">
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
								echo '<script>alert("Pls sign in")</script>';
                				echo '<script>window.location.href = "../admin/adminSignIn.php";</script>';

								
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
        <div class="col-lg-6">
            <h2>Add A Teaching</h2>
            <div class="jumbotron">
			<form action="../controller/addTeaching.php" method="post" enctype='multipart/form-data'>
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" required> <br>
                    <label for="minister">Minister</label>
                    <input type="text" name="minister" id="minister" placeholder="Pastor ..." required><br>
					<label for="teachDate">Teaching Date</label>
					<input type="text" name="teachDate" id="teachDate" placeholder='2020-12-29'  required><br>
					<label for="teachDay">Teaching Day</label>
					<input type="text" name="teachDay"  id="teachDay" placeholder='Sunday' required><br>
					Select audio file to upload:
					<input type="file" name='audio' id='audio' required>
                </div>
                
                <br>

                <input type="button" id='previewBtn' name="preview" class="btn btn-primary" value="Preview Teaching">
                <input type="submit" name="submit" class="btn btn-success" value="Add Teaching">
            </form>
            
		    </div>
        </div>
        <div class="col-lg-6">
            <h2>Preview</h2>
            <div class="jumbotron" >
				<div id="teaching">
					<p class="titles">
						Sunday, 20th Dec.<br>
						Minister: Brother David <br>
						Msg: <strong>Garment Are You Wearing part 2</strong><br> 
						A Must Hear Msg. <br>
						Listen, be educated, do the work &  be blessed <br>
					</p>
					<audio src="../assets/sounds/sound1.ogg" type="audio/mpeg" controls></audio>	
				</div>

            </div>
        </div>
</div>
	<script>
		
		$('#previewBtn').click(function(){
			var title=$('#title').val();
			var minister=$('#minister').val();
			var teachDate=$('#teachDate').val();
			var teachDay=$('#teachDay').val();
			// var audioFile=$('#audio').val();
			var form_data = new FormData();
			
			$.each($('#audio')[0].files, function(i,file){
				form_data.append(i,file);
			});
			form_data.append("title",title);
			form_data.append("minister",minister);
			form_data.append("teachDate",teachDate);
			form_data.append("teachDay",teachDay);
			if(title !='' && minister !='' &&teachDate !='' &&teachDay !='' &&audio !='' ){
				$.ajax({
					url:'./teachPreview.php',
					method: 'POST',
					contentType: false,
					processData: false,
					cache: false,
					async: false,
					enctype: 'multipart/form-data',
					data: form_data,
					success:function(data){
						$('#teaching').html(data);
					}
				});
			}
			else{
                //if any filed is empty, show alert
                alert('Pls fill all fields in the form');
            }
		})
	</script>
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
	
	<script type="text/javascript" src="../bootstrap.min.js"></script>
</body>
</html>