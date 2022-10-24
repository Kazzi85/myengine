<?php
session_start();

include_once 'core/MainClass.php';
include_once 'Core/User.php';

$mainClass = new \core\MainClass();
$user = new core\User();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php $mainClass::get_all_styles(); ?>
</head>
<body>

    <header>

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12">

                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/"><img src="assets/img/logo.png" class="img-fluid" alt="logo" width="200"></a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <?php $mainClass::get_menu(); ?>
                            </div>
                            <div class="userinfo">
                                <?php
                                if(isset($_SESSION['current_user']) && $_SESSION['current_user'] != '') {
                                    echo '
                                            <form method="post" action="/Core/users.php">
                                            <b>' . $_SESSION['current_user']['username'] . '</b> 
                                            <img src="/assets/img/' . $_SESSION['current_user']['avatar'] . '" alt="" width="20" >
                                            <button name="logout">Logout</button>
                                         ';
                                }else{
                                    echo '<a class="nav-link" href="login.php">Login</a> <a class="nav-link" href="register.php">Register</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </nav>

                </div>

            </div>

        </div>

    </header>