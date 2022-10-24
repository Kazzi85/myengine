<?php

include_once 'core/MainClass.php';

$mainClass = new \core\MainClass();

$mainClass::get_header();

$mainClass::get_content($_GET['path']);

$mainClass::get_footer();

