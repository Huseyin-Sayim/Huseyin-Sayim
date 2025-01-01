<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yazı Kategorileri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title" >Yazı Kategorileri</h3>
          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button> -->
              <button class="btn btn-primary addPostCat">Kategori Ekle</button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects-table" id="postCattable">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Kategori
                      </th>                      
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php $categories = get_post_category(); while ($category = mysqli_fetch_assoc($categories)): ?>
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
                          <a class="btn btn-info btn-sm" href="<?=SITE.'index.php?page=edit_post_category.php&id='.$category['Id']?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Düzenle
                          </a>
                          <a class="btn btn-danger btn-sm delete" href="<?=SITE.'index.php?page=delete_post_category.php&id='.$category['Id']?>">
                              <i class="fas fa-trash">
                              </i>
                              Sil
                          </a>
                      </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
          </table>
          <!-- <a href="<?=SITE?>/index.php?page=add_post_category.php" class="btn btn-success my-3 mx-4 float-right" >Kategori Ekle</a> -->
        </div>
      </div>
    </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="text" class="form-control" placeholder="Kategori adı" id="categoryName">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary addCategoryButton">Ekle</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal modal-delete-message" tabindex="-1">
  <div class="modal-dialog">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Bu ögeyi silmek istediğinize emin misiniz ?</h5>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Hayır</button>
          <button type="button" class="btn btn-primary" id="confirm">Evet</button>
          <!-- <a href="" class="btn btn-danger" id="confirm"></a> -->
      </div>
      </div>
  </div>
</div>

<script>
  $(document).ready(function () { 
    $(".addPostCat").click(function () { 
      $("#exampleModal").modal("show");
     })

     $(".addCategoryButton").click(function () { 
        let name = $("#categoryName").val();
        $.ajax({
          type: "POST",
          url: "./controller/action_post_cat.php",
          data: {book_category_name:name},
          dataType:"json",
          success: function(data){
            let result = data.result;
            let message = data.message;
            if(result){
              Swal.fire("Başarılı", message, "success");
              $("#exampleModal").modal("hide");
              // setTimeout(() => {
              //   window.location.reload();
              // }, '1000');
              // clearTimeout();
              $('#postCattable tbody').prepend(data["html"]);
              $('.delete').click((e) => {
                e.preventDefault();
                $('.modal').show();
                let element = e.target.getAttribute('href');
                $('#confirm').click(() => {
                  window.location.href = element;
                });
                $('#close').click(() => {
                  $('.modal').hide();
                })
              });
            }else{
              Swal.fire("Error", message, "error");
            }
          },
          error:function(r){
            console.log(r);
          }
        });
     });
   });

    $('.delete').click((e) => {
      e.preventDefault();
      $('.modal').show();
      let element = e.target.getAttribute('href');
      $('#confirm').click(() => {
        window.location.href = element;
      });
      $('#close').click(() => {
        $('.modal').hide();
      })
    })

</script>