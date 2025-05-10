<?php
class Database{

    public function connectDB(){
        $db_host="";
        $db_name="";
        $db_user="";
        $db_password="";
        
       $connect = "mysql:host=" . $db_host . ";dbname=" . $db_name . ";charset=Utf8";

        try{
            $db = new PDO($connect,$db_user,$db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $db;

        }catch(PDOException $e){
            echo $e->getMessage();
            exit(); 
        }
    
    }
}