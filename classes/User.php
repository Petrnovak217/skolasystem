<?php


class User{

    //vytvoření užívatele
    public static function createUser($connect,$first_name,$second_name,$email,$password,$role){
        $sql = "INSERT INTO user(first_name, second_name, email,password,role) 
        VALUES (:first_name, :second_name, :email,:password,:role)";
    
        $stmt = $connect->prepare($sql);

        $stmt->bindValue(":first_name",$first_name,PDO::PARAM_STR);
        $stmt->bindValue(":second_name",$second_name,PDO::PARAM_STR);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);
        $stmt->bindValue(":password",$password,PDO::PARAM_STR);
        $stmt->bindValue(":role",$role,PDO::PARAM_STR);
    
        try {
            if($stmt->execute()){   
                $id =  $connect->lastInsertId();
                return $id;
            }else{
                throw new Exception("Vytvoření uživatele selhalo");
            }
        } catch (Exception $e) {
                error_log("chyba u funkce createUser,vytvoření user selhalo\n",3,"../errors/error.log");
                echo "Chyba: ".$e->getMessage();
        }
    }
    
    //ověření pomocí email a hesla
    public static function authentication($connect,$log_email,$log_password){
        $sql = "SELECT password FROM user WHERE email = :email";
    
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":email",$log_email,PDO::PARAM_STR);

        try {
            if($stmt->execute()){
                if($user = $stmt->fetch()){ 
                    return password_verify($log_password,$user[0]);
                }

            }else{
                throw new Exception("Přihlášení uživatele selhalo");
            }
        } catch (Exception $e) {
                error_log("chyba u funkce uthentication,příhlášení selhalo\n",3,"../errors/error.log");
                echo "Chyba: ".$e->getMessage();
        }
    
    }
    
    //získání id uživatele
    public static function getUserId($connect,$email){
        $sql = "SELECT id FROM user WHERE email = :email";
    
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":email",$email,PDO::PARAM_STR);

        try {
            if($stmt->execute()){

                $result = $stmt->fetch();
                $user_id = $result[0];
                    
                return $user_id;
            }else{
                throw new Exception("Získání uživatele selhalo");
            }
            
        } catch (Exception $e) {
            error_log("chyba u funkce getUserId,získání uživatele selhaloo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        }
    
    }

    public static function getUserRole($connect,$id){
        $sql = "SELECT role FROM user WHERE id = :id";
    
        $stmt = $connect->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);

        try {
            if($stmt->execute()){

                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result["role"];
                    
                return $user_id;
            }else{
                throw new Exception("Získání role selhalo");
            }
            
        } catch (Exception $e) {
            error_log("chyba u funkce getUserRole,získání uživatele selhaloo\n",3,"../errors/error.log");
            echo "Chyba: ".$e->getMessage();
        }
    
    }
          
    public static function isLoggedIn(){
        if(isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]){
            return true;
        }
    }
}