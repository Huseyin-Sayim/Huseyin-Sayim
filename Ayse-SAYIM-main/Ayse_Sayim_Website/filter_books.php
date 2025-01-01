<?php
    include 'libs/functions.php';
    $k_isim = '';
    $country = '';
    $yazar_id = '';

    if (isset($_POST['filter-search']) && $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if (isset($_POST['yazar']) && is_numeric($_POST['yazar'])) {
            $yazar_id = $_POST['yazar'];
        };

        if (isset($_POST['kategori']) && is_numeric($_POST['kategori'])) {
            $country = $_POST['kategori'];
        };

        if (isset($_POST['k_isim'])) {
            $k_isim = $_POST['k_isim'];
        };
    };

    $country_writer = get_writer_by_country($country);

    $selected_category = get_country_by_Id($country);
    $category_name = mysqli_fetch_assoc($selected_category);

    $kitaplar = get_book_filter($k_isim, $yazar_id, $country);
    
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Kitaplarım</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    
    <section id="filters">
        <form action="filter_books.php" id="filters-form" method="POST">
            <div class="select-form d-flex">
            
                <select name="yazar" id="select-yazar" class="form-select m-2">
                    <option value="" selected disabled>Yazar Secini</option>
                    <?php $yazarlar = get_writer(); while ($yazar = mysqli_fetch_assoc($yazarlar)): ?>
                        <option value="<?php echo $yazar['Id']; ?>">
                            <?php echo $yazar['isim']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            
            
                <select name="kategori" id="select-yazar" class="form-select m-2">
                    <option value="" selected disabled>Ülke Secini</option>
                    <?php $ulkeler = get_country(); while ($ulke = mysqli_fetch_assoc($ulkeler)): ?>
                        <option value="<?php echo $ulke['Id']; ?>"><?php echo $ulke['ülke']; ?></option>
                    <?php endwhile; ?>
                </select>
            
            
                <input type="text" class="form-control m-2" name="k_isim" id="k_isim" placeholder="Kelime giriniz">
            
                <button type="submit" name="filter-search" class="btn btn-primary form-control m-2">Submit</button>
            </div>
        </form>
    </section>
    
    <?php if (isset($_POST['kategori']) && mysqli_num_rows($country_writer) > 0): ?>
        <section id="country-writers">
            <h2>
                <?=$category_name['ülke']?>
            </h2>
            <ul id="country">
                <?php while ($wrt = mysqli_fetch_assoc($country_writer)): ?>
                    <li>
                        <button class="btn btn-outline-info c_writers" value="<?=$wrt['Id']?>">
                            <?=$wrt['isim']?>
                        </button>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>
    <div id="all-books" class="container">
        <?php include 'filter-book/filterData.php'?>
    </div>

    <?php include 'views/_footer.html'; ?>
    <script src="script/main.js"></script>
    <script src="script/country.js"></script>
</body>
</html>