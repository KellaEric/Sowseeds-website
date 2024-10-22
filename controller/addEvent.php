<?php
    if(isset($_POST["submit"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        echo '<script type="text/javascript" src="../js/sweetalert2.all.min.js"></script>';
        $title=$_POST["title"];
        $description=$_POST["description"];
        $fDate=$_POST["fDate"];
        $tDate=$_POST["tDate"];
        $image=$_FILES['image']["name"];
        //creating file path
        $path= "../assets/eventImages/".basename($_FILES['image']['name']); 
        

        // adminEvents Data
        $adminEventsData= [
            "title"=> $title,
            "description"=> $description,
            "fDate"=> $fDate,
            "tDate"=> $tDate,
            "image"=> $image
        ];
        
        // Instantiate admin
        $admin= new Admin();

     

        //adding to adminEvents
        if($admin->addEvents($adminEventsData)){
            if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){
                $message="Image uploaded successfullly";
            }
            else{
                $message="There was a problem uploading image";
            }
            echo 'Event Added';
                echo <<<_GOTOEVENTS
                    <script>Swal.fire({
                        icon: 'success',
                        title: 'Well Done!',
                        text: 'Added event successfully'
                    }).then(function() {
                        window.location = "../admin/adminEvents.php";
                    });</script>
                                    
            _GOTOEVENTS;
        }else{
            echo '<script>alert("Unable to add Events table")</script>';
            echo '<script>window.location.href = "../admin/adminAddEvents.php";</script>';
       
            exit(); 
        }
        

    }
    



?>