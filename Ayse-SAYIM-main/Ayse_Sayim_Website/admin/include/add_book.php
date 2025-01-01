<?php
    include 'DB_connection/ayar.php';
    
    $isim_err = $yazar_err = $inceleme_err = $cat_err = $tarih_err = $puan_err = $resim_err = $durum_err = $match = '';
    $isim = $yazar = $inceleme = $cat = $tarih = $puan = $resim = $durum = '';
    $okudum = $yarim = $okuyacagim = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $books = get_books();
        while ($book_again = mysqli_fetch_assoc($books)){
            if (trim(strtolower($book_again['kitap_adi'])) == trim(strtolower($_POST['kitap_isim']))) {
                $match = 'Match found';
            };
        };

        if (empty($_POST['durum'])) {
            $durum_err = 'Bir tanesini seçmelisiniz';
        } else {
            $durum = $_POST['durum'];
        };

        //! Okunan kitap kısmı 

        if ($durum == 'okudum') {
            $okudum = 1;
        } else if ($durum == 'yarim') {
            $yarim = 1;
        } else if ($durum == 'okuyacagim') {
            $okuyacagim = 1;
        };

        if ($okudum == 1) {
            if (empty($_POST['inceleme'])) {
                // $inceleme_err = 'İnceleme boş geçilemez.';
                echo "<script> alert('Kitap incelemesi eklemediniz'); </script>";
                $inceleme = 'Bu kitap hakkında henüz bir inceleme yazmadım.';
            } else {
                $inceleme = $_POST['inceleme'];
            };

            if (empty($_POST['tarih'])) {
                $tarih_err = 'Bir tarih seçmelisinz.';
            } else {
                $tarih = $_POST['tarih'];
            };

            if (empty($_POST['puan'])) {
                $puan_err = 'kitap için bir puan belirlemelisiniz';
            } else if ($_POST['puan'] < 0 or $_POST['puan'] > 10) {
                $puan_err = 'Puanlandırma 0-10 arasında olmalıdır.';
            } else {
                $puan = $_POST['puan'];
            };

        } else if ($yarim == 1) {
            if (empty($_POST['inceleme'])) {
                $inceleme = 'Bu kitap hakkında henüz bir inceleme yazmadım.';
            } else {
                $inceleme = $_POST['inceleme'];
            };

            if (empty($_POST['tarih'])) {
                $tarih_err = 'Bir tarih seçmelisinz.';
            } else {
                $tarih = $_POST['tarih'];
            };

            if (empty($_POST['puan'])) {
                $puan = 0;
            } else if ($_POST['puan'] < 0 or $_POST['puan'] > 10) {
                $puan_err = 'Puanlandırma 0-10 arasında olmalıdır.';
            } else {
                $puan = $_POST['puan'];
            };
        } else if ($okuyacagim == 1) {
            if (empty($_POST['inceleme'])) {
                $inceleme = 'Bu kitabı henüz okumadım.';
            } else {
                $inceleme = $_POST['inceleme'];
            };

            if (empty($_POST['tarih'])) {
                $tarih = null;
            } else {
                $tarih = $_POST['tarih'];
            };
            
            $puan = 0;
        };

        if (empty($_POST['kitap_isim'])) {
            $isim_err = 'Kitap ismi boş geçilemez.';
        } else if (!empty($match)) {
            $isim_err = 'Bu kitabı daha önce eklemişsiniz.';
            $_SESSION['message'] = 'Aynı kitabı tekrar ekleyemezsiniz';
            $_SESSION['type'] = 'error';
            echo '<script>window.location.href = "'. SITE .'index.php?page=kitap_ekle.php ";</script>';;
        } else {
            $isim = $_POST['kitap_isim'];
        };

        if (empty($_POST['yazar'])) {
            $yazar_err = 'Bir yazar seçmelisiniz.';
        } else {
            $yazar = $_POST['yazar'];
        };

        if (empty($_POST['kategori'])) {
            $cat_err = 'Bir kategori seçmelisiniz.';
        } else {
            $cat = $_POST['kategori'];
        };       

        if (empty($_FILES['resim'])) {
            $resim_err = 'Bir resim seçmelisinz.';
        } else {
            $resim = $_FILES['resim'];
        };

        if (empty($isim_err) && empty($yazar_err) && empty($inceleme_err) && empty($cat_err) && empty($tarih_err) && empty($resim_err) && empty($durum_err) && empty($puan_err)) {
            
            //! Resmi 'img' klasörü içersine aktarma
            $file_name = $resim['name'];
            $tmp_name = $resim['tmp_name'];
            $myPath ='img/Kitap/'. $file_name;

            if (move_uploaded_file($tmp_name, $myPath)) {
                $resim_url = $resim['name'];
            } else {
                $resimAktarma_err = 'Resim aktarılırken bir hata oluştu.'. $resim['error'];
            };

            
            //! SQL sorgusu ile tabloya ekleme kısmı

            if (add_book ($isim, $yazar, $inceleme, $cat, $tarih, $puan, $file_name, $okudum, $yarim, $okuyacagim)) {
                $_SESSION['message'] = 'Başarıyla eklendi';
                $_SESSION['type'] = 'success';
               echo '<script>window.location.href = "'. SITE .'index.php?page=kitaplar.php ";</script>';
            } else {
                $_SESSION['message'] = 'Bir hata oluştu';
                $_SESSION['type'] = 'error';
                echo '<script>window.location.href = "'. SITE .'index.php?page=kitap_ekle.php ";</script>';
            };
        };
    };

?>