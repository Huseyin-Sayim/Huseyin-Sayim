@extends("admin.layout.app")

@section("content")
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">

            <div class="mb-4 w-75 m-auto">
                <form action="{{ route("service.update", ["$service->id"]) }}" method="post">
                    @csrf
                    <div class="fw-bold pb-2 mb-3"></div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Hizmet Başlığı</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-text text-primary">
                                    <i class="ph ph-text-h-one"></i>
                                </span>
                                <input type="text" name="service_title" class="form-control" value="{{ $service->service_title }}" placeholder="Başlık Giriniz" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Kısa Hizmet Bilgisi</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-text  bg-input">
                                    <i class="ph ph-text-aa"></i>
                                </span>
                                <textarea class="form-control" name="service_intro_text" placeholder="Hizmet Hakkında Ön Bilgi Giriniz" required>{{ $service->service_intro_text }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Hizmet Açıklaması</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <textarea class="form-control" id="ckeditor_classic_prefilled" name="service_description" placeholder="Hizmet Açıklaması Giriniz" required>{{ $service->service_description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-form-label col-lg-3">Hizmet Fotoğrafı</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-text bg-input text-primary">
                                    <i class="ph ph-image"></i>
                                </span>
                                <input type="text" class="d-none" id="service_image_input" name="service_image" value="{{ $service->service_image }}">
                                <input type="button" id="image_select" class="btn btn-outline-secondary" value="Fotoğraf Seç">
                            </div>
                            @if(empty($image[0]))
                                <img src="" class="my-2 rounded w-50" id="selected_image">
                            @else
                                <img src="{{ asset($image[0]->media_url) }}" class="my-2 rounded w-50" id="selected_image">
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
                        @foreach($gallery as $image)
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
                    $('#service_image_input').attr("value", id);
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
