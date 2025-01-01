    <?php include 'include/add_writer.php'; ?>
    <form action="#" method="POST" enctype="multipart/form-data" class="w-50 mx-auto my-5">
        <div class="mb-3">
            <label for="yazar_isim" class="form-label fw-bold">Yazar İsim Soyisim</label>
            <input type="text" name="yazar_isim" class="form-control <?php echo (!empty($yazar_isim_err)) ? 'is-invalid' : ''; ?>" id="yazar_isim" placeholder="Lütfen eklemek istediğiniz yazarın ismimni giriniz">
            <span class="invalid-feedback"><?php echo $yazar_isim_err ?></span>
        </div>

        <div class="mb-3">
            <label for="ulke" class="form-label ">Ülke</label>
            <input type="text" name="ulke" id="ulke" class="form-control <?php echo (!empty($ulke_err)) ? 'is-invalid' : ''; ?>" placeholder="Türkyie">
            <span class="invalid-feedback"><?php echo $ulke_err ?></span>
        </div>

        <div class="mb-3">
            <label for="resim" class="form-label <?php echo (!empty($yazar_resim_err)) ? 'is-invalid' : ''; ?>">Bir Resim Seciniz</label>
            <input type="file" name="resim" id="resim" class="form-control">
            <span class="invalid-feedback"><?php echo $yazar_resim_err ?></span>
        </div>

        <button type="submit" name="ekle" class="btn btn-primary form-control">Ekle</button>
    </form>