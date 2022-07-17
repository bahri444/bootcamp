<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('location:login.php');
    }

    include "../header/header.php";
    $data=mysqli_query($host, "SELECT * FROM users ORDER BY user_id DESC");
?>
    <h3 class="text-center">Data User</h3>

    <a href="../user/register.php" class="btn btn-info btn-sm fs-5 ms-2">
        <i class="uil uil-plus"></i>Add New
    </a>
    <hr>

    <table class="table table-striped table-hover md-lg-5">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Rolle</th>
            <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;
            foreach ($data as $list) : ?>
                <tr>
                    <th><?= $i++ ?></th>
                    <td><?= $list['username'] ?></td>
                    <td><?= $list['password'] ?></td>
                    <td><?= $list['rolle'] ?></td>
                    <td class="text-center">
                        <a href="../user/edit.php?user_id=<?= $list['user_id']; ?>" class="btn btn-primary h-40 btn-sm fs-5">
                            <i class="uil uil-edit-alt"></i>
                        </a>
                        <a href="../user/hapus.php?user_id=<?= $list['user_id']; ?>" class="btn btn-danger h-40 btn-sm fs-5">
                            <i class="uil uil-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php
    include "../footer/footer.php"
?>