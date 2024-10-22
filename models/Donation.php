<?php
    class Donation{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

          

        //gets the Donation details
        public function getDonations(){
            //Prepare Query
            $this->db->query('select * from donations');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>