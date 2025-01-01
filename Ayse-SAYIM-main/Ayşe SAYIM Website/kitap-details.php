<?php 
    include 'libs/functions.php';
    
    if (isset($_GET['id']) &&  is_numeric($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        header('Location: main.php');
    };

    $sonuc = get_book_by_Id($id);
    $kitap = mysqli_fetch_assoc($sonuc);
    if (!$kitap) {
        header('Location: main.php');
    };
    
    $inceleme = str_replace('"', "'", $kitap['inceleme']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/kitap-detay.css">
    <title><?php echo $kitap['kitap_adi']; ?> | Kitap İncelemesi</title>
</head>
<body>

    <?php include 'views/_navbar.html'; ?>
    
    <div class="container" id="kitap-detay">
        <div class="image">
            <img src="img/Kitap/<?php echo $kitap['resim']; ?>">
            <h4 id="kitap_adi"><?php echo $kitap['kitap_adi']; ?></h4>
            <p style="text-align: center; font-size: 14px;">
                (<?php echo $kitap['kategori'] ?>)
            </p>
            <p id="yazar"><a href=""><?php echo $kitap['isim']; ?></a></p>
            <div class="stars" style="text-align: center; font-size: 20px;">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
        </div>
        <div class="inceleme">
            <div class="info">
                <h3>
                    <?php echo $kitap['kitap_adi']; ?>
                </h3>
            </div>
            <p style="font-size: 18px;">
                <?php echo $inceleme; ?>
            </p>
            <span>Ayşe SAYIM</span>
        </div>

    </div>

    <div id="yazar-hakkinda">
        <div class="list">
            <h3>Yazarın Sayfamdaki Diğer Kitapları</h3>
            <ul class="book-list">
                <?php $yazar_kitaplari = id_kitap_getir($kitap['yazar_id']); ?>
                <?php if (mysqli_num_rows($yazar_kitaplari) > 1 ): ?>
                    <?php  while($y_kitap = mysqli_fetch_assoc($yazar_kitaplari)):?>
                        <?php if ($y_kitap['yazar_id'] == $kitap['yazar_id'] && $y_kitap['Id'] != $kitap['Id']): ?>
                            <li>
                                <a href="kitap-details.php?id=<?php echo $y_kitap['Id']; ?>">
                                    <img src="img/Kitap/<?php echo $y_kitap['resim']; ?>">
                                    <h4>
                                        <?= $y_kitap['kitap_adi']; ?>
                                    </h4>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
            <?php else: ?>
                <div class="alert-yazar">
                    Yazarın sayfamda başka kitabı bulunmamaktadır.
                </div>    
            <?php endif; ?>    
            </ul>
        </div>
        <div class="img">
            <img src="img/yazar/<?php echo $kitap['yazar_resim']; ?>" >
            <h3><?php echo $kitap['isim']; ?></h3>
        </div>
    </div>
    
   



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>
    <?php include 'views/_footer.html'; ?>
</body>
</html>