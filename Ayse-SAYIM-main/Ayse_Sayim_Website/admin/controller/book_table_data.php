<tr>
                      <td>
                          #
                      </td>
                      <td>
                          <a>
                              <?=$category['kategori']; ?>
                          </a>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="<?=SITE.'index.php?page=edit_book_category.php&id='.$category['Id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="<?=SITE.'index.php?page=delete_book_category.php&id='.$category['Id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Sil
                          </a>
                      </td>
                  </tr>