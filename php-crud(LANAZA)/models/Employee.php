<?php 
    class Employee{
        public $id;
        public $lname;
        public $fname;
        public $position;
        public static $tblName = "tblemployee";

        function __construct($f, $l, $p){
            $this->fname = $f;
            $this->lname = $l;
            $this->position = $p;
        }

        public function save(){
            require("dbconfig.php");
            $sql = "INSERT INTO ".self::$tblName." (lname,fname,position) 
            VALUES ('".$this->lname."', '".$this->fname."', '".$this->position."')";
           
            if ($conn->query($sql)===TRUE){
                echo "Employee Succesfully inserted";
            }
            else{
                echo "Error";
            }
            $conn->close();
        }
        
        public static function getAll(){
            require ("dbconfig.php");
                $sql = "SELECT * FROM ".self::$tblName;
                $result = $conn->query($sql);
            $conn->close();

            return $result;
        }
    }
?>