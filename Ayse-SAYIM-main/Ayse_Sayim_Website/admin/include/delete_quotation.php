<?php 
    $id = $_GET['id'];
    $selected_quotation = mysqli_fetch_assoc(get_selected_quotation($id));
    if (delete_quotation($id)) {
        $_SESSION['message'] = 'Başarıyla silindi';
        $_SESSION['type'] = 'success';
        echo '<script>window.location.href = "'. SITE .'index.php?page=alıntılar.php";</script>';
    } else {
        $_SESSION['message'] = 'Silinemedi';
        $_SESSION['type'] = 'error';
        echo '<script>window.location.href = "'. SITE .'index.php?page=alıntılar.php";</script>';
    };
?>