<?php
    include "../header/header.php";

    if (isset($_POST['daftar'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rolle = $_POST['rolle'];
        $tester=mysqli_query($host, "INSERT INTO users VALUES(null,'$username','$password','$rolle')");
        if (mysqli_affected_rows($host) > 0) {
            header('location:../user/login.php');
        } else {
            $error = true;
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="card mt-5 mx-auto col-sm-12 col-md-6 col-lg-5 ">
            <div class="card-body">
                <h3 class="text-center">Buat Akun</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="rolle">Rolle</label>
                    <select class="form-select" name="rolle" aria-label="Default select example">
                        <option selected>--- Pilih Level ---</option>
                        <option value="admin">Admin</option>
                        <option value="member">Member</option>
                    </select>
                    </div>
                    <?php if (isset($error)) : ?>
                        <small class="text-danger">Pendaftaran Gagal</small>
                    <?php endif; ?>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary w-100" type="submit" name="daftar">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    include "../footer/footer.php"
?>