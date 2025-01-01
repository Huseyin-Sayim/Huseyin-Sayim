<?php 
    include 'libs/functions.php';
    
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET ['id'];  
    };

    $sonuc = secilen_yaziyi_getir($id);
    $yazi = mysqli_fetch_assoc($sonuc);

    $kelime_sayisi = strlen($yazi['metin']);
    $kelime_sayisi_yarisi = $kelime_sayisi / 2;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/yazi-detay.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title> <?=$yazi['baslik']; ?> | Blog Yazısı</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>

    <div class="container">
        <div class="yazi">
            <h2><?php echo $yazi['baslik'] ?></h2>
            <img src="img/yazı/a.jpg">
            <div class="img">
                <p class="text">
                    <img class="iki" src="img/yazı/a.jpg">
                    <?php echo substr($yazi['metin'],0,round($kelime_sayisi_yarisi)); ?>
                    
                    <img class="uc" src="img/yazı/a.jpg">
                    <?php echo substr($yazi['metin'],round($kelime_sayisi_yarisi)); ?>
                </p>
                <span id="span-ayse">Ayşe SAYIM</span>
            </div>
        </div>
    </div>

    <script src="script/main.js"></script>
    <?php include 'views/_footer.html' ?>
</body>
</html>