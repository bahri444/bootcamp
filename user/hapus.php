<?php
    include "../header/header.php";

    if (isset($_GET['user_id'])) {
        $user_id=$_GET['user_id'];
        $delete = mysqli_query($host, "DELETE FROM users WHERE user_id=$user_id");
        if ($delete) {
            echo "<script> alert('data done deleted');
            window.location.href='../user/user.php'</script>";
        }else {
            echo "<script> alert('data isn`t deleted');
            window.location.href='../user/user.php'</script>";
        }
    }

    include "../footer/footer.php";
?>