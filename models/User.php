<?php


class User
{
    public static function signup($name, $email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();
        $result = $db->prepare('
            INSERT INTO user (name, email, password) VALUES (:name, :email, :password)
        ');
        $result->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password_hash
        ]);
    }

    public static function checkName($name)
    {
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }
    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $result = $db->prepare('
        SELECT COUNT(*) FROM user WHERE email = :email
        ');
        $result->execute(['email'=> $email]);
        if ($result->fetchColumn()) {
            return true;
        }
        else {
            return false;
        }
    }
}