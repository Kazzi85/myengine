<?php
session_start();

include_once 'Core/Admin.php';
include_once '../Core/User.php';

use admin\core\Admin;
use core\User;

if(isset($_SESSION['current_user']) && $_SESSION['current_user'] != '' && $_SESSION['current_user']['role_id'] == 3):
?>

<?php Admin::get_admin_header(); ?>

<section class="container-fluid admin_main_wrap">
    <div class="row">
        <div class="col-lg-2 admin_sidebar_wrap">
            <div class="admin_sidebar_header">
                <img src="../assets/img/<?= User::get_avatar($_SESSION['current_user']); ?>" alt="admin_logo" width="40">
                <p><?= User::get_username($_SESSION['current_user']); ?></p>
            </div>
            <?php Admin::get_admin_links(); ?>
        </div>

        <div class="col-lg-10">
            <?php Admin::get_admin_block($_GET['admin_path']); ?>
        </div>
    </div>
</section>

<?php Admin::get_admin_footer(); ?>
<?php else:
header('Location: /');
endif;
?>

