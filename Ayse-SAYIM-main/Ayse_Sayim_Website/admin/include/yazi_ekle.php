<?php include 'include/add_blog_post.php'; ?>
    <div class="container">
        <form action="#" method="POST" class="w-75 mx-auto my-5" enctype="multipart/form-data">
            <label for="baslik">Yazı Başlığınızı Giriniz</label>
            <input type="text" name="baslik" id="baslik" class="form-control mb-3 mt-1" placeholder="Baslik giriniz">
            <label for="yazi">Yazınızı Giriniz</label>
            <textarea name="yazi" id="yazi" class="form-control mb-3 mt-1" placeholder="Yazı metninizi giriniz" ></textarea>
            <label for="cat">Yazı Kategorisini Seciniz</label>
            <select name="cat" class="form-control mb-3 mt-1" id="cat">
                <option value="" selected disabled > Yazdığınız yazının kategorisini seçiniz</option>
                <?php $kategoriler = get_post_category(); while ($kategori = mysqli_fetch_assoc($kategoriler)): ?>
                    <option value="<?php echo $kategori['Id']; ?>">
                        <?php echo $kategori['kategori']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="tarih">Tarih Giriniz</label>
            <input type="date" name="tarih" id="tarih" class="form-control mb-3 mt-1" placeholder="Baslik giriniz">

            <div class="resimler border p-3 mb-3">
                <h5>Resimleri Sırayla Seçiniz</h5>
                <input type="file" name="resim_1" id="resim_1" class="form-control my-3">
                <input type="file" name="resim_2" id="resim_2" class="form-control my-3">
                <input type="file" name="resim_3" id="resim_3" class="form-control my-3">
                <div class="alert alert-danger fs-5 p-2 my-3">Resim seçmek zorunlu değildir !!!!</div>
            </div>

            <?php
                if (!empty($hata)) {
                    echo '<div class="alert alert-danger">'. $hata .'</div>';
                };
            ?>
            

            <input type="submit" name="ekle" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
        </form>
    </div>