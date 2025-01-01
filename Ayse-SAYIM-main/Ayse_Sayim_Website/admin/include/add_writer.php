<?php  
    include 'DB_connection/ayar.php';

    $yazar_isim_err = $yazar_resim_err = $ulke_err = $y_isim_hata = '';
    $yazar_isim = $yazar_resim = $ulke = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (empty($_POST['yazar_isim'])) {
            $yazar_isim_err = 'Yazar ismi girmelisiniz.';
        } else {
            $yazarlar = get_writer();
            while ($w_name = mysqli_fetch_assoc($yazarlar)) {
                if (trim(strtoupper($w_name['isim'])) == trim(strtoupper($_POST['yazar_isim']))) {
                    $yazar_isim_err = 'Bu yazar zaten listenizde var';
                    $_SESSION['message'] = 'Aynısından ekleyemezsiniz';
                    $_SESSION['type'] = 'error';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=yazar_ekle.php ";</script>';
                    break;
                } else {
                    $y_isim_hata = 'eşleşme yok';  
                };
            };

            if ($y_isim_hata == 'eşleşme yok' or mysqli_num_rows($yazarlar) == 0) {
                $yazar_isim = $_POST['yazar_isim'];
            };
        };

        if (empty($_POST['ulke'])) {
            $ulke_err = 'Ülke girmelisiniz.';
        } else {
            $countrys = get_country();
            while ($country = mysqli_fetch_assoc($countrys)) {
                if (trim(strtolower($country['ülke'])) == trim(strtolower($_POST['ulke']))) {
                    $ulke = $country['Id'];
                    break;
                };
            };

            if (empty($ulke)) {
                if (add_country($_POST['ulke'])) {
                    $success_ulke = 'Ülke veritabanına başarıyla eklendi';
                } else {
                    $alert_ulke = 'Ülke veritabanına eklenirken bir hata oluştu';
                };
            };           
        }; 

        if (empty($_FILES['resim'])) {
            $yazar_resim_err = 'Bir resim dosyası eklemelisiniz.';
        } else {
            $yazar_resim = $_FILES['resim'];
        };

        if (empty($yazar_resim_err) && empty($yazar_isim_err) && empty($ulke_err)) {
            //! Resmi 'img/yazar' klasörüne aktarma
            $file_name = $yazar_resim['name'];
            $tmp_name = $yazar_resim['tmp_name'];
            $my_path = 'img/yazar/'. $file_name;

            if (move_uploaded_file($tmp_name, $my_path)) {
                $resim_url = $yazar_resim['name'];
            } else {
                $resimAktarma_err = 'Resim aktarılırken bir hata oluştu.'. $yazar_resim['error'];
            };

            //! SQL sorgusu yazma

            if (empty($ulke)) {
                $istenilen_ulke = mysqli_fetch_assoc(eklenen_ulkeyi_getir($_POST['ulke']));
                $ulke = $istenilen_ulke['Id'];
            };
            
            if (add_writer($yazar_isim, $ulke, $resim_url)) {
                $_SESSION['message'] = 'Başarıyla eklendi';
                $_SESSION['type'] = 'success';
                echo '<script>window.location.href = "'. SITE .'index.php?page=yazarlar.php ";</script>';
            } else {
                $_SESSION['message'] = 'Beklenmedik bir hata olulştu';
                $_SESSION['type'] = 'error';
                echo '<script>window.location.href = "'. SITE .'index.php?page=yazar_ekle.php ";</script>';
            };

            //! ÜLKELERİ EKLİYOR YAZAR EKLEMİYOR

        };

    };

?>