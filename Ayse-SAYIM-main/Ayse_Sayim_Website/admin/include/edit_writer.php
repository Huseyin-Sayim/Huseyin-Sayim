<?php 

    $image_url = $name = $ulke = '';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $selected_writer = mysqli_fetch_assoc(get_selected_writer($id));
        $selected_country = mysqli_fetch_assoc(get_selected_country($selected_writer['ülke_id']));

        if (isset($_POST['edit_writer'])) {
            $name = $_POST['yazar_isim'];

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

            $image = $_FILES['resim'];

            $file_name = $image['name'];
            $tmp_name = $image['tmp_name'];
            $myPath ='img/Kitap/'. $file_name;

            if (move_uploaded_file($tmp_name, $myPath)) {
                $image_url = $image['name'];
            } else {
                $iamge_err = 'Resim aktarılırken bir hata oluştu.'. $image['error'];
            };

            if (empty($image_url)) {
                $image_url = $selected_writer['yazar_resim'];  
            };
            

            if (!empty($name) && !empty($ulke) && !empty($image_url)) {
                if (edit_writer($id, $name, $ulke, $image_url)) {
                    $_SESSION['message'] = 'Başarıyla güncellendi';
                    $_SESSION['type'] = 'success';
                    echo '<script>window.location.href = "'. SITE .'index.php?page=yazarlar.php ";</script>';
                } else {
                    echo '<script>Swal.fire("Hata", "Bir hata oluştu", "error"); </script>';
                };
            } else {
                echo '<script>Swal.fire("Hata", "Boş alanlar var", "error"); </script>';
            };
        };
    };

?>

<form action="#" method="POST" enctype="multipart/form-data" class="w-50 mx-auto my-5">
        <div class="mb-3">
            <label for="yazar_isim" class="form-label fw-bold">Yazar İsim Soyisim</label>
            <input type="text" name="yazar_isim" class="form-control <?php echo (!empty($yazar_isim_err)) ? 'is-invalid' : ''; ?>" id="yazar_isim" placeholder="Lütfen eklemek istediğiniz yazarın ismimni giriniz" value="<?=$selected_writer['isim']?>">
            <span class="invalid-feedback"><?php echo $yazar_isim_err ?></span>
        </div>

        <div class="mb-3">
            <label for="ulke" class="form-label ">Ülke</label>
            <input type="text" name="ulke" id="ulke" class="form-control <?php echo (!empty($ulke_err)) ? 'is-invalid' : ''; ?>" placeholder="Türkyie" value="<?=$selected_country['ülke']?>">
            <span class="invalid-feedback"><?php echo $ulke_err ?></span>
        </div>

        <div class="mb-3">
            <label for="resim" class="form-label <?php echo (!empty($yazar_resim_err)) ? 'is-invalid' : ''; ?>">Bir Resim Seciniz</label>
            <input type="file" name="resim" id="resim" class="form-control">
            <span class="invalid-feedback"><?php echo $yazar_resim_err ?></span>
        </div>

        <button type="submit" name="edit_writer" class="btn btn-primary form-control">Ekle</button>
    </form>