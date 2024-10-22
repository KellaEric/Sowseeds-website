<?php
    if(isset($_POST["id"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        require_once '../models/Event.php';
        session_start();
        $output ='';
        $eventID=$_POST["id"];
        
        

        // adminEvents Data
        $adminEventsData= [
            "eventID"=> $eventID
            
        ];
        
        // Instantiate admin
        $admin= new Admin();

        // Instantiate event
        $event= new Event();

     

        //deleting events
        if($admin->deleteEvent($adminEventsData)){
            
            //Get event
					$events= $event->getEvents();

					$length= count($events);
					$counter=0;
					//displays the details of each event
					foreach ($events as $eve) {
						$counter++;
                        
                        $output.='
						        <tr>
						            <th scope="row">'.$counter.'</th>
						            <input type="hidden" name="eventId" value="'.$eve->eventID.'"></input>
						            <td>'.$eve->title.'</td>
						            <td>'.$eve->description.'</td>
						            <td>'.$eve->startTime.'</td>
						            <td>'.$eve->endTime.'</td>
						            <td><img style="width: 200px;" src="../assets/eventImages/'.$eve->picture.'" alt=""></td>
						            <td><button class="btn btn-dark" onclick="deleteEvent('.$eve->eventID.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                        ';
					};

                    
            
        }else{
            echo '<script>alert("Unable to add Events Preview table")</script>';
            echo '<script>window.location.href = "../admin/adminAddEvents.php";</script>';
       
            exit(); 
        }
        
        echo $output;
    }
    



?>