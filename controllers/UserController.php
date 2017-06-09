<?php


class UserController
{
    public function actionSignup()
    {
        $name = '';
        $email = '';
        $password = '';


        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkName($name)) {
                $errors['name'] = 'Имя не должно быть  короче 2-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors['email'] = 'Некорректный email';
            }

            if (!User::checkPassword($password)) {
                $errors['password'] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors['has_email'] = 'Такой email уже существует';
            }
            if ($errors == false) {
                // Продолжаем проверять форму

                $result = User::signup($name, $email, $password);

                $name = '';
                $email = '';
                $password = '';
            }
        }
        require_once ROOT . '/views/user/signup.php';
        return true;
    }

    public function actionSignin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if (!User::checkEmail($email)) {
                $errors['email'] = 'Некорректный email';
            }

            if (!User::checkPassword($password)) {
                $errors[0]['password'] = 'Пароль не должен быть короче 6-ти символов';
            }

            $usersArray = User::getUsersEmailPassword($email, $password);
            if (!is_array($usersArray)) {
                $errors['access'] = 'Не верно введены email или пароль';
            }
            else {

                User::auth($usersArray[0]['id']);
                header('Location: /cabinet/');
                exit();

            }

        }
        require_once ROOT . '/views/user/signin.php';

        return true;
    }
    public function actionLogout()
    {
        session_start();
        unset($_SESSION['username']);
        header('Location: /');
    }
}