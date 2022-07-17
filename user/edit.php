<?php
    include "../header/header.php";
    if (isset($_POST['update'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rolle = $_POST['rolle'];
        $update = mysqli_query($host, "UPDATE users SET username='$username', password='$password',rolle='$rolle' WHERE user_id='$user_id'");
        if ($update) {
            echo "<script> alert('data done updated');
            window.location.href='../user/user.php'</script>";
        }else {
            echo "<script> alert('data isn`t updated');
            window.location.href='../user/user.php?user_id=$user_id'</script>";
        }
    }
?>

<?php
    $user_id =$_GET['user_id'];
    $data_user_id=mysqli_query($host,"SELECT * FROM users WHERE user_id='$user_id'");
    $row=mysqli_fetch_assoc($data_user_id);

    $get_rolle=mysqli_query($host,"SELECT rolle FROM users GROUP BY rolle");
?>

    <div class="container">
    <div class="row">
        <div class="card mt-5 mx-auto col-sm-12 col-md-6 col-lg-5 ">
            <div class="card-body">
                <h3 class="text-center">Update Akun</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?= $row['user_id']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $row['username']; ?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $row['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rolle">Rolle</label>
                        <select class="form-select" name="rolle" aria-label="Default select example">
                            <option selected value="<?=$row['rolle'];?>"><?=$row['rolle'];?></option> <!--ambil rolle member yang sedang di gunakan saat ini-->
                            <?php while ($sql= mysqli_fetch_array($get_rolle)) :?>
                                <option value="<?=$sql['rolle'] ;?>"><?=$sql['rolle'];?></option><!--tampilkan semua rolle yang ada di tadabase-->
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-primary w-100" type="submit" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<?php
    include "../footer/footer.php";
?>