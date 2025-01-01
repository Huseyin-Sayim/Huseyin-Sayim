<?php while ($book = mysqli_fetch_assoc($books)): ?>
                  <tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              <?=$book['kitap_adi']; ?>
                          </a>
                      </td>
                      <td class="book_name">
                          <a>
                            <?php 
                              echo $book['isim'];
                            ?>
                          </a>
                      </td>
                      <td>
                          <a>
                            <?=$book['kategori']?>
                          </a>
                      </td>
                      <td class="project_progress">
                          <?=$book['tarih']; ?>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm my-2" href="<?=SITE.'index.php?page=edit_book.php&id='.$book['Id'];?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="<?=SITE.'index.php?page=delete_book.php&id='.$book['Id'];?>">
                              <i class="fas fa-trash">
                              </i>
                              Sil
                          </a>
                      </td>
                  </tr>
                <?php endwhile; ?>