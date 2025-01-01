<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/yazarlar.css">
    <title>Yazarlar</title>
</head>
<body>
    <?php include 'views/_navbar.html'; ?>
    <?php include 'libs/functions.php'; ?>

    <h2 id="yazarlar-baslik">Sayfamdaki Yazarlar</h2>

    <div class="input-group w-75 mx-auto">
        <input type="text" id="search_writer" class="form-control" placeholder="Aramak istediğiniz yazarı giriniz">
        <button type="button" class="btn btn-success" id="search_btn">Ara</button>
    </div>
    
    <section id="yazarlar">
        <?php $yazarlar = get_writer()?>
        <?php include 'writer_ajax/writer_data.php'?>
    </section>

    <?php include 'views/_footer.html'; ?>
    <script src="script/main.js"></script>
    <script src="script/writer_ajax.js"></script>

</body>
</html>