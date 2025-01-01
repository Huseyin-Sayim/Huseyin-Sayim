<?php 
    $id = $_GET['id'];
    $selected_writer = mysqli_fetch_assoc(get_selected_writer($id));
    $match = '';
    $books = get_books();
    while ($book = mysqli_fetch_assoc($books)) {
        if ($book['yazar_id'] == $id) {
            $match = 'Match found';
            break;
        };
    };

    if (empty($match)) {
        if (delete_writer($id)) {
            $_SESSION['message'] = $selected_writer['isim']. ' isimli yazar başarıyla silindi';
            $_SESSION['type'] = 'success';
            echo '<script>window.location.href = "'. SITE .'index.php?page=yazarlar.php";</script>';
        } else {
            $_SESSION['message'] = $selected_writer['isim']. 'silinemedi';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=yazarlar.php";</script>';
        };
    } else {
        $_SESSION['message'] = $selected_writer['isim']. ' bir kitabın yazarı olarak girilmiş';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=yazarlar.php";</script>';
    };
?>