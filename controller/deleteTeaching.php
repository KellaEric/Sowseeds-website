<?php
    if(isset($_POST["id"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        require_once '../models/Teaching.php';
        session_start();
        $output ='';
        $teachingID=$_POST["id"];
        
        

        // adminTeachings Data
        $adminTeachingsData= [
            "teachingID"=> $teachingID
            
        ];
        
        // Instantiate admin
        $admin= new Admin();

        // Instantiate teaching
        $teaching= new Teaching();

     

        //deleting Teachings
        if($admin->deleteTeaching($adminTeachingsData)){
            
            //Get teaching
					$teachings= $teaching->getTeachings();

					$length= count($teachings);
					$counter=0;
					//displays the details of each teaching
					foreach ($teachings as $teach) {
						$counter++;
                        
                        $output.='
						        <tr>
						            <th scope="row">'.$counter.'</th>
						            <input type="hidden" name="teachingId" value="'.$teach->teachingID.'"></input>
						            <td>'.$teach->title.'</td>
						            <td>'.$teach->minister.'</td>
						            <td>'.$teach->teachDate.'</td>
						            <td>'.$teach->teachDay.'</td>
						            <td><audio src="../assets/teachingAudios/'.$teach->audioFile.'" type="audio/mpeg" controls></audio></td>
						            <td><button class="btn btn-dark" onclick="deleteTeaching('.$teach->teachingID.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                        ';
					};

                    
            
        }else{
            echo '<script>alert("Unable to add Teachings Preview table")</script>';
            echo '<script>window.location.href = "../admin/adminAddTeachings.php";</script>';
       
            exit(); 
        }
        
        echo $output;
    }
    



?>