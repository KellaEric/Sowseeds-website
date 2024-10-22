<?php
    class Teaching{
        private $db;

        public function __construct(){
            $this->db = new Database;

        }

          

        //gets the Teaching details
        public function getTeachings(){
            //Prepare Query
            $this->db->query('select * from teachings');

            //Execute
            $this->db->execute();
            

            //Fetch One record
            $results=$this->db->resultset();
            return $results;
            
        }

        
    }
?>