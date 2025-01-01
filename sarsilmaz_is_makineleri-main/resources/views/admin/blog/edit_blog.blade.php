@extends("admin.layout.app")

@section("content")
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <div class="mb-4 w-75 m-auto">
                <form action="{{ route("blog.update", [$blog->id]) }}" method="post">
                    @csrf
                    <div class="fw-bold pb-2 mb-3"></div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Blog Başlığı</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-text text-primary">
                                    <i class="ph ph-text-h-one"></i>
                                </span>
                                <input type="text" name="blog_title" class="form-control" placeholder="Başlık Giriniz" value="{{ $blog->blog_title }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Blog Metni</label>
                        <div class="col-lg-9">
                            <div class="input-group">

                                <textarea class="form-control" id="ckeditor_classic_prefilled" name="blog_text" placeholder="Metin Giriniz" required>{{ $blog->blog_text }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Blog Fotoğrafı</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-text bg-input text-primary">
                                    <i class="ph ph-image"></i>
                                </span>
                                <input type="text" class="d-none" id="blog_image_input" name="blog_media" value="{{ $blog->blog_image }}">
                                {{--                            <input type="file" name="blog_image" class="form-control" placeholder="Fotoğraf Yükleyin" required>--}}
                                <input type="button" id="image_select" class="btn btn-outline-secondary" value="Fotoğraf Seç">
                            </div>
                            @if(empty($gallery[0]))
                                <img src="" class="my-2 rounded w-50" id="selected_image">
                            @else
                                <img src="{{ asset($gallery[0]->media_url) }}" class="my-2 rounded w-50" id="selected_image">
                            @endif

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg float-end">Güncelle</button>
                </form>
            </div>
        </div>

        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content text-light" style="background-color: #2c2d33">
                    <div class="modal-header">
                        <h5 class="modal-title">Blog için galerinizden bir resim seçiniz.</h5>
                    </div>
                    <div class="modal-body" style="display: grid; grid-template-columns: 1fr 1fr 1fr" >
                        @foreach($gallery_all as $image)
                            <div class="m-1">
                                <img class="blog_image w-100" src="{{ asset($image->media_url)}}" id="{{ $image->id }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button id="close_modal" class="btn btn-outline-danger">İptal</button>
                    </div>
                </div>
            </div>
        </div>



        <script>
            $('#image_select').click((e) => {
                e.preventDefault();
                $('.modal').show();
                let element = e.target.getAttribute('href');
                $('.modal .blog_image').click((item) => {
                    console.log(item.target);
                    let id = item.target.getAttribute('id');
                    let url = item.target.getAttribute('src');
                    $('#blog_image_input').attr("value", id);
                    $('#selected_image').attr('src', url);
                    $('.modal').hide();
                });
                $('#close_modal').click(() => {
                    $('.modal').hide();
                });
            });
        </script>
    </div>
@endsection
