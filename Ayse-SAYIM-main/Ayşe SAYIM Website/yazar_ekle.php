<?php  
    include 'libs/ayar.php';
    include 'libs/functions.php';

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
                echo 'Basariyla eklendi.';
            } else {
                echo 'Beklenmedik bir hata oluştu';
            };

            //! ÜLKELERİ EKLİYOR YAZAR EKLEMİYOR

        };

    };

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/navbar.css">
    <title>Yazar Ekle</title>
</head>
<body>

    <?php include 'views/_navbar.html' ?>

    <form action="yazar_ekle.php" method="POST" enctype="multipart/form-data" class="w-75 mx-auto my-5">
        <div class="mb-3">
            <label for="yazar_isim" class="form-label fw-bold">Yazar İsim Soyisim</label>
            <input type="text" name="yazar_isim" class="form-control <?php echo (!empty($yazar_isim_err)) ? 'is-invalid' : ''; ?>" id="yazar_isim" placeholder="Lütfen eklemek istediğiniz yazarın ismimni giriniz">
            <span class="invalid-feedback"><?php echo $yazar_isim_err ?></span>
        </div>

        <div class="mb-3">
            <label for="ulke" class="form-label ">Ülke</label>
            <input type="text" name="ulke" id="ulke" class="form-control <?php echo (!empty($ulke_err)) ? 'is-invalid' : ''; ?>" placeholder="Türkyie">
            <span class="invalid-feedback"><?php echo $ulke_err ?></span>
        </div>

        <div class="mb-3">
            <label for="resim" class="form-label <?php echo (!empty($yazar_resim_err)) ? 'is-invalid' : ''; ?>">Bir Resim Seciniz</label>
            <input type="file" name="resim" id="resim" class="form-control">
            <span class="invalid-feedback"><?php echo $yazar_resim_err ?></span>
        </div>

        <button type="submit" name="ekle" class="btn btn-success form-control">Ekle</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>
</body>
</html>