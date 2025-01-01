<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/yazilarim.css">
    <title>Yazılarım</title>
</head>
<body>

    <?php include 'views/_navbar.html'; ?>
    <?php include 'libs/functions.php'; ?>

    <div class="container" id="yazilarim">
        <?php $yazilar = yazi_getir(); while($yazi = mysqli_fetch_assoc($yazilar)): ?>
            <div class="card">
                <div class="card-header">
                    <h5>
                        <?php echo $yazi['baslik'] .'<small class="fw-bold fs-6 fst-italic ms-2 text-secondary">'. ' (' . $yazi['kategori'] . ')'. '</small>'  ;   ?>
                    </h5>
                </div>
                <div class="card-body">
                    
                    <p>
                        <?php if (strlen($yazi['metin']) > 300): ?>
                            <?php echo substr($yazi['metin'],0,300) ?> ... <a href="yazi-detay.php?id=<?php echo $yazi['Id'] ?>">devamı</a>
                        <?php endif; ?>
                    </p>
                    <span style="font-size: 13px;" class="fw-bold fst-italic float-end my-2"><?php echo $yazi['yazı_tarih']; ?></span>
                </div>
            </div>
        <?php endwhile; ?>
    </div>




    <?php include 'views/_footer.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>
</body>
</html>