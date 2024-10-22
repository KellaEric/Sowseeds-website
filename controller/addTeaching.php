<?php
    if(isset($_POST["submit"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        $title=$_POST["title"];
        $minister=$_POST["minister"];
        $teachDate=$_POST["teachDate"];
        $teachDay=$_POST["teachDay"];
        $audioFile=$_FILES['audio']["name"];
        //creating file path
        $path= "../assets/teachingAudios/".basename($_FILES['audio']['name']); 
        

        // adminEvents Data
        $adminTeachingsData= [
            "title"=> $title,
            "minister"=> $minister,
            "teachDate"=> $teachDate,
            "teachDay"=> $teachDay,
            "audioFile"=> $audioFile
        ];

        // Instantiate admin
        $admin= new Admin();

        

        //adding to adminEvents
        if($admin->addTeachings($adminTeachingsData)){
            if(move_uploaded_file($_FILES['audio']['tmp_name'],$path)){
                $message="Teaching uploaded successfullly";
            }
            else{
                $message="There was a problem uploading teaching";
            }
            echo 'Teaching Added';
                echo <<<_GOTOTEACHINGS
                    <script>Swal.fire({
                        icon: 'success',
                        title: 'Well Done!',
                        text: 'Added teaching successfully'
                    }).then(function() {
                        window.location = "../admin/adminTeachings.php";
                    });</script>
                                    
            _GOTOTEACHINGS;
        }else{
            echo '<script>alert("Unable to add Teaching table")</script>';
            echo '<script>window.location.href = "../admin/adminAddTeachings.php";</script>';
       
            exit(); 
        }
        
        
    }
    



?>