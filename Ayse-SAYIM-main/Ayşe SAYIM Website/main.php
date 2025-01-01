<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Ayşe SAYIM</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    <?php include 'libs/functions.php'; ?>
    <section id="jumbotron">
        <div>
            <h1 class="jumbotron-heading">
                Merhaba!
            </h1>
            <p class="jumbotron-text">
                Ben Ayşe. Ben bir akademisyenim, biraz gezgin, birazcık yazar, birazcık da çizer. Ve en önemlisi bir kitap kurdu. 2020 yılından bu yana okuduğum kitapların takibini yapıyorum ve son iki yıldır da düzenli kitap incelemesi yazıyorum. Bu siteyi hayata geçirmekteki amacım kitaplarımla kurduğum dünyayı dijital ortama taşımak ve arkamda bir dijital miras bırakmak. Sayfamda; okuduğum, okumayı planladığım ve yarım bıraktığım, kısacası evrenime girmiş tüm kitapları, yazdığım kitap incelemelerini ve sevdiğim alıntıları bulabilirsiniz. Bunun yanısıra okurluk serüvenimden bağımsız edebiyat, kültür, sanat, bilim, teknik, tarih gibi bir çok alanda yazdığım ve yazacağım blog yazılarımı aynı şekilde sayfamda bulabilirsiniz. Kitap okurken, bilhassa edebiyat romanlarında, çocukluk, annelik, kadının toplumdaki konumu, cinsiyet rolleri, kölelik, sömürgecilik, din gibi bir çok toplumsal olguya mercek tutuyor ve ülkelere ve zaman dilimine göre karşılaştırmalar yaparak incelemelerimi kaleme alıyorum.

            </p>
        </div>
        <div class="profile">
            <img src="img/ayşesayımpp.jpg" alt="">
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
                <img src="img/Kitap/<?php echo $son_kitap['resim'] ?>" alt="">
            </a>
            <div class="stars" style="text-align: center; font-size: 20px;">
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
                <i class="fa-regular fa-star"></i>
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
                            echo '<a href="">'.$yazar['isim'].'</a>';
                        };
                    };
                ?>
            </h4>
        </div>
        <div class="kitap-hakkinda">
            <div class="inceleme">
                <h3>Kitap Hakkında İnceleme</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio aspernatur odio veniam, culpa ex expedita voluptatem eaque nesciunt sit sint deleniti explicabo ipsam itaque deserunt placeat repellat! Porro, incidunt quasi.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, rerum?
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
                2014 yılında Ankara Üniversitesi Hukuk Fakültesinden mezun oldum. Rheinische Friedrich Wilhelms (Bonn) Üniversitesinde 2019 yılında master öğrenimimi tamamladım. 2021 yılında Almanya Martin Luther Üniversitesi’nde başladığım doktora öğrenimime devam etmekte ve yapay zeka ve dijitalleşme alanında akademik çalışmalarımı sürdürmekteyim.
            </p>
    </section>

    <?php include 'views/_footer.html'; ?>

    <script src="script/main.js"></script>
</body>
</html>