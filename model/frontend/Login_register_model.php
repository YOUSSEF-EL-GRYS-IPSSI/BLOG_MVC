<?php
require_once '././model/ModelDB.php';

class Login_register_model extends ModelDB {

    public function user_info($email, $pwd){
        $db = $this->db_connect();

        $query = $db->prepare('SELECT * FROM user WHERE  email= ? AND password = ?');
        $query->execute([
            $email,
            md5($pwd)
        ]);
        return $login_info = $query->fetch();
    }

    public function mail_exist($email){
        $db = $this->db_connect();

        $query = $db->prepare('SELECT  email FROM user WHERE  email= ?');
        $query->execute([$email]);
        return $mail_exist = $query->fetch();
    }

    public function new_visitor($lastname,$firstname, $email ,$pwd, $bio){
        $db = $this->db_connect();

        $query_user = $db->prepare('INSERT INTO user (lastname,firstname,email,password, bio) VALUES (?, ?, ?, ?, ?)');
        $query_user->execute([
            htmlspecialchars(ucfirst($lastname)),
            htmlspecialchars(strtoupper($firstname)),
            htmlspecialchars($email),
            htmlspecialchars(md5($pwd)),
            htmlspecialchars($bio)
        ]);
        return $db->lastInsertId();
    }
}