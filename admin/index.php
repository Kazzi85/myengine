<?php
    include_once 'Core/Admin.php';

    $adminClass = new admin\core\Admin();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <link rel="stylesheet" href="assets/libs/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/admin_styles.css">

</head>
<body>
    <header class="container-fluid admin_header">
        <div class="row d-flex align-items-center">
            <div class="col-lg-4">
                <h2>Admin panel</h2>
            </div>
            <div class="col-lg-9">

            </div>
        </div>
    </header>

    <section class="container-fluid admin_main_wrap">
        <div class="row">
            <div class="col-lg-2 admin_sidebar_wrap">
                <div class="admin_sidebar_header">
                    <img src="../assets/img/default_avatar.png" alt="admin_logo" width="40">
                    <p>Admin</p>
                </div>
                <div class="main_blocks">
                    <a href="/admin">dashboard</a><br>
                    <a href="/admin/block.php">dashboard</a>
                </div>
            </div>

            <div class="col-lg-10">
                <?php $adminClass::get_admin_block($_GET['admin_path']); ?>
            </div>
        </div>
    </section>

    <footer>

    </footer>

    <script src="assets/libs/js/jquery-3.6.1.min.js"></script>
    <script src="assets/libs/js/bootstrap.bundle.min.js"></script>
</body>
</html>