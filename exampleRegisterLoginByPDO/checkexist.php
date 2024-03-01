<?php
class Validate{
    private static $conn;
    public static function is_username_exist(){
        global $conn;
        try {
            self::$conn = new PDO("mysql:host=localhost;dbname=duc", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            self::$conn->setAttribute(3,2);
            $stmt = self::$conn->prepare("SELECT username FROM user WHERE username = :username ");
            $stmt->bindParam(':username',$username);
            $stmt->execute();
            $count=$stmt->rowCount();
            if ($count>0){
                $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
                $message='';
            }
        }catch (PDOException $e){
            die("Error".$e->getMessage());
        }
    }
}