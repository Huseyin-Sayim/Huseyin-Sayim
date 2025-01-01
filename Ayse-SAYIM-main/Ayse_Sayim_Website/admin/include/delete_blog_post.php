<?php 
    $id = $_GET['id'];
    $selected_post = mysqli_fetch_assoc(get_selected_post($id));
    if (delete_post($id)) {
        $_SESSION['message'] = $selected_post['baslik']. 'isimli yazı başarıyla silindi';
        $_SESSION['type'] = 'success';
        echo '<script>window.location.href = "'. SITE .'index.php?page=yazılar.php";</script>';
    } else {
        $_SESSION['message'] = $selected_post['baslik']. 'silinemedi';
        $_SESSION['type'] = 'error';
        echo '<script>window.location.href = "'. SITE .'index.php?page=yazılar.php";</script>';
    };
?>