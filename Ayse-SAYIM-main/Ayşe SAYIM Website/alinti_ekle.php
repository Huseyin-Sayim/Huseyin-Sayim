<?php
    $allinti_err = $kitap_err = '';
    $allinti = $kitap = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ekle'])) {
        if (empty($_POST['kitap_adi'])) {
            $kitap_err = 'Kitap seçmelisiniz';
        } else {
            $kitap = $_POST['kitap_adi'];
        };

        if (empty($_POST['alinti'])) {
            $allinti_err = 'Alıntı alanı boş gecilemez';
        } else {
            $allinti = $_POST['alinti'];
        };

        if (empty($inceleme_err) && empty($kitap_err)) {
            include 'libs/ayar.php';
            $query = "INSERT INTO alıntılar(alıntı, kitap_id) VALUES ('$allinti', $kitap) ";
            if (mysqli_query($connection, $query)) {
                echo '<div class="alert alert-success">Başarıyla eklendi</div>';
            } else {
                echo '<div class="alert alert-warning">Ekleme sırasında beklenmedik bir hata oluştu</div>';
            }
            mysqli_close($connection);
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
    <title>Alıntı Ekle</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    <?php include 'libs/functions.php'; ?>
    
    <form action="alinti_ekle.php" method="POST" class="w-75 mx-auto my-5">
        <label for="alinti">Alıntı Giriniz</label>
        <textarea name="alinti" id="alinti" class="form-control mb-3 mt-1" placeholder="Yaptığınız alıntıyı giriniz" ></textarea>
        <label for="kitap_adi">Kitap Seciniz</label>
        <select name="kitap_adi" class="form-select mb-3 mt-1" id="kitap_adi">
            <option value="" selected disabled > Alıntı Yaptığınız Kitabı seciniz</option>
            <?php $kitaplar = kitaplari_getir(); while ($kitap = mysqli_fetch_assoc($kitaplar)): ?>
                <option value="<?php echo $kitap['Id']; ?>">
                    <?php echo $kitap['kitap_adi']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" name="ekle" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
    </form>

    <script src="script/main.js"></script>
</body>
</html>