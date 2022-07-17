<?php
    include "../header/header.php";

    if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $rolle = $_POST['rolle'];
    $cek = mysqli_query($host, "SELECT * FROM users WHERE username = '$user'")->fetch_assoc();
    if ($cek) {
        if (password_verify($pass, $cek['password'])) {
            $_SESSION['username'] = $cek['username'];
            $_SESSION['rolle'] = $cek['rolle'];
            $_SESSION['user_id'] = $cek['user_id'];
            $_SESSION['login'] = true;
            header('location:../user/user.php');
        } else {
            $error = 'username atau password salah';
        }
    } else {
        $error = 'Akun tidak ditemukan silahkan daftar terlebih dahulu';
    }
}

?>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12 col-md-5 col-lg-5 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Login</h3>
                    <hr>
                    <form method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                        <br>
                        <?php if (isset($error)) : ?>
                            <div class="form-group">
                                <small class="text-danger">
                                    <?= $error ?>
                                </small>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex justify-content-between">
                            <a href="../home/index.php" class="btn btn-danger">Cancel</a>
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include "../footer/footer.php";
?>