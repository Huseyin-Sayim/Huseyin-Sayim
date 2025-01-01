<?php
    include 'libs/functions.php';
    $kitaplar = kitaplari_getir();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/kitaplarim.css">
    <title>Kitaplarım</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    
    <section id="filters">
        <form action="filtrelenmiş_kitap.php" id="filters-form" method="POST">
            <div class="select-form d-flex">
            
                <select name="yazar" id="select-yazar" class="form-select mx-2">
                    <option value="" selected disabled>Yazar Secini</option>
                    <?php $yazarlar = get_writer(); while ($yazar = mysqli_fetch_assoc($yazarlar)): ?>
                        <option value="<?php echo $yazar['Id']; ?>">
                            <?php echo $yazar['isim']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            
            
                <select name="kategori" id="select-yazar" class="form-select mx-2">
                    <option value="" selected disabled>Ülke Secini</option>
                    <?php $ulkeler = get_country(); while ($ulke = mysqli_fetch_assoc($ulkeler)): ?>
                        <option value="<?php echo $ulke['Id']; ?>"><?php echo $ulke['ülke']; ?></option>
                    <?php endwhile; ?>
                </select>
            
            
                <input type="text" class="form-control mx-2" name="k_isim" id="k_isim" placeholder="Kelime giriniz">
            
                <button type="submit" name="filter-search" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>

    <section id="book-page">
        <ul id="book-page-list">
            <li>
                <a href="okunan-kitaplar.php" class="page-list active">Okunan Kitaplar (<?php echo okunan_kitap_sayisi(); ?>)</a>
            </li>
            <li>
                <a href="yarim-kitaplar.php" class="page-list ">Yarım Kalan Kitaplar (<?php echo yarim_kitap_sayisi(); ?>)</a>
            </li>
            <li>
                <a href="okuyacaklarim.php" class="page-list ">Okuyacağım Kitaplar (<?php echo okunacak_kitap_sayisi(); ?>)</a>
            </li>
        </ul>
    </section>
    
    <div id="all-books" class="container">
        <?php while ($kitap = mysqli_fetch_assoc($kitaplar)): ?>
            <?php if ($kitap['okudum'] == 1 ): ?>
                <div class="book">
                    <a href="kitap-details.php?id=<?php echo $kitap['Id']; ?>">
                        <img src="img/Kitap/<?php echo $kitap['resim']; ?>" alt="">
                    </a>
                    <h4 class="kitap_adi" style="text-align: center;">
                        <a href="kitap-details.php?id=<?php echo $kitap['Id']; ?>">
                            <?php echo $kitap['kitap_adi'] ?>
                        </a>
                    </h4>
                    <p style="text-align: center;">
                        <?php $yazarlar = get_writer(); while($yazar = mysqli_fetch_assoc($yazarlar)): ?>
                            <?php 
                                if ($kitap['yazar_id'] == $yazar['Id']) {
                                    echo $yazar['isim'];
                                };
                            ?>
                        <?php endwhile; ?>
                    </p>
                    <div class="stars" style="text-align: center; font-size: 20px;">
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>

                <!-- <?php 
                
                    echo '<pre>';
                    print_r($kitap);
                
                ?> -->

            <?php endif; ?>
        <?php endwhile; ?>
        
    </div>

    <?php include 'views/_footer.html'; ?>
    <script src="script/main.js"></script>
</body>
</html>