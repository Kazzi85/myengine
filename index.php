<?php
include_once 'core/MainClass.php';
include_once 'Core/Post.php';


use core\MainClass;

MainClass::get_header();

MainClass::get_content($_GET['path']);

MainClass::get_footer();

