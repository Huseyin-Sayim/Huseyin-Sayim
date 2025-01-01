<?php include 'include/add_quotation.php'; ?>    
    <form action="#" method="POST" class="w-50 mx-auto my-5">
        <label for="alinti">Alıntı Giriniz</label>
        <textarea name="alinti" id="alinti" class="form-control mb-3 mt-1" placeholder="Yaptığınız alıntıyı giriniz" ></textarea>
        <label for="kitap_adi">Kitap Seciniz</label>
        <select name="kitap_adi" class="form-control mb-3 mt-1" id="kitap_adi">
            <option value="" selected disabled > Alıntı Yaptığınız Kitabı seciniz</option>
            <?php $kitaplar = get_books(); while ($kitap = mysqli_fetch_assoc($kitaplar)): ?>
                <option value="<?php echo $kitap['Id']; ?>">
                    <?php echo $kitap['kitap_adi']; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <input type="submit" name="ekle" value="Ekle" class="btn btn-secondary form-control text-uppercase fw-bold">
    </form>