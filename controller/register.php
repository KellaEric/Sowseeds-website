<?php
if(isset($_POST['submit'])){
    //Add Database connection
    require_once './database.php';
    require_once '../models/Admin.php';
    require_once '../models/Database.php';
    echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
    //Instantiate admin
    $admin= new Admin();

    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirmPass=$_POST['confirmPassword'];

    
    //admin Data
    $adminData =[
        'fname'=> $fname,
        'lname'=> $lname,
        'username'=> $username,
        'password'=> $password
    ];

    
    
    

    //if fields are empty
    if (empty($fname) ||empty($lname) || empty($username) || empty($password) || empty($confirmPass)){
        // echo '<script>alert("Some fields are empty")</script>';
        
        // echo '<script>window.location.href = "../admin/adminSignUp.php";</script>';
        echo 'Empty fields';
        echo <<<_GOTOSIGNUP
				<script>Swal.fire({
					icon: 'error',
					title: 'Oops... some fields are empty',
					text: 'Pls ensure that all fields in the form are filled'
				}).then(function() {
					window.location = "../admin/adminSignUp.php";
				});</script>
								
		_GOTOSIGNUP;
        exit();
    }elseif(!preg_match("/^[A-Za-z_]{3,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,6}$/",$username)){
        // echo '<script>alert("Invalid username")</script>';
       
        // echo '<script>window.location.href = "../admin/adminSignUp.php";</script>';
        echo 'Invalid username';
        echo <<<_GOTOSIGNUP
				<script>Swal.fire({
					icon: 'error',
					title: 'Oops... invalid username',
					text: 'Pls check username well. Eg. abc123@gmail.com'
				}).then(function() {
					window.location = "../admin/adminSignUp.php";
				});</script>
								
		_GOTOSIGNUP;
        exit();
    }elseif($password !== $confirmPass){
        // echo '<script>alert("Passwords do not match")</script>';
        
        // echo '<script>window.location.href = "../admin/adminSignUp.php";</script>';
        echo 'Unmatching Passwords';
        echo <<<_GOTOSIGNUP
				<script>Swal.fire({
					icon: 'error',
					title: 'Oops... passwords do not match',
					text: 'Pls crosscheck passwords well'
				}).then(function() {
					window.location = "../admin/adminSignUp.php";
				});</script>
								
		_GOTOSIGNUP;
        exit();
    }else{
        //admin Email
        $adminEmail=[
            'username'=>$username
        ];
        if($admin->getAdminUsername($adminEmail)){
            // echo '<script>alert("Username Taken")</script>';
            
            // echo '<script>window.location.href = "../admin/adminSignUp.php";</script>';
            echo 'Username Taken';
            echo <<<_GOTOSIGNUP
                    <script>Swal.fire({
                        icon: 'error',
                        title: 'Oops... username taken',
                        text: 'Pls pick another username'
                    }).then(function() {
                        window.location = "../admin/adminSignUp.php";
                    });</script>
                                    
            _GOTOSIGNUP;
            exit();
        }
        else{
            
            $hashedPass= password_hash($password, PASSWORD_DEFAULT);

            //admin Data
            $adminData =[
                'fname'=> $fname,
                'lname'=> $lname,
                'username'=> $username,
                'password'=> $hashedPass
            ];
            
            //Add admin To Do
            if($admin->addAdmin($adminData)){
                // echo '<script>alert("Well Done. You have been registered successfully")</script>';
                
                // echo '<script>window.location.href = "../admin/adminSignIn.php";</script>';
                echo 'Logged In';
                echo <<<_GOTOHOME
                    <script>Swal.fire({
                        icon: 'success',
                        title: 'Well Done!',
                        text: 'Registered successfully'
                    }).then(function() {
                        window.location = "../admin/adminSignIn.php";
                    });</script>
                                    
            _GOTOHOME;
                exit();

            }
            else{
                // header("Location: ../admin/adminSignUp.php?error=sqlerror1");
                echo 'Database Error';
                echo <<<_GOTOSIGNUP
                        <script>Swal.fire({
                            icon: 'error',
                            title: 'Oops... database error',
                            text: 'Pls check database connection or credentials'
                        }).then(function() {
                            window.location = "../admin/adminSignUp.php";
                        });</script>
                                        
                _GOTOSIGNUP;
                exit();
            }
        }
        
    }
    
}
else{
    echo 'wait...';
}
?>