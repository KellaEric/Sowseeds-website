<?php
    if(isset($_POST["title"], $_POST["description"], $_POST["fDate"], $_POST["tDate"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        session_start();
        $output ='';
        $title=$_POST["title"];
        $description=$_POST["description"];
        $fDate=$_POST["fDate"];
        $tDate=$_POST["tDate"];
        $image=$_FILES[0]["name"];
        $adminID=$_SESSION['sessionId'];
        //creating file path
        $path= "../assets/previewImages/".basename($_FILES[0]['name']); 
        

        // adminEvents Data
        $adminEventsData= [
            "adminID"=> $adminID,
            "title"=> $title,
            "description"=> $description,
            "fDate"=> $fDate,
            "tDate"=> $tDate,
            "image"=> $image
        ];
        
        // Instantiate admin
        $admin= new Admin();

     

        //adding to adminEvents
        if($admin->addPreviewEvents($adminEventsData)){
            if(move_uploaded_file($_FILES[0]['tmp_name'],$path)){
                $message="Image uploaded successfullly";
            }
            else{
                $message="There was a problem uploading image";
            }
            $output.= '
                <div class="col-sm-6">
                <div>
                    <img  src="../assets/'.$image.'" class="img-thumbnail">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="content1">
                    <h3>'.$title.'</h3>
                    <p>'.$description.'</p>
                    ';
            if($fDate==$tDate){
                $output.='
                <p>Date: '.$fDate.'</p>
                ';
            }else{
                $output.='
                <p>Date: '.$fDate.' <br>to <br>'.$tDate.'</p>
                ';
            }
            $output.='
                    <hr>
                    
                </div>
            </div>
            ';
        }else{
            echo '<script>alert("Unable to add Events Preview table")</script>';
            echo '<script>window.location.href = "../admin/adminAddEvents.php";</script>';
       
            exit(); 
        }
        
        echo $output;
    }
    



?>