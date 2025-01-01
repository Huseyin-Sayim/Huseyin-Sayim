<?php 
    $id = $_GET['id'];
    $selected_post_category = mysqli_fetch_assoc(get_selected_post_category($id));
    $match = '';
    $posts = get_posts();
    while ($post = mysqli_fetch_assoc($posts)) {
        if ($post['etiket_id'] == $id) {
            $match = 'Match found';
            $post_title = $post['baslik'];
        };
    };
    if (empty($match)) {
        if (delete_post_category($id)) {
            $_SESSION['message'] = 'Başarıyla silindi';
            $_SESSION['type'] = 'success';
            echo '<script>window.location.href = "'. SITE .'index.php?page=post_categories.php";</script>';
        } else {
            $_SESSION['message'] = 'Silinemedi';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=post_categories.php";</script>';
        };
    } else {
        $_SESSION['message'] = 'Bu kayıt kullanımda ' . $post_title .' adlı yazı bu kategoriye ait';
        $_SESSION['type'] = 'error';
        echo '<script>window.location.href = "'. SITE .'index.php?page=post_categories.php";</script>';
    };
?>