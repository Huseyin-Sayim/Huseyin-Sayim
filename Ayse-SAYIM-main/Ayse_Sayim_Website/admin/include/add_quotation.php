<?php
    $allinti_err = $kitap_err = '';
    $allinti = $kitap = $match = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ekle'])) {
        $quotations = get_quotation();
        while ($quotation = mysqli_fetch_assoc($quotations)) {
            if ($quotation['alıntı'] == $_POST['alinti']) {
                $match = 'Match found';
            };
        };
        if (empty($_POST['kitap_adi'])) {
            $kitap_err = 'Kitap seçmelisiniz';
        } else if (!empty($match)) {
            $kitap_err = 'Aynı alıntıyı tekrar ekleyemezsiniz';
            $_SESSION['message'] = 'Aynısından ekleyemezsiniz';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=alinti_ekle.php ";</script>';
        } else {
            $kitap = $_POST['kitap_adi'];
        };

        if (empty($_POST['alinti'])) {
            $allinti_err = 'Alıntı alanı boş gecilemez';
        } else {
            $allinti = str_replace("'", '"' ,$_POST['alinti']);
        };

        if (empty($inceleme_err) && empty($kitap_err)) {
           include 'DB_connection/ayar.php';
            $query = "INSERT INTO alıntılar(alıntı, kitap_id) VALUES ('$allinti', $kitap) ";
            if (mysqli_query($connection, $query)) {
                $_SESSION['message'] = 'Başarıyla eklendi';
                $_SESSION['type'] = 'success';
                echo '<script>window.location.href = "'. SITE .'index.php?page=alıntılar.php ";</script>';
            } else {
                $_SESSION['message'] = 'Beklenmedik bir hata olulştu';
                $_SESSION['type'] = 'error';
                echo '<script>window.location.href = "'. SITE .'index.php?page=alinti_ekle.php ";</script>';
            }
            mysqli_close($connection);
        };
    };

?>