<?php 
    if (isset($_POST['edit_profile'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $new_username = $_POST['new_username'];
        $no_hash_new_pass = $_POST['new_password'];
        $new_password = password_hash($no_hash_new_pass, PASSWORD_DEFAULT);
        $user__ = get_admin();
        $user = mysqli_fetch_assoc($user__);
        if ($user) {
            $id = $user['Id'];
            if (password_verify($password, $user['password'])) {
                $edit_admin_query = "UPDATE `admin` SET `username`='$new_username',`password`='$new_password' WHERE Id = $id"; 
                $edit_admin = mysqli_query($connection, $edit_admin_query);
                if ($edit_admin_query) {
                    $_SESSION['message'] = 'Bilgileriniz başarıyla değiştirildi';
                    $_SESSION['type'] = 'success';
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                    echo '<script>window.location.href = "'. SITE .'index.php?page=home.php ";</script>';
                } else {
                    echo '<script>Swal.fire("Hata", "Güncellenemedi", "error"); </script>';
                };

            } else {
                echo '<script>Swal.fire("Hata", "Eski kullanıcı adınız veya parolanız doğru değil", "error"); </script>';
            };
        } else {
            $query = "INSERT INTO `admin`(`username`, `password`) VALUES ('$new_username','$new_password')";
            $result = mysqli_query($connection, $query);
            if ($result) {
                $_SESSION['message'] = 'Bilgileriniz başarıyla eklendi';
                $_SESSION['type'] = 'success';
                unset($_SESSION['username']);
                unset($_SESSION['password']);
                echo '<script>window.location.href = "'. SITE .'index.php?page=home.php ";</script>';
            } else {
                echo '<script>Swal.fire("Hata", "Bir hata oluştu", "error"); </script>';
            };
        };
    };
?>

<form action="#" method="POST" class="w-50 mx-auto my-5">
        <input type="text" name="username" id="username" class="form-control mb-3" placeholder="Mevcut kullanıcı adini girniz">
        <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Mevcut şifrenizi girniz">

        <input type="text" name="new_username" id="new_username" class="form-control mb-3" placeholder="Yeni kullanıcı adini girniz">
        <input type="password" name="new_password" id="new_password" class="form-control mb-3" placeholder="Yeni şifrenizi girniz">
        <input type="submit" name="edit_profile" value="Onayla" class="btn btn-primary form-control text-uppercase fw-bold">
</form>