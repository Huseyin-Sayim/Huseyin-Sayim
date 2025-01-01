<?php 
    $id = $_GET['id'];
    $selected_book_category = mysqli_fetch_assoc(get_selected_category($id));
    $match = '';
    $books = get_books();
    while ($book = mysqli_fetch_assoc($books)) {
        if ($book['category_Id'] == $id) {
            $match = 'Match found';
            $book_name = $book['kitap_adi'];
        };
    }; 
    if (empty($match)) {
        if (delete_book_category($id)) {
            $_SESSION['message'] = 'Başarıyla silindi';
            $_SESSION['type'] = 'success';
            echo '<script>window.location.href = "'. SITE .'index.php?page=book_categories.php";</script>';
        } else {
            $_SESSION['message'] = 'Silinemedi';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=book_categories.php";</script>';
        };
    } else {
        $_SESSION['message'] = 'Bu kayıt kullanımda!  ' . $book_name .' adlı kitap bu kategoriye ait';
        $_SESSION['type'] = 'error';
        echo '<script>window.location.href = "'. SITE .'index.php?page=book_categories.php";</script>';
    };
?>