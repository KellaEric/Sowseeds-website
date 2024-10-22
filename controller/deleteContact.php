<?php
    if(isset($_POST["id"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        require_once '../models/Contact.php';
        session_start();
        $output ='';
        $contactID=$_POST["id"];
        
        

        // adminContacts Data
        $adminContactsData= [
            "contactID"=> $contactID
            
        ];
        
        // Instantiate admin
        $admin= new Admin();

        // Instantiate Contact
        $contact= new Contact();

     

        //deleting Contacts
        if($admin->deleteContact($adminContactsData)){
            
            //Get Contact
					$contacts= $contact->getContacts();

					$length= count($contacts);
					$counter=0;
					//displays the details of each Contact
					foreach ($contacts as $cont) {
						$counter++;
                        
                        $output.='
						        <tr>
						            <th scope="row">'.$counter.'</th>
						            <input type="hidden" name="contactId" value="'.$cont->contactID.'"></input>
						            <td>'.$cont->fname.'</td>
						            <td>'.$cont->lname.'</td>
						            <td>'.$cont->email.'</td>
						            <td>'.$cont->messageType.'</td>
						            <td>'.$cont->contactMessage.'</td>
						            <td><button class="btn btn-dark" onclick="deleteContact('.$cont->contactID.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                        ';
					};

                    
            
        }else{
            echo '<script>alert("Unable to add Contacts Preview table")</script>';
            echo '<script>window.location.href = "../admin/adminAddContacts.php";</script>';
       
            exit(); 
        }
        
        echo $output;
    }
    



?>