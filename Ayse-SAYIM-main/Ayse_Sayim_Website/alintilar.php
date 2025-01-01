<?php
    include 'libs/functions.php';

    $keyword = '';

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
        if (!empty($_GET['search-book'])) {
            $keyword = $_GET['search-book'];
        };
    };

    $alintilar = filter_alinti_getir($keyword);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/alintilar.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Alıntılar</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>

    <form action="alintilar.php" method="GET" id="search-form">
        <div class="input-group">
            <input type="text" name="search-book" id="search-book" placeholder="Alıntılarını görmek istediğiniz kitap ismini yazniniz" class="form-control">
            <input type="submit" value="Ara" name="search" class="btn btn-secondary">
        </div>
    </form>

    <section id="alintilar" class="container">
        <?php while ($alinti = mysqli_fetch_assoc($alintilar)): ?>
            <div class="card my-5 mx-auto">
                <div class="card-body">
                    <?php echo str_replace('"', "'" , $alinti['alıntı']); ?>
                </div>
                <div class="card-footer">
                    <a href="kitap-details.php?id=<?php echo $alinti['Id'] ?>">
                        <span class="fw-bold">
                            <?php echo $alinti['kitap_adi']?>
                        </span>
                    </a>
                        <span style="font-size: 16px;">
                            
                                <?php
                                    $yazarlar = get_writer();
                                    while ($yazar = mysqli_fetch_assoc($yazarlar)) {
                                        if ($yazar['Id'] == $alinti['yazar_id'] ) {
                                            echo "(<a href='yazar-detay.php?id=". $yazar['Id'] ."'>" . $yazar['isim'] . "</a>)";
                                        };
                                    };
                                ?>
                            
                        </span>
                </div>
            </div>
        <?php endwhile; ?>
        
    </section>

    <?php include 'views/_footer.html'; ?>
    <script src="script/main.js"></script>
</body>
</html>