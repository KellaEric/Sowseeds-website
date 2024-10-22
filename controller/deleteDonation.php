<?php
    if(isset($_POST["id"])){
        require_once '../controller/database.php';
        require_once '../models/Database.php';
        require_once '../models/Admin.php';
        require_once '../models/Donation.php';
        session_start();
        $output ='';
        $donationID=$_POST["id"];
        
        

        // adminDonations Data
        $adminDonationsData= [
            "donationID"=> $donationID
            
        ];
        
        // Instantiate admin
        $admin= new Admin();

        // Instantiate Donation
        $donation= new Donation();

     

        //deleting Donations
        if($admin->deleteDonation($adminDonationsData)){
            
            //Get Donation
					$donations= $donation->getDonations();

					$length= count($donations);
					$counter=0;
					//displays the details of each Donation
					foreach ($donations as $dona) {
						$counter++;
                        
                        $output.='
						        <tr>
						            <th scope="row">'.$counter.'</th>
						            <input type="hidden" name="DonationId" value="'.$dona->donationID.'"></input>
						            <td>'.$dona->fname.'</td>
						            <td>'.$dona->lname.'</td>
						            <td>'.$dona->email.'</td>
						            <td>'.$dona->paymentType.'</td>
                                    <td>'.$dona->accountDetails.'</td>
                                    <td>'.$dona->amount.'</td>
						            <td><button class="btn btn-dark" onclick="deleteDonation('.$dona->donationID.')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                                    </tr>
                        ';
					};

                    
            
        }else{
            echo '<script>alert("Unable to add Donations Preview table")</script>';
            echo '<script>window.location.href = "../admin/adminAddDonations.php";</script>';
       
            exit(); 
        }
        
        echo $output;
    }
    



?>