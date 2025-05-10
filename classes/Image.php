<?php

Class Image{

    public static function InsertImage($connect,$user_id,$image_name){
        $sql = "INSERT INTO image(user_id,image_name) VALUES (:user_id,:image_name)";

        $stmt = $connect -> prepare($sql);
        $stmt -> bindValue(":user_id",$user_id,PDO::PARAM_INT);
        $stmt -> bindValue(":image_name",$image_name,PDO::PARAM_STR);

        
        if($stmt->execute()){
            return true;
        }
            
        
    }

    public static function getImageByUserId($connect,$user_id){
        $sql = "SELECT image_name FROM image WHERE user_id = :user_id";

        $stmt = $connect ->prepare($sql);
        $stmt -> bindValue("user_id",$user_id,PDO::PARAM_INT);

        if($stmt -> execute()){
            $img = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            return $img;
        }
    }

    public static function deleteImageFromDirectory($path){

        try {
            if(!file_exists($path)){
                throw new Exception("Soubor neexistuje a nemůže být smazán");
            }

            //smazání souboru
            if(unlink($path)){
                return true;
            }else{
                throw new Exception("Při mázání souboru nastala chyba\n");
            }
          
        } catch (Exception $e) {
            echo $e->getMessage();
            error_log("Chyba: Při mazání souboru došlo k chybě\n",3,"../errors/error.log");
        }
    }

    public static function deleteImageFromDB($connect,$image_name){
        $sql = "DELETE FROM image WHERE image_name = :image_name";

        $stmt = $connect -> prepare($sql);
        $stmt->bindValue("image_name",$image_name,PDO::PARAM_STR);
        
        if($stmt->execute()){
            return true;
        }
    }

}