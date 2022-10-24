<?php
namespace core;

use PDO;

include_once 'db.php';

class User
{
    public function __construct () {

    }

    static function RegisterUser ($args) {

        global $dbh;

        $sth = $dbh->prepare("INSERT INTO `users` SET `username` = :username, `password` = :password");
        $sth->execute(array('username' => $args['user_name'], 'password' => password_hash($args['user_password'], PASSWORD_DEFAULT)));

        if (USER_AUTOLOGIN) {
            self::UserLogin($args);
        } else {
            header('Location: /login.php');
        }
    }

    static function UserLogin($args) {

        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM `users` WHERE `username` = ?");
        $sth->execute(array($args['user_name']));
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        if($user != '' && password_verify($args['user_password'], $user['password'])) {
            session_start();
            $_SESSION['current_user'] = $user;
            if(isset($_COOKIE['user_id'])){
                setcookie('user_id', $user['id'], strtotime("+30 days"));
            } else {
                $_COOKIE['user_id'] = $_SESSION['current_user']['id'];
            }
        } else {
            session_start();
            $_SESSION['login_error'] = "Неверное имя пользвоателя или пароль.";
            $_SESSION['current_user'] = '';
            setcookie("user_id", '', time());
        }

        header('Location: /');
    }

    public function getUserById ($id) {

        global $dbh;
        global $user;

        $sth = $dbh->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $sth->execute(array('id' => $id));
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        return $user;

    }

    public function Logout () {
        session_start();
        unset($_SESSION['current_user']);
        $_COOKIE['user_id'] = '';
        header('Location: /');
    }

}