<?php 
    define('IMG','admin/img/');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Ayşe SAYIM</title>
    <meta name="description" content="Bu site okuma takibi yapmak, kitap incelemesi yayınlamak maksadı ile kurulmuştur. Bunun yanısıra sayfada edebiyat, kültür, sanat, bilim, teknik gibi bir çok alana dair düşünce yazıları da yer almaktadır.">
    <meta name="author" content="AYSE SAYIM">
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    <?php 
        include 'libs/functions.php'; 
        $text = mysqli_fetch_assoc(get_hello_text());
    ?>

    <section id="jumbotron">
        <div>
            <h1 class="jumbotron-heading">
                Merhaba!
            </h1>
            <p class="jumbotron-text">
                <?php echo $text['hello']; ?>
            </p>
        </div>
        <div class="profile">
            <img src="<?=IMG?>aysesayimmain.jpg" alt="">
            <h4 style="text-align: center;">Ayşe SAYIM</h4>
            <div class="okunan-kitap">
                
            </div>
        </div>
    </section>

    <section id="last-book">
        <?php $son_kitap = mysqli_fetch_assoc(get_last_book()); ?>
        <div class="book">
            <h3 class="book-head">Son Okuduğum Kitap</h3>
            <h5 style="text-align: center; margin-bottom: 5px;"> <?= $son_kitap['tarih']; ?> </h5>
            <a href="kitap-details.php?id=<?php echo $son_kitap['Id']; ?>">
                <img src="<?=IMG?>/Kitap/<?php echo $son_kitap['resim'] ?>" alt="">
            </a>
            <div class="stars" style="text-align: center; font-size: 20px;">
                <?php $x = 0 ; for ($i=0; $i < round($son_kitap['puan']); $i++):?>
                    <?php
                        if ($x < ((int)($son_kitap['puan'] / 2 ))) {
                            echo '<i class="yildiz fa-solid fa-star"></i>';
                        } else if ($x == round($son_kitap['puan'] / 2 ) && $son_kitap['puan'] % 2 == 1 ) {
                            echo '<i class="yildiz fa-solid fa-star-half-stroke"></i>';
                        };
                        $x++;
                    ?>
                <?php endfor; ?>
                <?php
                    for ($a = 0; $a < (5 - round($son_kitap['puan'] / 2 )); $a++) {
                        echo '<i class="yildiz fa-regular fa-star"></i>';
                    };
                ?>
            </div>
            <h4 class="last-book-name" style="text-align: center;">
                <a href="kitap-details.php?id=<?php echo $son_kitap['Id']; ?>">
                    <?php echo $son_kitap['kitap_adi']; ?>
                </a>
            </h4>
            <h4 class="last-book-writer" style="text-align: center;">
                <?php 
                    $yazarlar = get_writer();
                    while ($yazar = mysqli_fetch_assoc($yazarlar)) {
                        if ($yazar['Id'] == $son_kitap['yazar_id'] ) {
                            echo '<a href="yazar-detay.php?id='. $yazar['Id'] .'">'.$yazar['isim'].'</a>';
                        };
                    };
                ?>
            </h4>
        </div>
        <div class="kitap-hakkinda">
            <div class="inceleme">
                <h3>Kitap Hakkında İnceleme</h3>
                <p>
                    <?php echo substr($son_kitap['inceleme'], 0, 501) .'...'; ?> <a href="kitap-details.php?id=<?php echo $son_kitap['Id']; ?>">devamı</a>
                </p>
            </div>
            <div class="kayy">
                <div class="kitaplar">
                    <h3 style="display: flex; align-items: center;"> Kitaplar <i style="margin-left: 5px; font-size: 25px;" class="fa-solid fa-book-open"></i></h3>
                    <p>
                        Okuduğum kitapları ve kitap incelemelerini <a href="okunan-kitaplar.php">buradan</a> görebilirsiniz.
                    </p>
                </div>
                <div class="alintilar">
                    <h3 class="alinti-head">Alıntılar <sup><i class="fa-solid fa-quote-left"></i></sup></h3>
                    <p class="alinti-text">
                        Sevdiğim kitap alıntılarnı <a href="alintilar.php">buradan</a> görebilirsiniz.
                    </p>
                </div>
                <div class="yazarlar">
                    <h3>Yazarlar <i style="font-size: 22px;" class="fa-solid fa-feather"></i></h3>
                    <p>
                        Okuduğum yazarkarı <a href="yazarlar.php">buradan</a> görebilirsiniz.
                    </p>
                </div>
                <div class="yazilarim">
                    <h3>Yazılarım <i style="font-size: 22px;" class="fa-solid fa-pen-nib"></i> </h3>
                    <p>
                        Edebiyat,kültür,sanat,seyehat,bilim ve yaşam üzerine yazdığım bütün yazıları <a href="yazilarim.php">buradan</a> okuyabilirsiniz.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="hakkimda">
            <h2 class="hakkimda-head"> <i class="fa-solid fa-circle-info"></i> Hakkımda</h2>
            <p class="hakkimda-text">
                <?php echo $text['about_me']; ?>
            </p>
    </section>

    <?php include 'views/_footer.html'; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="script/main.js"></script>
</body>
</html>