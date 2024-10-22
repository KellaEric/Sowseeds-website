<?php
    class Admin{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Admin
        public function addAdmin($data){
            //Prepare Query
            $this->db->query('insert into Admin(fname, lname, username, password) values(:fname, :lname, :username, :password)');

            // Bind Values
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets the Admin Username
        public function getAdminUsername($data){
            //Prepare Query
            $this->db->query('select username from Admin where username = :username');

            // Bind Values
            $this->db->bind(':username', $data['username']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $numRows=$this->db->rowCount();
            if($numRows>0){
                return true;
            }
            else{
                return false;
            }
            
        }

        //gets the Admin details
        public function getAdminDetails($data){
            //Prepare Query
            $this->db->query('select * from Admin where username = :username');

            // Bind Values
            $this->db->bind(':username', $data['username']);
           

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->single();
            return $results;
            
        }

        public function addPreviewEvents($data){
            //Prepare Query
            $this->db->query('insert into adminEvents(adminID,title, description, startTime, endTime, picture) values(:adminID, :title, :description, :fDate, :tDate, :image)');

            // Bind Values
            $this->db->bind(':adminID', $data['adminID']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':fDate', $data['fDate']);
            $this->db->bind(':tDate', $data['tDate']);
            $this->db->bind(':image', $data['image']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function addEvents($data){
            //Prepare Query
            $this->db->query('insert into events(title, description, startTime, endTime, picture) values(:title, :description, :fDate, :tDate, :image)');

            // Bind Values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':fDate', $data['fDate']);
            $this->db->bind(':tDate', $data['tDate']);
            $this->db->bind(':image', $data['image']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteEvent($data){
            //Prepare Query
            $this->db->query('delete from events where eventID= :eventID');

            // Bind Values
            $this->db->bind(':eventID', $data['eventID']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteTeaching($data){
            //Prepare Query
            $this->db->query('delete from teachings where teachingID= :teachingID');

            // Bind Values
            $this->db->bind(':teachingID', $data['teachingID']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteContact($data){
            //Prepare Query
            $this->db->query('delete from contacts where contactID= :contactID');

            // Bind Values
            $this->db->bind(':contactID', $data['contactID']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function deleteDonation($data){
            //Prepare Query
            $this->db->query('delete from donations where donationID= :donationID');

            // Bind Values
            $this->db->bind(':donationID', $data['donationID']);
            

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }


        public function addPreviewTeachings($data){
            //Prepare Query
            $this->db->query('insert into adminTeachings(adminID,title, minister, teachDate, teachDay, audioFile) values(:adminID, :title, :minister, :teachDate, :teachDay, :audioFile)');

            // Bind Values
            $this->db->bind(':adminID', $data['adminID']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':minister', $data['minister']);
            $this->db->bind(':teachDate', $data['teachDate']);
            $this->db->bind(':teachDay', $data['teachDay']);
            $this->db->bind(':audioFile', $data['audioFile']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function addTeachings($data){
            //Prepare Query
            $this->db->query('insert into teachings(title, minister, teachDate, teachDay, audioFile) values(:title, :minister, :teachDate, :teachDay, :audioFile)');

            // Bind Values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':minister', $data['minister']);
            $this->db->bind(':teachDate', $data['teachDate']);
            $this->db->bind(':teachDay', $data['teachDay']);
            $this->db->bind(':audioFile', $data['audioFile']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets the number of events
        public function getEventsNum(){
            //Prepare Query
            $this->db->query('select eventID from events');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $numRows=$this->db->rowCount();
            
            return $numRows;
            
        }

        //gets the number of teachings
        public function getTeachingsNum(){
            //Prepare Query
            $this->db->query('select teachingID from teachings');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $numRows=$this->db->rowCount();
            
            return $numRows;
            
        }

        //gets the number of contacts
        public function getContactsNum(){
            //Prepare Query
            $this->db->query('select contactID from contacts');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $numRows=$this->db->rowCount();
            
            return $numRows;
            
        }

        //gets the number of donations
        public function getDonationsNum(){
            //Prepare Query
            $this->db->query('select donationID from donations');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $numRows=$this->db->rowCount();
            
            return $numRows;
            
        }
        
    }
?>