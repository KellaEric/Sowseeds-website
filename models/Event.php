<?php
    class Event{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

          

        //gets the Event details
        public function getEvents(){
            //Prepare Query
            $this->db->query('select * from events');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>