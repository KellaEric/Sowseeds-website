<?php
require_once 'Database.php';
    class Contact{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

        //adds Admin
        public function addContact($data){
            //Prepare Query
            $this->db->query('insert into contacts(fname, lname, email, messageType,contactMessage) values(:fname, :lname, :email, :messageType,:contactMessage)');

            // Bind Values for contact details
            $this->db->bind(':fname', $data['fname']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':messageType', $data['messageType']);
            $this->db->bind(':contactMessage', $data['contactMessage']);

            //Execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        //gets all contacts
        public function getContacts(){
            //Prepare Query
            $this->db->query('select * from contacts');

            
            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->resultset();
            return $results;
            
        }
      
    }
?>