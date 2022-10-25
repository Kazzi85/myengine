<?php
include_once '../../Core/User.php';
use admin\core\Admin;
use core\User;

if (isset($_POST['del_user'])) {
    User::del_user($_POST['user_id']);
}