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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title> <?=$yazi['baslik']; ?> | Blog Yazısı</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>

    <div class="container">
        <div class="yazi">
            <h2><?php echo $yazi['baslik'] ?></h2>
            <?php if (!empty($yazi['resim_1'])): ?>
                <img src="admin/img/yazı/<?php echo $yazi['resim_1']; ?>">
            <?php endif; ?>
            <div class="img">
                <p class="text">
                    <?php if (!empty($yazi['resim_2'])): ?>
                        <img class="iki" src="admin/img/yazı/<?php echo $yazi['resim_2']; ?>">
                    <?php endif; ?>
                    <?php echo substr($yazi['metin'],0,round($kelime_sayisi_yarisi)); ?>
                    
                    <?php if (!empty($yazi['resim_3'])): ?>
                        <img class="uc" src="admin/img/yazı/<?php echo $yazi['resim_3']; ?>">
                    <?php endif; ?>
                    <?php echo substr($yazi['metin'],round($kelime_sayisi_yarisi)); ?>
                </p>
            </div>
            <p id="span-ayse">Ayşe SAYIM</p>
        </div>
    </div>

    <script src="script/main.js"></script>
    <?php include 'views/_footer.html' ?>
</body>
</html>