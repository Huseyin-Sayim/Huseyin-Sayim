<?php 
    $yazi = $cat = $resim_1 = $resim_2 = $resim_3 = $hata = $success = $warning = $resim_1_url = $resim_2_url = $resim_3_url = $resim_err = $baslik = $tarih = $match = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['yazi']) && !empty($_POST['cat']) && !empty($_POST['baslik']) && !empty($_POST['tarih'])) {
            $yazi = $_POST['yazi'];
            $postss = get_posts();
            while ($post = mysqli_fetch_assoc($postss)) {
                if ($post['baslik'] == $_POST['baslik']) {
                    $match = 'Match found';
                };
            };

            if (!empty($match)) {
                $_SESSION['message'] = 'Aynı başlığa sahip bir yazı ekleyemezsiniz';
                $_SESSION['type'] = 'error';
                echo '<script>window.location.href = "'. SITE .'index.php?page=yazi_ekle.php ";</script>';
            };
            $cat = $_POST['cat'];
            $baslik = $_POST['baslik'];
            $tarih = $_POST['tarih'];

            if (!empty($_FILES['resim_1'])) {
                $resim_1 = $_FILES['resim_1'];
            };

            if (!empty($_FILES['resim_2'])) {
                $resim_2 = $_FILES['resim_2'];
            };
            
            if (!empty($_FILES['resim_3'])) {
                $resim_3 = $_FILES['resim_3'];
            };
            
        } else {
            $hata = 'Resimler hariç diğer alanlar boş geçilemez';
        };
        
        if ($hata == '' ) {

            //! Resimleri dosyaya aktarma kısmı

            if (isset($resim_1)) {
                $name_1 = $resim_1['name'];
                $tmp_1 = $resim_1['tmp_name'];
                $my_path_1 = 'img/yazı/'. $name_1;
                if (move_uploaded_file($tmp_1 , $my_path_1)) {
                    $resim_1_url = $resim_1['name'];
                } else {
                    $resim_err = '1. resim dosyaya aktarılamadı' . '<br>' ;
                };
            };

            if (isset($resim_2)) {
                $name_2 = $resim_2['name'];
                $tmp_2 = $resim_2['tmp_name'];
                $my_path_2 = 'img/yazı/'. $name_2;
                if (move_uploaded_file($tmp_2 , $my_path_2)) {
                    $resim_2_url = $resim_2['name'];
                } else {
                    $resim_err .= '2.resim dosyaya aktarılamadı' . '<br>' ;
                };
            };

            if (isset($resim_3)) {
                $name_3 = $resim_3['name'];
                $tmp_3 = $resim_3['tmp_name'];
                $my_path_3 = 'img/yazı/'. $name_3;
                if (move_uploaded_file($tmp_3 , $my_path_3)) {
                    $resim_3_url = $resim_3['name'];
                } else {
                    $resim_err .= '3. resim dosyaya aktarılamadı';
                };
            };
            
            if (add_blog_post ($baslik, $yazi, $cat, $resim_1_url,  $resim_2_url, $resim_3_url ,$tarih)) {
                $_SESSION['message'] = 'Başarıyla eklendi';
                $_SESSION['type'] = 'success';
               echo '<script>window.location.href = "'. SITE .'index.php?page=yazılar.php ";</script>';
            } else {
                $_SESSION['message'] = 'Bir hata oluştu';
                $_SESSION['type'] = 'error';
                echo '<script>window.location.href = "'. SITE .'index.php?page=yazi_ekle.php ";</script>';
            };

            

            if (!empty($resim_err)) {
                echo '<div class="alert alert-danger mt-3 w-50 mx-auto">'. $resim_err .'</div>';
            };
        };
    };
?>
