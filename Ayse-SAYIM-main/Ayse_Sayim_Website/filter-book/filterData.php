<?php while ($kitap = mysqli_fetch_assoc($kitaplar)): ?>
                <div class="book">
                    <a href="kitap-details.php?id=<?php echo $kitap['Id']; ?>">
                        <img src="admin/img/Kitap/<?php echo $kitap['resim']; ?>" alt="">
                    </a>
                    <h4 class="kitap_adi" style="text-align: center;">
                        <a href="kitap-details.php?id=<?php echo $kitap['Id']; ?>">
                            <?php echo $kitap['kitap_adi'] ?>
                        </a>
                    </h4>
                    <p style="text-align: center;">
                        <?php $yazarlar = get_writer(); while($yazar = mysqli_fetch_assoc($yazarlar)): ?>
                            <?php 
                                if ($kitap['yazar_id'] == $yazar['Id']) {
                                    echo $yazar['isim'];
                                };
                            ?>
                        <?php endwhile; ?>
                    </p>
                    <?php 
                        if ($kitap['okudum'] == 1) {
                            echo '<span class="okudum badge p-2 fs-5">Okudum</span>';
                        };

                        if ($kitap['yarım'] == 1) {
                            echo '<span class="yarim badge bg-warning p-2 fs-5">Yarım Bıraktım</span>';
                        };

                        if ($kitap['okuyacagım'] == 1) {
                            echo '<span class="okuyacagim badge p-2 fs-5">Okuyacağım</span>';
                        };
                    ?>
                    <div class="stars" style="text-align: center; font-size: 20px;">
                        <?php $x = 0 ; for ($i=0; $i < round($kitap['puan']); $i++):?>
                            <?php
                                if ($x < ((int)($kitap['puan'] / 2 ))) {
                                    echo '<i class="yildiz fa-solid fa-star"></i>';
                                } else if ($x == round($kitap['puan'] / 2 ) && $kitap['puan'] % 2 == 1 ) {
                                    echo '<i class="yildiz fa-solid fa-star-half-stroke"></i>';
                                };
                                $x++;
                            ?>
                        <?php endfor; ?>
                        <?php
                            for ($a = 0; $a < (5 - round($kitap['puan'] / 2 )); $a++) {
                                echo '<i class="yildiz fa-regular fa-star"></i>';
                            };
                        ?>
                    </div>
                </div>
        <?php endwhile; ?>