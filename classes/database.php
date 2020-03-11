<?php

class database {

     public $con;
     public $error;
     public $result;

     public function __construct()
     {
          $this->con = mysqli_connect("localhost", "root", "", "img");
          if(!$this->con)
          {
               echo 'Database Connection Error ' . mysqli_connect_error($this->con);
          }
          return $this->con;
     }

     public function escape($param) {
       return mysqli_real_escape_string($this->con, $param);
     }

     public function query($query) {
       $this->result = mysqli_query($this->con, $query);
       return $this;
     }

     public function fetchAll() {
       $results = [];
       while($row = mysqli_fetch_assoc($this->result)) {
         $results[] = $row;
       }
       return $results;
     }
}
?>
