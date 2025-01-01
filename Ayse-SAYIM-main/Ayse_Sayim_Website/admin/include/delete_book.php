<?php 
    $id = $_GET['id'];
    $selected_book = mysqli_fetch_assoc(get_selected_book($id));
    $match = '';
    $quotations = get_quotation();
    while ($quotation = mysqli_fetch_assoc($quotations)) {
        if ($quotation['kitap_id'] == $id) {
            $match = 'Match found';
            break;
        };
    };
    if (empty($match)) {
        if (delete_book($id)) {
            $_SESSION['message'] = $selected_book['kitap_adi']. ' isimli kitap başarıyla silindi';
            $_SESSION['type'] = 'success';
            echo '<script>window.location.href = "'. SITE .'index.php?page=kitaplar.php";</script>';
        } else {
            $_SESSION['message'] = $selected_book['kitap_adi']. 'silinemedi';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=kitaplar.php";</script>';
        };
    } else {
        $_SESSION['message'] = $selected_book['kitap_adi']. 'kitabından bir alıntı yapılmış';
        $_SESSION['type'] = 'error';
        echo '<script>window.location.href = "'. SITE .'index.php?page=kitaplar.php";</script>';
    };
?>