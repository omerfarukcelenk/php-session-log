<?php

require_once("database.php");
class User{
    private $id;
    private $username;
    private $password;


    public function giris($method){
        $time = 2;
        $database = new Database();
        $db = $database->connect();
        session_start();
        $username = "";
        $password = "";

        $_SESSION["username"] = $method["username"];
        $_SESSION["password"] = $method["password"];
        $_SESSION["mesaj"] = "";

        if (empty($method)){
            $_SESSION["mesaj"] = "lütfen boş bırakmayınız";
        }else{
            $username = $method["username"];
            $password = $method["password"];
            $sql = $db->prepare("SELECT * FROM users WHERE username = :usn AND password = :psw");
            $sql->execute(['usn'=>$username,'psw'=>$password]);
            $users = $sql->fetchAll(PDO::FETCH_ASSOC);
            if (!$users){
                $_SESSION["mesaj"] = "Böyle bir kayıt yok";
            }else{
                $_SESSION["mesaj"] = "Giriş Başarılı " . $username ;

            }
        }
    }


    public function sessionKaldir($method){






//        if ($method['submit']){
//            session_destroy();
//            header("location: http://localhost/php-session-log/");
//        }else {
//            $_SESSION["mesaj"] = "çıkış başarısız";
//        }
    }
}

