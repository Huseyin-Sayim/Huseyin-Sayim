<?php while ($yazar = mysqli_fetch_assoc($yazarlar)): ?>
            <div class="yazar">
                <a href="yazar-detay.php?id=<?php echo $yazar['Id']; ?>">
                    <img src="admin/img/yazar/<?= $yazar['yazar_resim'] ?>">
                </a>
                <h5>
                    <a href="yazar-detay.php?id=<?php echo $yazar['Id']; ?>">
                        <?= $yazar['isim'] ?>
                    </a>  
                </h5>
            </div>
<?php endwhile; ?>