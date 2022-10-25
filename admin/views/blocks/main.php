<?php
use core\User;
?>

<section class="container p-5">
    <div class="row">
        <h2>Users</h2>
        <hr>
        <div class="users">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $users = User::get_users();
                foreach ($users as $user) :
                ?>
                <tr>
                    <th scope="row"><?= $user['id']; ?></th>
                    <td><img src="../assets/img/<?= $user['avatar']; ?>" alt="avatar" width="20"></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= User::get_role_by_user_id($user['role_id'])['role']; ?></td>
                    <td>
                        <form action="/admin/Core/admin_controller.php" method="post">
                            <input type="hidden" value="<?= $user['id']?>" name="user_id">
                            <button type="submit" name="del_user">Del</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>