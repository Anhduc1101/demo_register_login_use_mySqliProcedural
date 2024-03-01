<?php
class Database{
    private static $conn;

    public static function moketnoi($host,$username,$password,$dbname){
        global $conn;
        if (!$conn){
            try {
//                self::$conn=new PDO("mysql:host=localhost","root","","duc");
                self::$conn = new PDO("mysql:host=localhost;dbname=duc", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                self::$conn->setAttribute(3,2);
                echo "Connected Successfully";
                echo '</br>';
            }catch (PDOException $e){
                die("Connected faied".$e->getMessage());
            }
        }
    }

    public static function dongketnoi(){
        global $conn;
        if ($conn){
            self::$conn=null;
        }
    }

    public static function layconn(){
        return self::$conn;
    }
}




