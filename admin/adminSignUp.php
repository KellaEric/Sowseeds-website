<!DOCTYPE html>
<html>
<head>
	<title>Admin Sign Up</title>
	<link rel="icon" href="../assets/SIM logo.png" type="image/gif">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="adminSignup.css">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<!-- <meta content="utf-8" http-equiv="encoding"> -->
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #007F00;">
		<div class="container">
			<a class="navbar-brand" href="#"><img width="200" height="100" src="../assets/SIM logo.png" > Sowseeds</a>
			<!-- Hamburger -->
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  
 			
 		</div>
	</nav>

	<!-- responsible for live background -->
    <div class="bg"></div>
	<div class="bg bg2"></div>
	<div class="bg bg3"></div>

	<div class="container content">
		<!-- <img src="nature4.jpg" class="img-fluid" alt="Responsive image"> -->
		
		<div class="row">
			<div class="col-lg-12">
				<div id="content">
					<h1>Register Here!!!</h1>
				</div>
			</div>
		</div>
		<div class="jumbotron">
			<form action="../controller/register.php" method="post">
				<div class="form-row">
					<div class="col-md-6 mb-3">
					  <label for="fname">First name*</label>
					  <input type="text" name="fname" id="fname" placeholder="John" required>
					</div>
					<div class="col-md-6 mb-3">
					  <label for="lname">Last name*</label>
					  <input type="text" name="lname"  id="lname" placeholder="Antwi" required>
					</div>
				  </div>
                <div >
                    
                  <label for="username">Username</label>
                  <input type="username" name="username" id="username" placeholder="Your username" required>
                  
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password" required> <br>
					
					<label for="confirmPassword"> Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Your password" required>
                </div>
               
              <br>
              
                <input type="submit" name="submit" class="btn btn-primary" value="Sign Up">
            </form>
            
		</div>
	</div>
	<footer class="jumbotron" id="footer">
		<div class="container">
			
			<div class="row">
				<div class="col-sm-12">
					<p>Made by Richard Kafui Anatsui &copy; 2020. All rights reserved.</p>
				</div>
			</div>
		</div>
	</footer>
	
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../bootstrap.min.js"></script>
</body>
</html>