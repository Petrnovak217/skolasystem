<?php

class Student{

    public static function getStudent($connect,$id,$columns="*"){
        $sql = "SELECT $columns FROM student WHERE id= :id";
    
       $stmt = $connect->prepare($sql);
       $stmt->bindValue(":id",$id,PDO::PARAM_INT);

       try {
            if($stmt->execute()){
                return $stmt->fetch();
            }else{
                throw new Exception("Získání dat o jednom studentovi selhalo");
            }
        
        } catch (Exception $e) {
            error_log("chyba u funkce getStudent,získání dat selhalo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        
        }
        
    }
    
    public static function createStudent($connect,$first_name,$second_name,$age,$life,$college){
        $sql = "INSERT INTO student(first_name, second_name, age, life, college) 
        VALUES (:first_name, :second_name, :age, :life, :college)";
    
        $stmt = $connect->prepare($sql);

        $stmt->bindValue(":first_name",$first_name,PDO::PARAM_STR);
        $stmt->bindValue(":second_name",$second_name,PDO::PARAM_STR);
        $stmt->bindValue(":age",$age,PDO::PARAM_INT);
        $stmt->bindValue(":life",$life,PDO::PARAM_STR);
        $stmt->bindValue(":college",$college,PDO::PARAM_STR);
    
       
        try {

            if($stmt->execute()){
                return $connect->lastInsertId();
            }else{
                throw new Exception("Vytvoření studenta selhalo ");
            }

        } catch (Exception $e) {
            error_log("chyba u funkce createStudent,poslání dat do databáze selhalo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        
        }
        
          
        
    }
    
    public static function updateStudent($connect,$first_name,$second_name,$age,$life,$college,$id){
    
        $sql = "UPDATE student 
            SET first_name = :first_name,
                second_name = :second_name,
                age = :age,
                life = :life,
                college = :college
            WHERE id= :id";
    
        $stmt = $connect->prepare($sql);
    
        $stmt->bindValue(":first_name",$first_name,PDO::PARAM_STR);
        $stmt->bindValue(":second_name",$second_name,PDO::PARAM_STR);
        $stmt->bindValue(":age",$age,PDO::PARAM_INT);
        $stmt->bindValue(":life",$life,PDO::PARAM_STR);
        $stmt->bindValue(":college",$college,PDO::PARAM_STR);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);

        try {

            if($stmt->execute()){
                return true;
            }else{
                throw new Exception("Update studenta selhalo");
            }

        } catch (Exception $e) {
            error_log("chyba u funkce updateStudent,update dat selhalo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        }
    }
    
    public static function deleteStudent($connect,$id){
        $sql = "DELETE FROM student WHERE id=:id";
        
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);

        try {

            if($stmt->execute()){
                return true;
                
            }else{
                throw new Exception("Odstranění studenta selhalo ");
            }

        } catch (Exception $e) {
            error_log("chyba u funkce deleteStudent,Odstranění studenta selhalo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        
        }
    }
    
    public static function getAllStudents($connect,$columns="*"){
        $sql = "SELECT $columns FROM student";
        $stmt = $connect->prepare($sql);
        
        
        try {

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
           }else{
                throw new Exception("Získání všech studentů selhalo");
            }

        } catch (Exception $e) {
            error_log("chyba u funkce getAllStudents,Získání všech studentů selhalo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        
        }
       
    }
}

