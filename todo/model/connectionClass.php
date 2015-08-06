<?php

class Connection { 
      
    public $mysql; 
      
    function __construct() { 
        $this->mysql = new mysqli('localhost', 'root', 'root', 'vista') or die('problem'); 
    } 
} 

?>
