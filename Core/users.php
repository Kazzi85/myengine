<?php

    include_once 'User.php';

    $user = new \core\User();


    if(isset($_POST['register_user'])) {

        $args = [
            'user_name' => $_POST['login'],
            'user_password' => md5($_POST['password']),
        ];

        $user::RegisterUser($args);

    }


    if (isset($_POST['login_user'])) {
        $args = [
            'user_name' => $_POST['login'],
            'user_password' => md5($_POST['password']),
        ];

        $user::UserLogin($args);

    }

    if (isset($_POST['Logout'])) {
        $user->Logout();
    }


