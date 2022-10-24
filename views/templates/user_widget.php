<?php if(isset($_SESSION['current_user']) && $_SESSION['current_user'] != '') { ?>
    <form method="post" action="/Core/users.php">
        <b>' . $_SESSION['current_user']['username'] . '</b>
        <img src="/assets/img/ <?= $_SESSION['current_user']['avatar']; ?>" alt="" width="20" >
        <button type="submit" name="logout">Logout</button>
    </form>
<?php }else{ ?>

    <p><a class="nav-link" href="login.php">Login</a> <a class="nav-link" href="register.php">Register</a></p>';

<?php } ?>
