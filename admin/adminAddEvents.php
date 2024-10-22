<?php
	require_once '../controller/database.php';
    require_once '../controller/register.php';
    require_once '../models/Database.php';
    session_start();
    
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Events Page</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<link rel="icon" href="../assets/SIM logo.png" type="image/gif">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../js/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="adminAddTeachings.css">
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
            <h2>Add An Event</h2>
            <div class="jumbotron">
			<form id='form' action="../controller/addEvent.php" method="post" enctype="multipart/form-data">
                <div>
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Title" required> <br>
                    <label for="description">Description</label><br>
                    <textarea name="description" id="description" placeholder="description" required></textarea>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label for="fDate">Duration</label>
                    <input type="text" name="fDate" id="fDate" placeholder='2024-12-29'  required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label for="tDate">to</label>
                    <input type="text" name="tDate"  id="tDate" placeholder='2024-12-31' required>
                    </div>
                </div>
                <div>
                    Select image to upload:
                    <input type="file" name="image" id="image" required>
                      
                </div>
                <br>

                <input type="button" id="previewBtn" name="preview" class="btn btn-primary" value="Preview Event">
                <input type="submit" name="submit" class="btn btn-success" value="Add Event">
            </form>
            
		    </div>
        </div>
        <div class="col-lg-6">
            <h2>Preview</h2>
            <div class="jumbotron" id='preview'>
                <div class="col-sm-6">
                    <div>
                        <img  src="../assets/_MG_0082.jpg" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="content1">
                        <h3>Up coming program</h3>
                        <p>During every summer break, a children camp is organised to teach children the Word of God in a fun and exciting way through various activities and games. </p>
                        <hr>
                        <button type="button" class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> Register Now!</button>
                    </div>
                </div>

            </div>
        </div>
</div>

	<script>
		
		$('#previewBtn').click(function(){
			var title=$('#title').val();
			var description=$('#description').val();
			var fDate=$('#fDate').val();
			var tDate=$('#tDate').val();
			var form_data = new FormData();
			
			$.each($('#image')[0].files, function(i,file){
				form_data.append(i,file);
			});
			form_data.append("title",title);
			form_data.append("description",description);
			form_data.append("fDate",fDate);
			form_data.append("tDate",tDate);			

			if(title !='' && description !='' &&fDate !='' &&tDate !='' &&image !='' ){
				$.ajax({
					url:'./eventPreview.php',
					method: 'POST',
					contentType: false,
					processData: false,
					cache: false,
					async: false,
					enctype: 'multipart/form-data',
					data: form_data,
					success:function(data){
						$('#preview').html(data);
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
						<h4>Sowseeds Life school</h4>
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
					<p>Coming up &copy; 2024. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="../bootstrap.min.js"></script>
</body>
</html>