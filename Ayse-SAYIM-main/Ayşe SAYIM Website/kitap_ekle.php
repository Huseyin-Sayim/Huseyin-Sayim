<?php  
    include 'libs/ayar.php';
    include 'libs/functions.php';

    $isim_err = $yazar_err = $inceleme_err = $cat_err = $tarih_err = $puan_err = $resim_err = $durum_err = '';
    $isim = $yazar = $inceleme = $cat = $tarih = $puan = $resim = $durum = '';
    $okudum = $yarim = $okuyacagim = 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (empty($_POST['kitap_isim'])) {
            $isim_err = 'Kitap ismi boş geçilemez.';
        } else {
            $isim = $_POST['kitap_isim'];
        };

        if (empty($_POST['yazar'])) {
            $yazar_err = 'Bir yazar seçmelisiniz.';
        } else {
            $yazar = $_POST['yazar'];
        };

        if (empty($_POST['inceleme'])) {
            $inceleme_err = 'İnceleme boş geçilemez.';
        } else {
            $inceleme = $_POST['inceleme'];
        };

        if (empty($_POST['kategori'])) {
            $cat_err = 'Bir kategori seçmelisiniz.';
        } else {
            $cat = $_POST['kategori'];
        };

        if (empty($_POST['tarih'])) {
            $tarih_err = 'Bir tarih seçmelisinz.';
        } else {
            $tarih = $_POST['tarih'];
        };

        if (empty($_POST['puan'])) {
            $puan_err = 'kitap için bir puan belirlemelisiniz';
        } else if ($_POST['puan'] < 0 or $_POST['puan'] > 5) {
            $puan_err = 'Puanlandırma 0-5 arasında olmalıdır.';
        } else {
            $puan = $_POST['puan'];
        };

        if (empty($_FILES['resim'])) {
            $resim_err = 'Bir resim seçmelisinz.';
        } else {
            $resim = $_FILES['resim'];
        };

        if (empty($_POST['durum'])) {
            $durum_err = 'Bir tanesini seçmelisiniz';
        } else {
            $durum = $_POST['durum'];
        };

        if (empty($isim_err) && empty($yazar_err) && empty($inceleme_err) && empty($cat_err) && empty($tarih_err) && empty($resim_err) && empty($durum_err)) {
            
            //! Resmi 'img' klasörü içersine aktarma
            $file_name = $resim['name'];
            $tmp_name = $resim['tmp_name'];
            $myPath = 'img/Kitap/'. $file_name;

            if (move_uploaded_file($tmp_name, $myPath)) {
                $resim_url = $resim['name'];
            } else {
                $resimAktarma_err = 'Resim aktarılırken bir hata oluştu.'. $resim['error'];
            };

            //! Okunan kitap kısmı 

            if ($durum == 'okudum') {
                $okudum = 1;
            } else if ($durum == 'yarim') {
                $yarim = 1;
            } else if ($durum == 'okuyacagim') {
                $okuyacagim = 1;
            };

            
            //! SQL sorgusu ile tabloya ekleme kısmı

            if (add_book ($isim, $yazar, $inceleme, $cat, $tarih, $puan, $resim_url, $okudum, $yarim, $okuyacagim)) {
                echo '<div id="alert alert-div"> Basarıyla Eklendi </div>';
            } else {
                echo 'Veritabanına eklerken bir hata oluştu';
            };
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
    <title>Kitap Ekle</title>
</head>
<body>

    <?php include 'views/_navbar.html' ?>

    <form action="kitap_ekle.php" method="POST" enctype="multipart/form-data" class="w-75 mx-auto my-5">
        <div class="mb-3">
            <label for="kitap_isim" class="form-label">Kitap İsmi</label>
            <input type="text" name="kitap_isim" class="form-control <?php echo (!empty($isim_err)) ? 'is-invalid' : ''; ?>" id="kitap_isim" placeholder="Lütfen eklemek istediğiniz kitabın ismimni giriniz">
            <span class="invalid-feedback"><?php echo $isim_err ?></span>
        </div>

        <div class="mb-3">
            <label for="yazar" class="form-label">Yazar Seçiniz</label>
            <select class="form-control <?php echo (!empty($yazar_err)) ? 'is-invalid' : ''; ?>" name="yazar" id="yazar">
                <option selected disabled>Yazar Seçiniz</option>
                <?php $yazarlar = get_writer(); while ($writer = mysqli_fetch_assoc($yazarlar)): ?>
                    <option value="<?php echo $writer['Id']; ?>">
                        <?php echo $writer['isim']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <span class="invalid-feedback"><?php echo $yazar_err ?></span>
        </div>

        <div class="mb-3">
            <label for="inceleme " class="form-label">Kitap Hakkında İnceleme</label>
            <textarea class="form-control <?php echo (!empty($inceleme_err)) ? 'is-invalid' : ''; ?>" name="inceleme" id="inceleme"></textarea>
            <span class="invalid-feedback"><?php echo $inceleme_err ?></span>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Seçiniz</label>
            <select class="form-control <?php echo (!empty($cat_err)) ? 'is-invalid' : ''; ?>" name="kategori" id="kategori">
                <option selected disabled>Kategori Seçiniz</option>
                <?php $kategoriler = get_categories(); while ($kategori = mysqli_fetch_assoc($kategoriler)): ?>
                    <option value=" <?php echo $kategori['Id']; ?> ">
                        <?php echo $kategori['kategori']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
            <span class="invalid-feedback"><?php echo $cat_err ?></span>
        </div>

        <div class="mb-3">
            <label for="tarih" class="form-label ">Tarih Seçiniz</label>
            <input type="date" name="tarih" id="tarih" class="form-control <?php echo (!empty($tarih_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $tarih_err ?></span>
        </div>

        <div class="mb-3">
            <label for="puan" class="form-label ">Kitaba Puan Veriniz</label>
            <input type="number" name="puan" id="puan" class="form-control <?php echo (!empty($puan_err)) ? 'is-invalid' : ''; ?>" placeholder="Puanlama '3' şeklide olmalıdır">
            <span class="invalid-feedback"><?php echo $puan_err ?></span>
        </div>

        <div class="mb-3">
            <label for="resim" class="form-label">Bir Resim Seciniz</label>
            <input type="file" name="resim" id="resim" class="form-control <?php echo (!empty($resim_err)) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback d-block"><?php echo $resim_err ?></span>
        </div>

        <div class="mb-3 border p-2">
            <legend>Kitap Durumu</legend>
            <input type="radio" name="durum" id="okudum" value="okudum">
            <label for="okudum" class="me-3">Okudum</label>

            <input type="radio" name="durum" id="yarim" value="yarim">
            <label for="yarim" class="me-3">Yarım</label>

            <input type="radio" name="durum" id="okuyacagim" value="okuyacagim">
            <label for="okuyacagim" class="me-3">Okuyacagğım</label>
            <span class="alert alert-danger mt-2 d-block ">
                <?php echo $durum_err ?>
            </div>
        </div>

        <button type="submit" name="ekle" class="btn btn-success form-control">Ekle</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>
</body>
</html>