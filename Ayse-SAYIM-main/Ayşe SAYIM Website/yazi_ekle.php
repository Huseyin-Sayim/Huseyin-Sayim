<?php 

    include 'libs/ayar.php';

    $yazi = $cat = $resim_1 = $resim_2 = $resim_3 = $hata = $success = $warning = $resim_1_url = $resim_2_url = $resim_3_url = $resim_err = $baslik = $tarih = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['yazi']) && !empty($_POST['cat']) && !empty($_POST['baslik']) && !empty($_POST['tarih'])) {
            $yazi = $_POST['yazi'];
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

            $ekle = "INSERT INTO `yazılarım`(`baslik`, `metin`, `etiket_Id`, `resim_1`, `resim_2`, `resim_3`, `yazı_tarih`) VALUES ('$baslik', '$yazi', '$cat', '$resim_1_url', '$resim_2_url', '$resim_3_url', '$tarih')";

            if (mysqli_query($connection, $ekle)) {
                $success = 'Basarıyla eklendi';
            } else {
                $warning = 'Veritabanına eklerken bir hata oluştu.';
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
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kitap Ekle</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    <?php include 'libs/functions.php'; ?>

    <?php 
    
        if (!empty($success)) {
            echo '<div class="alert alert-success mt-3 w-50 mx-auto">'. $success .'</div>';
        };

        if (!empty($warning)) {
            echo '<div class="alert alert-warning mt-3 w-50 mx-auto">'. $warning .'</div>';
        };
    ?>

    <?php 
        if (!empty($resim_err)) {
            echo '<div class="alert alert-danger mt-3 w-50 mx-auto">'. $resim_err .'</div>';
        };
    ?>

    <div class="container">
        <form action="yazi_ekle.php" method="POST" class="w-75 mx-auto my-5" enctype="multipart/form-data">
            <label for="baslik">Yazı Başlığınızı Giriniz</label>
            <input type="text" name="baslik" id="baslik" class="form-control mb-3 mt-1" placeholder="Baslik giriniz">
            <label for="yazi">Yazınızı Giriniz</label>
            <textarea name="yazi" id="yazi" class="form-control mb-3 mt-1" placeholder="Yazı metninizi giriniz" ></textarea>
            <label for="cat">Yazı Kategorisini Seciniz</label>
            <select name="cat" class="form-select mb-3 mt-1" id="cat">
                <option value="" selected disabled > Yazdığınız yazının kategorisini seçiniz</option>
                <?php $kategoriler = yazi_kategori(); while ($kategori = mysqli_fetch_assoc($kategoriler)): ?>
                    <option value="<?php echo $kategori['Id']; ?>">
                        <?php echo $kategori['kategori']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="tarih">Tarig Giriniz</label>
            <input type="date" name="tarih" id="tarih" class="form-control mb-3 mt-1" placeholder="Baslik giriniz">

            <div class="resimler border p-3 mb-3">
                <h5>Resimleri Sırayla Seçiniz</h5>
                <input type="file" name="resim_1" id="resim_1" class="form-control my-3">
                <input type="file" name="resim_2" id="resim_2" class="form-control my-3">
                <input type="file" name="resim_3" id="resim_3" class="form-control my-3">
                <div class="alert alert-danger fs-5 p-2 my-3">Resim seçmek zorunlu değildir !!!!</div>
            </div>

            <?php
                if (!empty($hata)) {
                    echo '<div class="alert alert-danger">'. $hata .'</div>';
                };
            ?>
            

            <input type="submit" name="ekle" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
        </form>

        
    </div>

    <script src="script/main.js"></script>
</body>
</html>