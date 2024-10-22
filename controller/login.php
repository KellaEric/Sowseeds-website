<?php

if(isset($_POST['submit'])){
    require '../controller/database.php';
    require_once '../models/Admin.php';
    require_once '../models/Database.php';
    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    $username= $_POST['username'];
    $password=$_POST['password'];

    // Instantiate admin
    $admin= new Admin();

    //if fields are empty
    if(empty($username)||empty($password)){
        // echo '<script>alert("Empty Fields")</script>';
        // echo '<script>window.location.href = "../admin/adminSignIn.php";</script>';
        echo 'Empty fields';
        echo <<<_GOTOSIGNIN
				<script>Swal.fire({
					icon: 'error',
					title: 'Oops... some fields are empty',
					text: 'Pls ensure that all fields in the form are filled'
				}).then(function() {
					window.location = "../admin/adminSignIn.php";
				});</script>
								
		_GOTOSIGNIN;
       
        exit();
    }
    else{
        //admin username
        $adminUsername=[
            'username'=>$username
        ];
        if(!($admin->getAdminUsername($adminUsername))){
            // echo '<script>alert("No user")</script>';
            // echo '<script>window.location.href = "../admin/adminSignUp.php";</script>';
            echo 'No user error';
            echo <<<_GOTOSIGNIN
				<script>Swal.fire({
					icon: 'error',
					title: 'Oops... your username does not exist',
					text: 'Pls create a new account or check credentials well'
				}).then(function() {
					window.location = "../admin/adminSignIn.php";
				});</script>
								
		_GOTOSIGNIN;
            exit();
        }
        else{
            //getting admin details
            $admin1= $admin->getAdminDetails($adminUsername);
            
            //verfiying password
            $passCheck=password_verify($password, $admin1->password);
            echo $passCheck;
            if($passCheck==false){
                // echo '<script>alert("Wrong Password")</script>';
                // echo '<script>window.location.href = "../admin/adminSignIn.php";</script>';
                echo 'Wrong Password';
                echo <<<_GOTOSIGNIN
                    <script>Swal.fire({
                        icon: 'error',
                        title: 'Oops... wrong password!',
                        text: 'Pls check password well'
                    }).then(function() {
                        window.location = "../admin/adminSignIn.php";
                    });</script>
                                    
            _GOTOSIGNIN;
                exit();
            }elseif($passCheck==true){
                session_start();
                //creating session variables
                $_SESSION['sessionId']=$admin1->adminID;
                $_SESSION['sessionUsername']=$admin1->username;
                $_SESSION['sessionFname']=$admin1->fname;
                $_SESSION['sessionLname']=$admin1->lname;
                // echo '<script>alert("Well Done. Logged in successfully")</script>';
                // echo '<script>window.location.href = "../admin/adminIndex.php";</script>';
                echo 'Logged In';
                echo <<<_GOTOHOME
                    <script>Swal.fire({
                        icon: 'success',
                        title: 'Well Done!',
                        text: 'Logged in successfully'
                    }).then(function() {
                        window.location = "../admin/adminIndex.php";
                    });</script>
                                    
            _GOTOHOME;
                
            }else{
                // echo '<script>alert("Wrong Password")</script>';
                // echo '<script>window.location.href = "../admin/adminSignIn.php";</script>';
                echo 'Wrong Password';
                echo <<<_GOTOSIGNIN
                    <script>Swal.fire({
                        icon: 'error',
                        title: 'Oops... wrong password!',
                        text: 'Pls check password well'
                    }).then(function() {
                        window.location = "../admin/adminSignIn.php";
                    });</script>
                                    
            _GOTOSIGNIN;
              
            }
            
        }
    }
    
    
}else{

    header("Location: ../admin/adminSignIn.php?error=accessforbidden");
    exit();
}
?>