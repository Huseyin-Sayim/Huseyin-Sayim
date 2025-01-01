<?php 
    include 'libs/functions.php';
    
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: main.php');
    };

    $sonuc = get_writer_by_id($id);
    $yazar = mysqli_fetch_assoc($sonuc);
    if (!$yazar) {
       header('Location: main.php'); 
    };

    $kitaplar = get_book_by_yazar_id($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/yazar-detay.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Yazar Kitapları</title>
    
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    <div id="yazar">
        <div class="yazar">
            <img src="admin/img/yazar/<?php echo $yazar['yazar_resim'] ?>">
            <h5 class="fs-5 mt-3"><?php echo $yazar['isim'] ?></h5>
            <span> (<?php echo $yazar['ülke'] ?>) </span>
        </div>
        <div class="kitaplar">
            <div class="header">
                <h4><?php echo $yazar['isim'] ?>'in sayfamdaki kitapları</h4>
            </div>
            <div class="book-list">
                <ul>
                    <?php while ($kitap = mysqli_fetch_assoc($kitaplar)): ?>
                        <li>
                            <div class="book">
                                <a href="kitap-details.php?id=<?php echo $kitap['Id'] ?>">
                                    <img class="mb-2" src="admin/img/Kitap/<?php echo $kitap['resim'] ?>">
                                </a>
                                <h5 class="kitap_adi" style="text-align: center;">
                                    <?php echo $kitap['kitap_adi']; ?>
                                </h5>
                                <?php 
                                    if ($kitap['okudum'] == 1) {
                                        echo '<span class="okudum badge p-2 fs-5">Okudum</span>';
                                    };

                                    if ($kitap['yarım'] == 1) {
                                        echo '<span class="yarim badge bg-warning p-2 fs-5">Yarım Bıraktım</span>';
                                    };

                                    if ($kitap['okuyacagım'] == 1) {
                                        echo '<span class="okuyacagim badge p-2 fs-5">Okuyacağım</span>';
                                    };
                                ?>
                                <div class="stars" style="text-align: center; font-size: 20px;">
                                    <?php $x = 0 ; for ($i=0; $i < round($kitap['puan']); $i++):?>
                            <?php
                                if ($x < ((int)($kitap['puan'] / 2 ))) {
                                    echo '<i class="yildiz fa-solid fa-star"></i>';
                                } else if ($x == round($kitap['puan'] / 2 ) && $kitap['puan'] % 2 == 1 ) {
                                    echo '<i class="yildiz fa-solid fa-star-half-stroke"></i>';
                                };
                                $x++;
                            ?>
                        <?php endfor; ?>
                        <?php
                            for ($a = 0; $a < (5 - round($kitap['puan'] / 2 )); $a++) {
                                echo '<i class="yildiz fa-regular fa-star"></i>';
                            };
                        ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            
        </div>
    </div>

    <?php include 'views/_footer.html' ?>

    <script src="script/main.js"></script>
</body>
</html>