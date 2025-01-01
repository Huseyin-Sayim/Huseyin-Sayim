    <?php include 'include/add_book.php' ?>
        <div class="card card-primary col-md-8 mx-auto my-5">
              <div class="card-header">
                <h3 class="card-title">Kitap Ekle</h3>
              </div>
            <form role="form" action="#" method="POST" id="addBookForm" enctype="multipart/form-data" class="ml-5 pl-5">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kitap_isim">Kitap Adı</label>
                    <input type="text" class="form-control" id="kitap_isim" name="kitap_isim" placeholder="Enter book name">
                  </div>
                  <div class="form-group">
                    <label for="yazar"></label>
                    <select name="yazar" id="yazar" class="form-control">
                        <option value="" selected disabled>Yazar Seciniz</option>
                            <?php $yazarlar = get_writer(); while ($writer = mysqli_fetch_assoc($yazarlar)): ?>
                                <option value="<?php echo $writer['Id']; ?>">
                                    <?php echo $writer['isim']; ?>
                                </option>
                        <?php endwhile; ?>
                    </select>
                  </div>
                
                  <div class="form-group">
                    <label for="inceleme">İnceleme</label>
                    <textarea name="inceleme" id="inceleme" class="form-control" placeholder="Enter text"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="kategori"></label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" selected disabled >Kategori Seciniz</option>
                        <?php $kategoriler = get_category(); while ($kategori = mysqli_fetch_assoc($kategoriler)): ?>
                        <option value=" <?php echo $kategori['Id']; ?> ">
                            <?php echo $kategori['kategori']; ?>
                        </option>
                    <?php endwhile; ?>
            </select>
                        
                  </div>

                  <div class="form-group">
                    <label for="tarih">Tarih</label>
                    <input type="date" class="form-control" id="tarih" name="tarih">
                  </div>

                  <div class="form-group">
                    <label for="tarih">Puan</label>
                    <input type="number" class="form-control" id="puan" name="puan"
                    placeholder="Kitaba puan veriniz">
                  </div>

                  <div class="form-group">
                    <label for="resim">Resim Seciniz</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="resim" name="resim">
                        <label class="custom-file-label" for="resim">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 border p-2">
                    <legend>Kitap Durumu</legend>
                    <input type="radio" name="durum" id="okudum" value="okudum">
                    <label for="okudum" class="me-3">Okudum</label>

                    <input type="radio" name="durum" id="yarim" value="yarim">
                    <label for="yarim" class="me-3">Yarım</label>

                    <input type="radio" name="durum" id="okuyacagim" value="okuyacagim">
                    <label for="okuyacagim" class="me-3">Okuyacagğım</label>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="add_book">Submit</button>
                </div>
            </form>
        </div>