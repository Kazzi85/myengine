<?php

include_once 'core/MainClass.php';
include_once 'core/User.php';

$mainClass = new \core\MainClass();
$User = new \core\User();

/*if(isset($_COOKIE['user_id'])){
    $user = $User->getUserById($_COOKIE['user_id']);
    var_dump($user);
}*/

$mainClass::get_header();

$mainClass::get_content($_GET['path']);

$mainClass::get_footer();

