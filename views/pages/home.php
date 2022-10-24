<?php

    include_once 'Core/User.php';

    $user = new \core\User();

?>

<section class="container">
    <div class="row">
        <div class="posts_list_wrap">
            <div class="post_item">

                <?php
                echo "Сессия: ";
                print_r($_SESSION['current_user']);
                ?>
            </div>
        </div>
    </div>
</section>
