<?php
namespace core;

use PDO;

include_once 'db.php';

class User
{
    public function __construct () {
        //$this->SetUser();
    }

    private function SetUser () {
        if(!isset($_SESSION['current_user']) && $_COOKIE['current_user'] != '') {
            session_start();
            $_SESSION['current_user'] = $this->getUserById($_COOKIE['current_user']);
        }
    }

    static function RegisterUser ($args) {

        global $dbh;

        $sth = $dbh->prepare("INSERT INTO `users` SET `username` = :username, `password` = :password");
        $sth->execute(array('username' => $args['user_name'], 'password' => $args['user_password']));

        header('Location: /login.php');
    }

    static function UserLogin($args) {

        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM `users` WHERE `username` = ?");
        $sth->execute(array($args['user_name']));
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        if($user != '' && $user['password'] === $args['user_password']) {
            session_start();
            $_SESSION['current_user'] = $user;
            setcookie("current_user", $user['id'], strtotime("+30 days"));
        } else {
            session_start();
            $_SESSION['login_error'] = "Неверное имя пользвоателя или пароль.";
            $_SESSION['current_user'] = '';
            setcookie("current_user", '');
        }

        header('Location: /');
    }

    public function getUserById ($id) {

        global $dbh;
        global $user;

        $sth = $dbh->prepare("SELECT * FROM `users` WHERE `id` = ?");
        $sth->execute(array($id));
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function Logout () {
        $_SESSION['current_user'] = '';
        setcookie("current_user", '');
        header('Location: /login.php');
    }

}