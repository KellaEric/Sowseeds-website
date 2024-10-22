<?php
    if(isset($_POST["title"], $_POST["minister"], $_POST["teachDate"], $_POST["teachDay"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        session_start();
        $output ='';
        $title=$_POST["title"];
        $minister=$_POST["minister"];
        $teachDate=$_POST["teachDate"];
        $teachDay=$_POST["teachDay"];
        $audioFile=$_FILES[0]["name"];
        $adminID=$_SESSION['sessionId'];
        //creating file path
        $path= "../assets/previewAudios/".basename($_FILES[0]['name']); 
        

        // adminEvents Data
        $adminTeachingsData= [
            "adminID"=> $adminID,
            "title"=> $title,
            "minister"=> $minister,
            "teachDate"=> $teachDate,
            "teachDay"=> $teachDay,
            "audioFile"=> $audioFile
        ];

        // Instantiate admin
        $admin= new Admin();


        //adding to adminEvents
        if($admin->addPreviewTeachings($adminTeachingsData)){
            if(move_uploaded_file($_FILES[0]['tmp_name'],$path)){
                $message="Teaching uploaded successfullly";
            }
            else{
                $message="There was a problem uploading teaching";
            }
            $output.= '
            <p class="titles">
            '.$teachDay.', '.$teachDate.'<br>
            Minister: '.$minister.' <br>
            Msg: <strong>'.$title.'</strong><br> 
            A Must Hear Msg. <br>
            Listen, be educated, do the work &  be blessed <br>
        </p>
        <audio src="../assets/sounds/'.$audioFile.'" type="audio/mpeg" controls></audio>	
                    ';
            
        }else{
            echo '<script>alert("Unable to add Events Preview table")</script>';
            echo '<script>window.location.href = "../admin/adminAddTeachings.php";</script>';
       
            exit(); 
        }
        
        echo $output;
    }
    



?>