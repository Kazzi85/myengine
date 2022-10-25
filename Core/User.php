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

    public  static function get_users () {
        global $dbh;

        $sth = $dbh->prepare("SELECT * FROM `users`");
        $sth->execute();
        $users = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $users;
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

    /**
     * Method return avatar image of current user.
     */
    static function get_avatar ($user_id) {
        if(isset($_SESSION['current_user'])) {
            return $_SESSION['current_user']['avatar'];
        } else {
            return false;
        }
    }

    /**
     * Method return avatar image of current user.
     */
    static function get_username ($user_id) {
        if(isset($_SESSION['current_user'])) {
            return $_SESSION['current_user']['username'];
        } else {
            return false;
        }
    }

    static function user_role () {
        global $dbh;
        session_start();
        if(isset($_SESSION['current_user']) && $_SESSION['current_user'] != '') {
            $sql = "SELECT FROM `users_role` WHERE `id` = :user_id";
            $statement = $dbh->prepare($sql);
            $statement->bindValue("user_id", $_SESSION['current_user']['role_id']);
            $statement->execute();
            $user_role = $statement->fetchAll();
            return $user_role;
        } else {
            return false;
        }
    }

    static function get_roles () {
        global $dbh;
        $sql = "SELECT * FROM `users_role`";
        $statement = $dbh->prepare($sql);
        $statement->bindValue("user_id", $_SESSION['current_user']['role_id']);
        $user_roles = $statement->execute(PDO::FETCH_ASSOC);
        return $user_roles;
    }

    static function get_role_by_user_id ($role_id) {
        if(isset($role_id)) {
            global $dbh;
            $sql = "SELECT * FROM `users_role` WHERE `id` = :role_id";
            $statement = $dbh->prepare($sql);
            $statement->bindValue("role_id", $role_id);
            $statement->execute();
            $role = $statement->fetch(PDO::FETCH_ASSOC);
            return $role;
        }
    }

    static public function del_user ($user_id) {
        global $dbh;

        if($user_id && $user_id != ''){
            $sql = "DELETE FROM `users` WHERE `id` = :user_id";
            $statement = $dbh->prepare($sql);
            $statement->bindValue("user_id", $user_id);
            $statement->execute();
            session_start();
            if($_SESSION['current_user']['id'] == $user_id){
                self::Logout();
            }
            header('Location: /admin');
        }
    }

}