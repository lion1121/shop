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
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
        $result->execute(['email' => $email]);
        if ($result->fetchColumn()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUsersEmailPassword($email, $password)
    {
        $usersData = false;
        $db = Db::getConnection();
        $result = $db->prepare('
            SELECT id, name, email, password FROM user WHERE email = :email
        ');
        $result->execute([
            'email' => $email
        ]);

        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $usersData[] = $row;

        }
        $password_hash = $usersData[0]['password'];
        if (password_verify($password, $password_hash)) {
            return $usersData;
        } else {
            return false;
        }
    }

    public static function auth($id)
    {
        $_SESSION['username'] = $id;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['username'])) {
            return $_SESSION['username'];
        }
        header("Location: /user/signin");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['username'])) {
            return false;
        }
        return true;
    }

    public static function getUserById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();
            $result = $db->prepare('
                SELECT * FROM user WHERE id = :id
            ');

            $result->execute([
                'id' => $id
            ]);
            return $result->fetch();
        }

    }
}